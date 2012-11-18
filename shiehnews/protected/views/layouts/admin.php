<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" />
<title><?php echo $this->pageTitle; ?> - ShiehNews 后台管理</title>
</head>

<body>
<div id="page">

<div id="header">
	<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?> - 后台管理</div>
	<div id="mainmenu">
		<ul>
			<li><?php echo CHtml::link('管理首页', array('/admin')); ?></li>
			<li><?php echo CHtml::link('用户管理', array('admin/users', 'action' => 'list')); ?></li>
			<li><?php echo CHtml::link('文章管理', array('admin/articles', 'action' => 'list')); ?></li>
			<li><?php echo CHtml::link('栏目管理', array('admin/categories', 'action' => 'list')); ?></li>
			<?php if (!Yii::app()->user->isGuest): ?>
				<li><?php echo CHtml::link('登出', array('/logout')); ?></li>
			<?php endif; ?>
		</ul>
	</div><!-- mainmenu -->
</div><!-- header -->
<div style="clear:both;"></div>
<div id="sidebar">
	<?php //$this->widget('application.components.ShiehSidebar'); ?>
</div>

<div id="content">
<?php echo $content; ?>
</div><!-- content -->
<div style="clear:both;"></div>
<div id="footer">
<p>Copyright &copy; 2009 by David Shieh.</p>
<p>All Rights Reserved.<?php echo Yii::powered(); ?></p>
</div><!-- footer -->

</div><!-- page -->
</body>

</html>