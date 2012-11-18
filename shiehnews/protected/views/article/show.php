<h1 id="nav">
	<?php echo CHtml::link('首页', array('article/list')); ?> > 
	<?php echo CHtml::link($article->category->name, array('article/category', 'cID' => $article->categoryId)); ?> > 
	<?php echo $article->title; ?>
</h1>

<?php $this->renderPartial('_article', array(
	'article' => $article,
)); ?>

<div id="comments">
	<h1>评论 （<?php echo $article->commentNum; ?>）</h1>
	<?php if (!empty($article->comments)): ?>
		<?php foreach ($article->comments as $key => $comment): ?>
			<?php $this->renderPartial('_comment', array(
				'num' => $key,
				'comment' => $comment,
			)); ?>
		<?php endforeach; ?>
		<?php $this->widget('CLinkPager', array('pages' => $commentPages)); ?>
	<?php else: ?>
		<p>目前没有任何评论.</p>
	<?php endif; ?>
</div>

<div id="comment">
	<?php if (!Yii::app()->user->isGuest): ?>
		<h1>登录账号:<span><?php echo Yii::app()->user->username; ?></span></h1>
		<?php $this->renderPartial('_commentForm', array(
			'aID' => $article->id,
			'commentForm' => $commentForm,
		)); ?>
	<?php else: ?>
		<p>留言请 <?php echo CHtml::link('登录', array('user/login')); ?></p>
	<?php endif; ?>
</div>