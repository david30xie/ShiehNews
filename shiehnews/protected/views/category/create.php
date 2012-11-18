<h2>New Category</h2>

<div class="actionBar">
[<?php echo CHtml::link('Category List',array('list')); ?>]
[<?php echo CHtml::link('Manage Category',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'category'=>$category,
	'update'=>false,
)); ?>