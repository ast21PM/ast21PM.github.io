<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class HelloController extends Controller
	{
		public function index() {
			$this->title = 'Фреймворк работает!';
			return $this->render('hello/index');
		}
	}
