<?php
class ShiehMainMenu extends CWidget {

	public function run() {
		$categories = Category::model()->findAll();
		$currentLang = Yii::app()->language;
		$this->render('mainMenu', array('categories' => $categories));
	}
}