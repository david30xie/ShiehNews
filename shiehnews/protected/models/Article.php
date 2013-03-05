<?php

class Article extends CActiveRecord {

	public $commentPages;
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'articles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		return array(
			array('title, content, categoryId', 'required'),
		);
	}

	public function safeAttributes() {
		return array(
			'title',
			'content',
			'categoryId',
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'userId'),
			'category' => array(self::BELONGS_TO, 'Category', 'categoryId'),
			'comments' => array(self::HAS_MANY, 'Comment', 'articleId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'title' => '标题',
			'content' => '内容',
			'categoryId' => '栏目',
		);
	}

	protected function beforeValidate() {
		if(parent::beforeValidate())
		{
			if ($this->isNewRecord) {
				$this->userId = Yii::app()->user->id;
				$this->createdTime = $this->modifiedTime = time();
			} else {
				$this->modifiedTime = time();
			}
			return true;
		}
	}

	public function getUrl() {
		return '/article-' . $this->id . '.html';
	}

}