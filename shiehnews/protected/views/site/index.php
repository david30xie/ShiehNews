<?php if ($models): ?>
	<ul>
		<?php foreach ($models as $model): ?>
			<li><?php echo CHtml::link($model->title, array('article/show', 'ID' => $model->id)); ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>