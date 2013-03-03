<ul>
	<li><?php echo CHtml::link(Yii::t('main', 'index'), array('/index.php')); ?></li>
	<?php foreach($categories as $category): ?>
		<li><?php echo CHtml::link($category->name, array('article/category', 'cID' => $category->id)); ?></li>
	<?php endforeach; ?>
</ul>