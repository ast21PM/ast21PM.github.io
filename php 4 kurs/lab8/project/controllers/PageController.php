<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Page;
	
	class PageController extends Controller
	{
		private $pages = [
			1 => ['title'=>'страница 1', 'text'=>'текст страницы 1'],
			2 => ['title'=>'страница 2', 'text'=>'текст страницы 2'],
			3 => ['title'=>'страница 3', 'text'=>'текст страницы 3'],
		];
		
		public function show1() {
			$this->title = 'Страница 1';
			return $this->render('page/show1');
		}
		
		public function show2() {
			$this->title = 'Страница 2';
			return $this->render('page/show2');
		}
		
		public function show($params) {
			$id = isset($params['id']) ? (int)$params['id'] : 0;
			
			if (isset($this->pages[$id])) {
				$page = $this->pages[$id];
				$this->title = $page['title'];
				
				$data = [
					'id' => $id,
					'page' => $page
				];
				
				return $this->render('page/show', $data);
			} else {
				$this->title = 'Страница не найдена';
				$data = ['id' => $id];
				return $this->render('page/notFound', $data);
			}
		}
		
		public function test() {
			$this->title = 'Тест модели Page';
			$page = new Page; 
		
			$data = $page->getById(3);
			var_dump($data);
			
			$data = $page->getById(5); 
			var_dump($data);
			
			$data = $page->getByRange(2, 5); 
			var_dump($data);
		}
	}
