<?php

Yii::import('zii.widgets.CPortlet');

class TagCloud extends CPortlet {
	public $title='Tags';
	public $maxTags=20;

	protected function renderContent() {
		$Tags = Tag::model()->findTagWeights($this->maxTags);
		foreach($Tags as $tag => $weight) {
			$link = CHtml::link(CHtml::encode($tag), array('article/index','tag' => $tag));
			echo CHtml::Tag('span', array('class'=>'tag','style'=>"font-size:{$weight}pt"), $link)."\n";
		}
	}

}