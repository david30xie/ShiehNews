<table>
	<tr>
		<th class="table_num">ID</th>
		<th class="table_title">标题</th>
		<th class="table_name">栏目</th>
		<th>阅读</th>
		<th>回复</th>
		<th>评价</th>
		<th>操作</th>
	</tr>
	<?php foreach ($models as $model): ?>
		<tr>
			<td>#<?php echo $model->id; ?></td>
			<td><?php echo CHtml::link($model->title, array('article/show', 'aID' => $model->id)); ?></td>
			<td><?php echo CHtml::link($model->category->name, array('article/category', 'cID' => $model->categoryId)); ?></td>
			<td><?php echo $model->viewNum; ?></td>
			<td><?php echo $model->commentNum; ?></td>
			<td><?php echo $model->rate; ?></td>
			<td>
				<?php echo CHtml::link('编辑', array('admin/articles', 'action' => 'update', 'aID' => $model->id)); ?> | 
				<?php echo CHtml::link('删除', array('admin/articles', 'action' => 'delete', 'aID' => $model->id)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>

<?php $this->widget('CLinkPager', array('pages' => $pages)); ?>
<p><?php echo CHtml::link('添加新文章', array('admin/articles', 'action' => 'create')); ?></p>