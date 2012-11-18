<?php

class ChangePasswordForm extends CFormModel {
	public $password;
	public $new_password;
	public $new_password_confirm;

	public function rules()
	{
		return array(
			// username and password are required
			array('password, new_password, new_password_confirm', 'required'),
			array('password, new_password, new_password_confirm', 'length', 'min' => 6, 'max' => 12),
			array('new_password_confirm', 'compare', 'compareAttribute' => 'new_password', 'message' => '2次输入密码不同'),
			array('password', 'authenticate'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'password' => '旧密码',
			'new_password' => '新密码',
			'new_password_confirm' => '重复新密码',
		);
	}

	public function authenticate($attribute, $params) {
		if(!$this->hasErrors())	{
			$user = User::model()->findByPk(Yii::app()->user->id);
			if ($user->password == md5($this->password)) {
				$user->password = md5($this->new_password);
				$user->update();
			} else {
				$this->addError('password','密码不正确');
			}
		}
	}
}