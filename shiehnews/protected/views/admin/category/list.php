<table>
	<tr>
		<th class="table_num"></th>
		<th class="table_name">名称</th>
		<th>操作</th>
	</tr>
	<?php foreach ($models as $key => $model): ?>
		<tr>
			<td>#<?php echo $key + 1; ?></td>
			<td><?php echo $model->name; ?></td>
			<td>
				<?php echo CHtml::link('修改', array('admin/categories', 'action' => 'update', 'cID' => $model->id)); ?> | 
				<?php echo CHtml::link('删除', array('admin/deleteCategory', 'action' => 'delete', 'cID' => $model->id)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<p><?php echo CHtml::link('添加新栏目', array('admin/categories', 'action' => 'create')); ?></p>