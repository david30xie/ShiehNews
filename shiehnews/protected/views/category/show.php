<h2>View Category <?php echo $category->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Category List',array('list')); ?>]
[<?php echo CHtml::link('New Category',array('create')); ?>]
[<?php echo CHtml::link('Update Category',array('update','id'=>$category->id)); ?>]
[<?php echo CHtml::linkButton('Delete Category',array('submit'=>array('delete','id'=>$category->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Category',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($category->getAttributeLabel('name')); ?>
</th>
    <td><?php echo CHtml::encode($category->name); ?>
</td>
</tr>
</table>
