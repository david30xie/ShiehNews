<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($form); ?>

<p>
	<?php echo CHtml::activeLabelEx($form, 'title'); ?>
	<?php echo CHtml::activeTextField($form, 'title'); ?>
</p>

<p>
	<?php echo CHtml::activeLabelEx($form, 'categoryId'); ?>
	<?php echo CHtml::activeDropDownList($form, 'categoryId', Category::getCategories()); ?>
</p>

<p>
	<?php echo CHtml::activeLabelEx($form, 'content'); ?>
	<?php echo CHtml::activeTextArea($form, 'content'); ?>
</p>

<p>
<?php echo CHtml::submitButton('发表'); ?>
</p>

<?php echo CHtml::endForm(); ?>