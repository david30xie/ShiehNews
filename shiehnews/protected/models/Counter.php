<?php

class Counter extends CActiveRecord
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
		return 'mycounter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			
			array('Counterid', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Counterid,CounterLastday,CounterToday,RecordDate,Counter', 'safe', 'on'=>'search'),
		
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
			
			'Counterid' => 'ID',
		
		);
	}

	static function getCounter()
	{
		$counterlist=Counter::Model()->findAll();
		return CHtml::listData($counterlist,'Counterid','Counter');
	}

	public function getUrl() {
		return 'counter/' . $this->id . '.html';
	}
}