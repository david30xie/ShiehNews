<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($commentForm); ?>

<?php echo CHtml::activeHiddenField($commentForm, 'articleId', array('value' => $aID)); ?>

<p>
<?php echo CHtml::activeTextArea($commentForm, 'comment', array('rows'=>6, 'cols'=>67)); ?>
</p>

<p>
<?php echo CHtml::submitButton('提交评论'); ?>
</p>

<?php echo CHtml::endForm(); ?>