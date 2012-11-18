<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::errorSummary($password); ?>

<p>
	<?php echo CHtml::activeLabelEx($password, 'password'); ?>
	<?php echo CHtml::activePasswordField($password, 'password'); ?>
</p>

<p>
	<?php echo CHtml::activeLabelEx($password, 'new_password'); ?>
	<?php echo CHtml::activePasswordField($password, 'new_password'); ?>
</p>

<p>
	<?php echo CHtml::activeLabelEx($password, 'new_password_confirm'); ?>
	<?php echo CHtml::activePasswordField($password, 'new_password_confirm'); ?>
</p>

<p>
	<label>&nbsp;</label>
	<?php echo CHtml::submitButton('修改密码'); ?>
</p>

<?php echo CHtml::endForm(); ?>