<?php
class ShiehSidebar extends CWidget {

	public function run() {
		$criteria = new CDbCriteria;
		$criteria->order = 'createdTime DESC';
		$criteria->limit = 10;
		
		$lastestArticles = Article::model()->findAll($criteria);
		$lastestComments = Comment::model()->findAll($criteria);

		$this->render('ShiehSidebar', array(
			'lastestArticles' => $lastestArticles,
			'lastestComments' => $lastestComments,
		));
	}
}