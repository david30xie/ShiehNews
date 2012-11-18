<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($article); ?>

<p>
<?php echo CHtml::activeLabelEx($article,'title', array('id' => 'etes')); ?>
<?php echo CHtml::activeTextField($article,'title',array('size'=>60,'maxlength'=>255)); ?>
</p>
<p>
<?php echo CHtml::activeLabelEx($article,'content'); ?>
<?php echo CHtml::activeTextArea($article,'content',array('rows'=>6, 'cols'=>50)); ?>
</p>
<p>
<?php echo CHtml::activeLabelEx($article,'categoryId'); ?>
<?php echo CHtml::activeDropDownList($article, 'categoryId', Category::getCategories()); ?>
</p>

<h6>
<?php echo CHtml::submitButton('发布'); ?>
</h6>

<?php echo CHtml::endForm(); ?>