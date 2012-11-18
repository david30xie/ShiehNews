<h2>编辑文章</h2>

<?php echo $this->renderPartial('_form', array(
	'article' => $article,
	'categories' => $categories,
)); ?>
