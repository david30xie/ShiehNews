<?php

class LoginForm extends CFormModel {
	public $username;
	public $password;
	public $rememberMe;

	public function rules() {
		return array(
			array('username, password', 'required'),
			array('password', 'authenticate'),
		);
	}

	public function attributeLabels() {
		return array(
			'username' => '用户名',
			'password' => '密码',
			'rememberMe' => '记住我',
		);
	}

	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors()) {
			$identity = new UserIdentity($this->username, $this->password);
			$identity->authenticate();
			switch($identity->errorCode)
			{
				case UserIdentity::ERROR_NONE:
					$duration=$this->rememberMe ? 3600*24*30 : 0;
					Yii::app()->user->login($identity, $duration);
					break;
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError('username','Username is incorrect.');
					break;
				default:
					$this->addError('password','Password is incorrect.');
					break;
			}
		}
	}
}
