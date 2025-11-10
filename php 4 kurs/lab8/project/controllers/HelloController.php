<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class HelloController extends Controller
	{
		public function index() {
			$this->title = 'Фреймворк работает!';
			
			// Модель Hello убрана, так как она не используется на этой странице
			// Если нужно проверить подключение к БД, используйте страницу /page/test/
			
			return $this->render('hello/index');
		}
	}
