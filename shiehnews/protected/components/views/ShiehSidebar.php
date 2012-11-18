<div id="login">
	<?php if (Yii::app()->user->isGuest): ?>
		<p>您还没有登陆.</p>
		<p>
			<?php echo CHtml::link('登录', array('user/login')); ?> | 
			<?php echo CHtml::link('注册', array('user/register')); ?>
		</p>
	<?php else: ?>
		<p>欢迎您, <?php echo Yii::app()->user->username; ?><?php if (Yii::app()->user->username == 'admin') echo ' | ' . CHtml::link('Admin', array('/admin')); ?></p>
		<p><?php echo CHtml::link('修改资料', array('user/update')); ?> | <?php echo CHtml::link('登出', array('user/logout')); ?></p>
	<?php endif; ?>
</div>
<div class="lastest">
	<h1>热门新闻</h1>
	<ul>
		<?php if (!empty($lastestArticles)): ?>
			<?php foreach ($lastestArticles as $lastestArticle): ?>
				<li><?php echo CHtml::link($lastestArticle->title, Yii::app()->createUrl('article/show', array('aID' => $lastestArticle->id))); ?></li>
			<?php endforeach; ?>
		<?php else: ?>
			<li>暂时还没有新闻.</li>
		<?php endif; ?>
	</ul>
</div>
<div class="lastest">
	<h1>热门评论</h1>
	<ul>
		<?php if (!empty($lastestComments)): ?>
			<?php foreach ($lastestComments as $lastestComment): ?>
				<li><?php echo CHtml::link($lastestComment->comment, Yii::app()->createUrl('article/show', array('aID' => $lastestComment->articleId))); ?></li>
			<?php endforeach; ?>
		<?php else: ?>
			<li>暂时还没有评论.</li>
		<?php endif; ?>
	</ul>
</div>
