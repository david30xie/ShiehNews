<table>
		<?php $i=0;?>
		<?php foreach ($models as $key => $model): 
		$i++;
		?>
		<?php
		if($i==$count)
		echo "总访问量：".$model->Counter; 
		?>
		<tr>
		<td><?php echo "访问时间：".$model->RecordDate; ?></td>
		<td><?php echo "ip地址：".$model->address; ?></td>
		</tr>
		<?php endforeach; ?>
</table>