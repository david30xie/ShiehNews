<?php

class Comment extends CActiveRecord {
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
		return 'comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		return array(
			array('comment', 'required'),
		);
	}
	
	public function safeAttributes() {
		return array(
			'articleId, userId, comment, createdTime'
		);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations() {
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
		);
	}
	
	protected function beforeValidate() {
		if ($this->isNewRecord) {
			$this->createdTime = $this->modifiedTime = time();
			$this->userId = Yii::app()->user->id;
		}
		return true;
	}
	
	protected function afterSave() {
		if ($this->isNewRecord) {
			$article = Article::model()->findByPk($this->articleId);
			$article->commentNum = $article->commentNum + 1;
			$article->save();
		}
		return true;
	}
}