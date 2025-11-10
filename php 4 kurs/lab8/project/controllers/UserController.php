<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class UserController extends Controller
	{
		private $users = [
			1 => ['name'=>'user1', 'age'=>'23', 'salary' => 1000],
			2 => ['name'=>'user2', 'age'=>'24', 'salary' => 2000],
			3 => ['name'=>'user3', 'age'=>'25', 'salary' => 3000],
			4 => ['name'=>'user4', 'age'=>'26', 'salary' => 4000],
			5 => ['name'=>'user5', 'age'=>'27', 'salary' => 5000],
		];
		
		public function show($params) {
			$this->title = 'Информация о пользователе';
			
			$id = isset($params['id']) ? (int)$params['id'] : 0;
			
			if (isset($this->users[$id])) {
				$data = [
					'id' => $id,
					'user' => $this->users[$id]
				];
				return $this->render('user/show', $data);
			} else {
				$data = ['id' => $id];
				return $this->render('user/notFound', $data);
			}
		}
		
		public function info($params) {
			$this->title = 'Информация о пользователе';
			
			$id = isset($params['id']) ? (int)$params['id'] : 0;
			$key = isset($params['key']) ? $params['key'] : '';
			
			if (isset($this->users[$id])) {
				if (isset($this->users[$id][$key])) {
					$data = [
						'id' => $id,
						'key' => $key,
						'value' => $this->users[$id][$key]
					];
					return $this->render('user/info', $data);
				} else {
					$data = [
						'id' => $id,
						'key' => $key
					];
					return $this->render('user/keyNotFound', $data);
				}
			} else {
				$data = ['id' => $id];
				return $this->render('user/notFound', $data);
			}
		}
		
		public function all() {
			$this->title = 'Список всех пользователей';
			
			$data = ['users' => $this->users];
			return $this->render('user/all', $data);
		}
		
		public function first($params) {
			$this->title = 'Первые пользователи';
			
			$n = isset($params['n']) ? (int)$params['n'] : 0;
			$firstUsers = array_slice($this->users, 0, $n, true);
			
			$data = [
				'n' => $n,
				'users' => $firstUsers
			];
			
			return $this->render('user/first', $data);
		}
	}
