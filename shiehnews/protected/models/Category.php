<?php

class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			
			array('name', 'required'),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
		
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
	public function attributeLabels()
	{
		return array(
			
			'id' => 'ID',
			'name' => 'Name',
		
		);
	}

	static function getCategories()
	{
		$categorieslist=Category::Model()->findAll();
		return CHtml::listData($categorieslist,'id','name');
	}

/*
	static function getCategories() {
		$array = array();
		$categories = Category::model()->findAll();
		foreach ($categories as $category) {
			$array[$category->id] = $category->name;
		}
		return $array;
	}
*/	
	public function getUrl() {
		return 'category/' . $this->id . '.html';
	}
}