<h2>新用户注册</h2>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($form); ?>

<p>
	<?php echo CHtml::activeLabelEx($form, 'username'); ?>
	<?php echo CHtml::activeTextField($form, 'username', array('size' => 20, 'maxlength' => 12)); ?>
</p>
<p>
	<?php echo CHtml::activeLabelEx($form, 'password'); ?>
	<?php echo CHtml::activePasswordField($form, 'password', array('size' => 20, 'maxlength' => 12)); ?>
</p>
<p>
	<?php echo CHtml::activeLabelEx($form, 'passwordConfirm'); ?>
	<?php echo CHtml::activePasswordField($form, 'passwordConfirm', array('size' => 20, 'maxlength' => 12)); ?>
</p>
<p>
	<?php echo CHtml::activeLabelEx($form, 'email'); ?>
	<?php echo CHtml::activeTextField($form, 'email', array('size' => 20)); ?>
</p>
<p>
	<?php echo CHtml::activeLabelEx($form, 'nickname'); ?>
	<?php echo CHtml::activeTextField($form, 'nickname', array('size' => 20, 'maxlength' => 12)); ?>
</p>

<p>
	<label>&nbsp;</label>
	<?php $this->widget('CCaptcha'); ?>
</p>

<p>
	<?php echo CHtml::activeLabelEx($form, 'verifyCode'); ?>
	<?php echo CHtml::activeTextField($form, 'verifyCode'); ?>
</p>

<p>
	<label>&nbsp;</label>
	<?php echo CHtml::submitButton('注册'); ?>
</p>

<?php echo CHtml::endForm(); ?>