<?php foreach($articleList as $n => $article): ?>
	<?php $this->renderPartial('_article', array(
		'article' => $article,
	)); ?>
<?php endforeach; ?>

<?php $this->widget('CLinkPager', array('pages' => $pages)); ?>