<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
	Yii::setPathOfAlias('js', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'js');
	Yii::setPathOfAlias('images', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'images');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'ShiehNews',
	//Ä¬ÈÏÓïÑÔ
	
	//'language' => 'zh_cn',
	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'qazwsx',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class' => 'CWebLogRoute',
					'levels' => 'trace,info,error,warning',
					'categories' => 'system.db.*',
				),
				/**
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, watch',
					'categories' => 'system.*'
				),
				**/
			),
		),
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			'loginUrl' => array('user/login'),
		),
		// uncomment the following to set up database
		
		'db' => array(
            'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=shiehnews',
            'username' => 'root',
            'password' => 'ch12345',
			'charset' => 'utf8',
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(
				'<_c>/<_a>' => '<_c>/<_a>',
				'/' => 'article/list',
				'register' => 'user/register',
				'login' => 'user/login',
				'logout' => 'user/logout',
				'category' => 'article/category',
				'article-<ID:\d+>.html' => 'article/show',
			),
		),
		'cache' => array(
			'class' => 'system.caching.CFileCache',
		),
	),
	

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		//'adminEmail'=>'webmaster@example.com',
	),
);
