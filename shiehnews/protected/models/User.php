<?php

class User extends CActiveRecord {
	
	public $passwordConfirm;
	public $verifyCode;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		return array(
			array('username, password, passwordConfirm, email, verifyCode', 'required'),
			array('username', 'unique'),
			array('username', 'length', 'min' => 5, 'max' => 12),
			array('password', 'length', 'min' => 5, 'max' => 12),
			array('nickname', 'length', 'min' => 4, 'max' => 20),
			array('nickname', 'unique'),
			array('verifyCode', 'captcha'),
			array('passwordConfirm', 'compare', 'compareAttribute' => 'password'),
		);
	}

	public function safeAttributes() {
		return array(
			'username', 'password', 'passwordConfirm', 'email', 'createdTime', 'nickname', 'verifyCode',
		);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'username' => '用户名',
			'password' => '密码',
			'passwordConfirm' => '密码确认',
			'email' => '邮件地址',
			'nickname' => '昵称',
			'verifyCode' => '验证码'
		);
	}
	
	protected function beforeSave() {
		if ($this->isNewRecord) {
			$this->password = md5($this->password);
			$this->createdTime = time();
		}
		return true;
	}
}