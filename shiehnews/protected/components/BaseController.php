<?php
/**
 * 
 * @author David Shieh <mykingheaven@gmail.com>
 * @blog :  http://davidshieh.cn/
 *
 */
class BaseController extends CController {
	
	public function actions() {
		return array(
			'captcha'=>array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xCCCCCC,
				'testLimit' => 1,
			),
		);

	}
	
	public function beforeAction() {
		// put your logic here.
		// you can log every action here.
		return true;
	}
}