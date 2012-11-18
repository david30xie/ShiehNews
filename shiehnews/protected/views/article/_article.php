<div class="article-item">
	<h1><?php echo CHtml::link($article->title, array($article->getUrl())); ?></h1>
	<h2>
		<span>
			<ul>
				<li class="article_comments">访问 <?php echo $article->viewNum; ?></li>
				<li class="article_comments"><?php echo CHtml::link($article->commentNum === 0 ? '无评论' : $article->commentNum . ' 条评论', array($article->getUrl())); ?></li>
				<?php if (!Yii::app()->user->isGuest): ?>
					<?php if (Yii::app()->user->id === $article->userId): ?>
						<li class="article-edit"><?php echo CHtml::link('编辑', array('article/edit', 'aID' => $article->id)); ?></li>
						<li class="article-edit"><?php echo CHtml::link('删除', array('article/delete', 'aID' => $article->id)); ?></li>
					<?php endif; ?>
				<?php endif; ?>
			</ul>
		</span>
		<?php echo date('Y年m月d日', $article->createdTime); ?></h2>
	<p><?php echo $article->content; ?></p>
	<h3><span class="article-username"><?php echo $article->author->username; ?></span><span class="article-category"><?php echo CHtml::link($article->category->name, array('article/category', 'cID' => $article->categoryId)); ?></span></h3>
</div>