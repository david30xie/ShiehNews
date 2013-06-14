<?php if($uploaded):?>
<p>File was uploaded. Check <?php echo $dir?>.
 <img src="<?php echo Yii::app()->request->baseUrl;?>/images/<?php $file->getName();?>"  style="width:200px; height:300px;" />
<?php endif ?>
<?php echo CHtml::beginForm('','post',array
        ('enctype'=>'multipart/form-data'))?>
    <?php echo CHtml::error($model, 'file')?>
    <?php echo CHtml::activeFileField($model, 'file')?>
    <?php echo CHtml::submitButton('Upload')?>
<?php echo CHtml::endForm()?>
