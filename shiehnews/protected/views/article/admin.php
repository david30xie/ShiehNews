<h2>Managing Article</h2>

<div class="actionBar">
[<?php echo CHtml::link('Article List',array('list')); ?>]
[<?php echo CHtml::link('New Article',array('create')); ?>]
</div>

<table class="dataGrid">
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('user_id'); ?></th>
    <th><?php echo $sort->link('title'); ?></th>
    <th><?php echo $sort->link('created_time'); ?></th>
    <th><?php echo $sort->link('modified_time'); ?></th>
    <th><?php echo $sort->link('category_id'); ?></th>
    <th><?php echo $sort->link('rate'); ?></th>
    <th><?php echo $sort->link('views'); ?></th>
    <th><?php echo $sort->link('comments'); ?></th>
	<th>Actions</th>
  </tr>
<?php foreach($articleList as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->user_id); ?></td>
    <td><?php echo CHtml::encode($model->title); ?></td>
    <td><?php echo CHtml::encode($model->created_time); ?></td>
    <td><?php echo CHtml::encode($model->modified_time); ?></td>
    <td><?php echo CHtml::encode($model->category_id); ?></td>
    <td><?php echo CHtml::encode($model->rate); ?></td>
    <td><?php echo CHtml::encode($model->views); ?></td>
    <td><?php echo CHtml::encode($model->comments); ?></td>
    <td>
      <?php echo CHtml::link('Update',array('update','id'=>$model->id)); ?>
      <?php echo CHtml::linkButton('Delete',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"Are you sure to delete #{$model->id}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>