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
	
}