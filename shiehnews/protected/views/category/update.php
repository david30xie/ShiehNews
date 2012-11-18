<h2>Update Category <?php echo $category->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Category List',array('list')); ?>]
[<?php echo CHtml::link('New Category',array('create')); ?>]
[<?php echo CHtml::link('Manage Category',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'category'=>$category,
	'update'=>true,
)); ?>