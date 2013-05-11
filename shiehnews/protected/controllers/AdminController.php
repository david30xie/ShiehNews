<?php
/**
 * 
 * @author David Shieh <mykingheaven@gmail.com>
 *
 */
class AdminController extends BaseController {
	
	const PAGE_SIZE = 30;
	public $defaultAction = 'index';

	public function filters() {
		return array(
			'accessControl',
		);
	}
	
	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('index', 'users', 'categories', 'articles','counter'),
				'users' => array('admin'),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}
	
	/**
	 * 设置所有的action都是用admin布局
	 * @return unknown_type
	 */
	public function init() {
		$this->layout = 'admin';
	}

	public function actionIndex() {
		$this->render('index');
	}

/**
 * ====================================================
 * ======== actions for Users management ===========
 * ====================================================
 */
	
	/**
	 * 管理用户
	 * 通过$_GET['action']来区分操作的类别
	 * list - 列出所有用户
	 * delete - 删除用户
	 * @return unknown_type
	 */
	public function actionUsers() {
		if (isset($_GET['action'])) {
			switch($_GET['action']) {
				case 'list':
					$criteria = new CDbCriteria;
			
					$pages = new CPagination(User::model()->count($criteria));
					$pages->pageSize = self::PAGE_SIZE;
					$pages->applyLimit($criteria);
			
					$userList = User::model()->findAll($criteria);
			
					//设置标题
					$this->pageTitle = '用户管理';
			
					$this->render('user/list',array(
						'userList' => $userList,
						'pages' => $pages,
					));
					break;
				case 'delete':
					if (isset($_GET['ID'])) {
						$user = User::model()->findByPk($_GET['ID']);
						if ($user != null) {
							$user->delete();
						}
					}
					$this->redirect(array('admin/users', 'action' => 'list'));
					break;
				default:
					throw new CHttpException(404, "您所访问的地址并不存在!");
					break;
			}
		} else {
			throw new CHttpException(404, "您所访问的地址并不存在!");
		}
	}

/**
 * ====================================================
 * ======== actions for Category management ===========
 * ====================================================
 */
	
	/**
	 * 
	 * @return 
	 */
	public function actionCategories() {
		if (isset($_GET['action'])) {
			switch ($_GET['action']) {
				case 'list':
					$models = Category::model()->findAll();
	
					//设置标题
					$this->pageTitle = '栏目管理';
			
					$this->render('category/list',array(
						'models' => $models,
					));
					break;
				case 'create':
					$form = new Category;
					if (isset($_POST['Category'])) {
						$form->attributes = $_POST['Category'];
						if ($form->save()) {
							$this->redirect(array('admin/categories', 'action' => 'list'));
						}
					}
					
					$this->render('category/create', array('form' => $form));
					break;
				case 'update':
					if (isset($_GET['cID'])) {
						$category = Category::model()->findByPk($_GET['cID']);
						if (isset($_POST['Category'])) {
							$category->attributes = $_POST['Category'];
							if ($category->save()) {
								$this->redirect(array('admin/categories', 'action' => 'list'));
							}
						}
						
						$this->render('category/editCategory', array('form' => $category));
						break;
					} else
						throw new CHttpException(404, "您所访问的地址并不存在!");
					break;
				case 'delete':
					if (isset($_GET['cID'])) {
						$model = Category::model()->findByPk($_GET['cID']);
						if ($model != null) {
							$model->delete();
						}
					}
					$this->redirect(array('admin/categories', 'action' => 'list'));
					break;
				default:
					throw new CHttpException(404, "您所访问的地址并不存在!");
					break;
			}
		} else {
			throw new CHttpException(404, "您所访问的地址并不存在!");
		}
	}

/**
 * ====================================================
 * ======== actions for Article management ===========
 * ====================================================
 */

	public function actionArticles() {
		if (isset($_GET['action'])) {
			switch ($_GET['action']) {
				case 'list':
					$criteria = new CDbCriteria;
			
					$pages = new CPagination(Article::model()->count($criteria));
					$pages->pageSize = self::PAGE_SIZE;
					$pages->applyLimit($criteria);
					
					$models = Article::model()->with('category')->findAll($criteria);
	
					//设置标题
					$this->pageTitle = '文章管理';
			
					$this->render('article/list',array(
						'models' => $models,
						'pages' => $pages,
					));
					break;
				case 'create':
					$form = new Article;
					if (isset($_POST['Article'])) {
						$form->attributes = $_POST['Article'];
						if ($form->save()) {
							$this->redirect(array('admin/articles', 'action' => 'list'));
						}
					}
					
					$this->render('article/create', array('form' => $form));
					break;
				case 'update':
					if (isset($_GET['ID'])) {
						$form = new Article;
						if (isset($_POST['Article'])) {
							$form->attributes = $_POST['Article'];
							if ($form->save()) {
								$this->redirect(array('admin/articles', 'action' => 'list'));
							}
						}
						
						$this->render('article/update', array('form' => $form));
					} else
						throw new CHttpException(404, "您所访问的地址并不存在!");
					break;
				case 'delete':
					if (isset($_GET['ID'])) {
						$model = Article::model()->findByPk($_GET['ID']);
						if ($model != null) {
							$model->delete();
						}
					}
					$this->redirect(array('admin/articles', 'action' => 'list'));
					break;
				default:
					throw new CHttpException(404, "您所访问的地址并不存在!");
					break;
			}
		} else {
			throw new CHttpException(404, "您所访问的地址并不存在!");
		}
	}
	public function actionCounter()
	{
		
		if(isset($_GET['action'])){

			//$models = Counter::model()->findAll();
			$models=Counter::model()->findAllBySql("SELECT * FROM `mycounter` order by Counterid DESC");
			$this->pageTitle = '访问量统计';
			$this->render('counter/list',array(
						'models' => $models,));
		}else {
			throw new CHttpException(404, "您所访问的地址并不存在!");
		}
	}
}