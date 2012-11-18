<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($user); ?>

<p>
	<?php echo CHtml::activeLabelEx($user, 'username'); ?>
	<?php echo CHtml::activeTextField($user, 'username', array('size' => 20, 'maxlength' => 12)); ?>
</p>
<p>
	<?php echo CHtml::activeLabelEx($user, 'password'); ?>
	<?php echo CHtml::activePasswordField($user, 'password', array('size' => 20, 'maxlength' => 12)); ?>
</p>
<p>
	<?php echo CHtml::activeLabelEx($user, 'passwordConfirm'); ?>
	<?php echo CHtml::activePasswordField($user, 'passwordConfirm', array('size' => 20, 'maxlength' => 12)); ?>
</p>

<p>
	<label>&nbsp;</label>
	<?php echo CHtml::submitButton('注册'); ?>
</p>

<?php echo CHtml::endForm(); ?>