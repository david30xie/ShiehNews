<ul>
	<li><?php //echo CHtml::link('首页', array('/index.php')); ?></li>
	<li><?php echo CHtml::link(Yii::t('main','Home'), array('/index.php')); ?></li>
	<?php foreach($categories as $category): ?>
		<li><?php echo CHtml::link($category->name, array('article/category', 'cID' => $category->id)); ?></li>
	<?php endforeach; ?>
</ul>
