<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($category); ?>

<p>
<?php echo CHtml::activeTextField($category, 'name', array()); ?>
</p>

<p>
<?php echo CHtml::submitButton('save'); ?>
</p>

<?php echo CHtml::endForm(); ?>