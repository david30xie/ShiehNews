<?php
class UserController extends BaseController {
	const PAGE_SIZE=10;

	public $defaultAction='list';

	private $_user;

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions' => array('register', 'login', 'logout', 'captcha'),
				'users' => array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('changePassword'),
				'users' => array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('admin', 'delete'),
				'users' => array('admin'),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionLogin() {
		$form = new LoginForm;
		if (isset($_POST['LoginForm'])) {
			$form->attributes = $_POST['LoginForm'];
			
			if ($form->validate())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		
		$this->layout = 'simple';
		$this->pageTitle = '登陆';
		
		$this->render('login', array('user' => $form));
	}
	
	public function actionLogout()  {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->user->returnUrl);
	}

	/**
	 * Creates a new user.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionRegister() {
		$form = new User;
		if (isset($_POST['User'])) {
			$form->attributes = $_POST['User'];
			if ($form->save()) {
				$this->redirect(array('login'));
			}
		}
		
		$this->layout = 'simple';
		$this->pageTitle = '注册';
		
		$this->render('register', array('form' => $form));
	}

	/**
	 * Updates a particular user.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionChangePassword() {
		$password = new ChangePasswordForm();
		if (isset($_POST['ChangePasswordForm'])) {
			$password->attributes = $_POST['ChangePasswordForm'];
			
			if ($password->validate())
				$this->redirect(array('/logout'));
		}
		$this->render('changePassword', array('password'=>$password));
	}

	/**
	 * Deletes a particular user.
	 * If deletion is successful, the browser will be redirected to the 'list' page.
	 */
	public function actionDelete() {
		if(Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadUser()->delete();
			$this->redirect(array('list'));
		}
		else
			throw new CHttpException(500,'Invalid request. Please do not repeat this request again.');
	}
}
