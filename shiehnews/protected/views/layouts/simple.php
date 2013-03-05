<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
		<title><?php echo $this->pageTitle; ?> - <?php echo CHtml::encode(Yii::app()->name); ?></title>
		
	</head>
	
	<body>
		<div id="page">
		
			<div id="header">
				<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
				<div id="mainmenu">
					<ul>
						<li><?php echo CHtml::link('首页', array('article/list')); ?></li>
						<li><?php echo CHtml::link('注册', array('register')); ?></li>
						<li><?php echo CHtml::link('登陆', array('login')); ?></li>
					</ul>
				</div><!-- mainmenu -->
				<div style="clear:both;"></div>
			</div><!-- header -->
			<div style="clear:both;"></div>
			
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