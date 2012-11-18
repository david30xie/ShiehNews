<?php
class ArticleController extends BaseController {
	const PAGE_SIZE = 10;

	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction = 'list';
	public $_article;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('list', 'show', 'category', 'rate'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create', 'edit', 'editComment', 'delete', 'deleteComment'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Shows a particular article.
	 */
	public function actionShow() {
		//检查是否登录~登录后生成留言表单
		if (!Yii::app()->user->isGuest) {
			$comment = new Comment();
			if (isset($_POST['Comment'])) {
				$comment->attributes = $_POST['Comment'];
				if($comment->save())
					$this->redirect(array('show', 'aID' => $_GET['aID']));
			}
		}

		if (!isset($_GET['ID']))
			throw new CHttpException(404, "您所访问的文章不存在!");
			
		//读取文章~并给文章访问加1
		$article = Article::model()->with(array('category', 'comments'))->findByPk($_GET['ID']);
		
		if ($article == null)
			throw new CHttpException(404, "您所访问的文章不存在!");
			
		$article->viewNum = $article->viewNum + 1;
		$article->save();

		//读取文章的评论,并做分页
		$criteria = new CDbCriteria;
		$criteria->condition = 'articleId =' . $article->id;
		$criteria->order = 'createdTime DESC';

		$pages = new CPagination(Comment::model()->count($criteria));
		$pages->pageSize = self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		//设置标题
		$this->pageTitle = $article->title;

		$this->render('show', array(
			'article' => $article,
			'commentForm' => isset($comment) ? $comment : NULL,
			'commentPages' => $pages,
		));
	}

	/**
	 * Lists all articles.
	 */
	public function actionList() {
		$criteria = new CDbCriteria;
		$criteria->order = 'createdTime DESC';

		$pages = new CPagination(Article::model()->count($criteria));
		$pages->pageSize = self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$articleList = Article::model()->with(array('category'))->findAll($criteria);

		//设置标题
		$this->pageTitle = '首页';

		$this->render('list',array(
			'articleList' => $articleList,
			'pages' => $pages,
		));
	}

	public function actionCategory() {

		$criteria = new CDbCriteria;
		$criteria->order = 'createdTime DESC';
		$criteria->condition = 'categoryId = '.$_GET['cID'];

		$pages = new CPagination(Article::model()->count($criteria));
		$pages->pageSize = self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$articleList = Article::model()->findAll($criteria);

		//设置标题
		$this->pageTitle = '栏目 - '.Category::model()->findByPk($_GET['cID'])->name;

		$this->render('list',array(
			'articleList' => $articleList,
			'pages' => $pages,
		));
	}

	public function actionEditComment() {
		if (isset($_GET['ctID'])) {
			$comment = Comment::model()->findByPk($_GET['ctID']);

			if ($comment->userId !== Yii::app()->user->id)
				throw new CHttpException(500,'Invalid request. Please do not repeat this request again.');

			if(isset($_POST['Comment'])) {
				$comment->attributes = $_POST['Comment'];
				if($comment->save())
					$this->redirect(array('show', 'ID' => $comment->articleId));
			}

			//设置标题
			$this->pageTitle = '编辑留言';

			$this->render('editComment',array(
				'aID' => $comment->articleId,
				'commentForm' => $comment,
			));
		} else {
			throw new CHttpException(500,'Invalid request. Please do not repeat this request again.');
		}

	}

	/**
	 * 设置article的评价
	 * @return
	 */
	public function actionRate() {
		$this->layout = null;
		if (isset($_GET['article']) && isset($_GET['rate'])) {
			if (Yii::app()->user->isGuest) {
				echo "login";
				return;
			}
			$criteria = new CDbCriteria;
			$criteria->condition = 'userId = ' . Yii::app()->user->id . ' AND articleId = ' . $_GET['article'];
			if (Rate::model()->exists($criteria)) {
				echo "repeat";
				return;
			}
			$rate = new Rate;
			$rate->rate = $_GET['rate'];
			$rate->userId = Yii::app()->user->id;
			$rate->articleId = $_GET['article'];
			if ($rate->save()) {
				$article = Article::model()->findByPk($_GET['article']);
				$article->rate = floatval(($article->rateNum * $article->rate + $_GET['rate']) / ($article->rateNum + 1));
				$article->update();
				echo 'success';
				return;
			}
			echo 'fail';
		}
	}
	/**
	 * Manages all articles.
	 */
	public function actionAdmin()
	{
		$this->processAdminCommand();

		$criteria=new CDbCriteria;

		$pages=new CPagination(Article::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Article');
		$sort->applyOrder($criteria);

		$articleList=Article::model()->findAll($criteria);

		$this->render('admin',array(
			'articleList'=>$articleList,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadArticle($id = null)
	{
		if($this->_article===null) {
			if($id!==null || isset($_GET['ID']))
				$this->_article = Article::model()->findbyPk($id!==null ? $id : $_GET['ID']);
			if($this->_article===null)
				throw new CHttpException(404, 'The requested article does not exist.');
		}
		return $this->_article;
	}

	/**
	 * Executes any command triggered on the admin page.
	 */
	protected function processAdminCommand()
	{
		if(isset($_POST['command'], $_POST['id']) && $_POST['command']==='delete')
		{
			$this->loadArticle($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
}
