<?php
class ShiehMainMenu extends CWidget {

	public function run() {
		$categories = Category::model()->findAll();
		$this->render('mainMenu', array('categories' => $categories));
	}
}