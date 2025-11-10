<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?= BASE_PATH ?>/project/webroot/styles.css">
		<title><?= $title ?></title>
	</head>
	<body>
	<header>
		<img src="<?= BASE_PATH ?>/project/webroot/logo.jpg" alt="Логотип" style="height: 50px; vertical-align: middle; margin-right: 10px;">
		хедер сайта
	</header>
		<div class="container">
			<aside class="sidebar left">
				левый сайдбар
			</aside>
			<main>
				<?= $content ?>
			</main>
			<aside class="sidebar right">
				правый сайдбар
			</aside>
		</div>
		<footer>
			футер сайта
		</footer>
	</body>
</html>
