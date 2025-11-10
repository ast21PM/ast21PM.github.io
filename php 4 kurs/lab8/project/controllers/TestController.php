<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class TestController extends Controller
	{
		public function act1() {
			$this->title = 'Тест - Действие 1';
			return $this->render('test/act1');
		}
		
		public function act2() {
			$this->title = 'Тест - Действие 2';
			return $this->render('test/act2');
		}
		
		public function act3() {
			$this->title = 'Тест - Действие 3';
			return $this->render('test/act3');
		}
	}
