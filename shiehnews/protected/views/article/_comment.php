<div class="comment">
	<h2>
		<?php if (!Yii::app()->user->isGuest): ?>
<<<<<<< HEAD
			<span class="comment-edit"><?php echo CHtml::link('编辑', array('article/editComment', 'ctID' => $comment->id)); ?></span>
=======
>>>>>>> 3fbb0426f469fc194d04e398f889f2f2d6574041
			<span class="comment-edit"><?php echo CHtml::link(Yii::t('article', 'edit'), array('article/editComment', 'ctID' => $comment->id)); ?></span>
		<?php endif; ?>
		<span>#<?php echo $num + 1; ?></span>
		<?php echo $comment->author->username; ?> @ <?php echo date('Y年m月d日 H:i', $comment->createdTime); ?>
	</h2>
	<p><?php echo $comment->comment; ?></p>
</div>