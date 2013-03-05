<table>
	<tr>
		<th class="table_num"></th>
		<th class="table_username">用户名</th>
		
		<th>发表的文章数</th>
		<th>评论的文章数</th>
	</tr>
	<?php foreach ($userList as $key => $user): ?>
		<tr>
			<td>#<?php echo $key + 1; ?></td>
			<td><?php echo $user->username; ?></td>
			<td>0</td>
			<td>0</td>
		</tr>
	<?php endforeach; ?>
</table>

<?php $this->widget('CLinkPager', array('pages' => $pages)); ?>