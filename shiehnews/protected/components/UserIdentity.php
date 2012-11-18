<?php
class UserIdentity extends CUserIdentity {
	
	private $_id;
	private $_username;
	
	public function authenticate() {
		$user = User::model()->findByAttributes(array('username' => $this->username));
		if ($user === null) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		} else if ($user->password !== md5($this->password)) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			$this->_id = $user->id;
			$this->_username = $user->username;
			$this->setState('id', $user->id);
			$this->setState('username', $user->username);
			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}