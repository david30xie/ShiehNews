<h2>Update Article <?php echo $article->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Article List',array('list')); ?>]
[<?php echo CHtml::link('New Article',array('create')); ?>]
[<?php echo CHtml::link('Manage Article',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'article'=>$article,
	'update'=>true,
)); ?>