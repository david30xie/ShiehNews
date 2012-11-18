<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($form); ?>

<p>
<?php echo CHtml::activeTextField($form, 'name', array()); ?>
</p>

<p>
<?php echo CHtml::submitButton('添加栏目'); ?>
</p>

<?php echo CHtml::endForm(); ?>