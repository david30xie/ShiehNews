<ul>
<<<<<<< HEAD
	<li><?php //echo CHtml::link('首页', array('/index.php')); ?></li>
	<li><?php echo CHtml::link(Yii::t('main','Home'), array('/index.php')); ?></li>
=======
	<li><?php echo CHtml::link(Yii::t('main', 'index'), array('/index.php')); ?></li>
>>>>>>> 3fbb0426f469fc194d04e398f889f2f2d6574041
	<?php foreach($categories as $category): ?>
		<li><?php echo CHtml::link($category->name, array('article/category', 'cID' => $category->id)); ?></li>
	<?php endforeach; ?>
</ul>
