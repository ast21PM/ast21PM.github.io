<?php
	use \Core\Route;
	
	return [
		new Route('/hello/', 'hello', 'index'), // роут для приветственной страницы, можно удалить
		new Route('/hello', 'hello', 'index'),
		new Route('/my-page1/', 'page', 'show1'),
		new Route('/my-page1', 'page', 'show1'),
		new Route('/my-page2/', 'page', 'show2'),
		new Route('/my-page2', 'page', 'show2'),
		new Route('/page/:id/', 'page', 'show'),
		new Route('/page/:id', 'page', 'show'),
		new Route('/page/test/', 'page', 'test'),
		new Route('/page/test', 'page', 'test'),
		
		// Роуты для TestController (с слешем и без)
		new Route('/test/act1/', 'test', 'act1'),
		new Route('/test/act1', 'test', 'act1'),
		new Route('/test/act2/', 'test', 'act2'),
		new Route('/test/act2', 'test', 'act2'),
		new Route('/test/act3/', 'test', 'act3'),
		new Route('/test/act3', 'test', 'act3'),
		
		// Роут для NumController (с слешем и без)
		new Route('/nums/:n1/:n2/:n3/', 'num', 'sum'),
		new Route('/nums/:n1/:n2/:n3', 'num', 'sum'),
		
		// Роуты для UserController (с слешем и без)
		new Route('/user/all/', 'user', 'all'),
		new Route('/user/all', 'user', 'all'),
		new Route('/user/first/:n/', 'user', 'first'),
		new Route('/user/first/:n', 'user', 'first'),
		new Route('/user/:id/:key/', 'user', 'info'),
		new Route('/user/:id/:key', 'user', 'info'),
		new Route('/user/:id/', 'user', 'show'),
		new Route('/user/:id', 'user', 'show'),
		
		// Роуты для ProductController (с слешем и без)
		new Route('/products/', 'product', 'all'),
		new Route('/products', 'product', 'all'),
		new Route('/product/:id/', 'product', 'one'),
		new Route('/product/:id', 'product', 'one'),
	];
	
