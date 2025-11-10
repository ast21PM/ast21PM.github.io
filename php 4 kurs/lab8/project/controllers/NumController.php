<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class NumController extends Controller
	{
		public function sum($params) {
			$this->title = 'Сумма чисел';
			
			$n1 = isset($params['n1']) ? (int)$params['n1'] : 0;
			$n2 = isset($params['n2']) ? (int)$params['n2'] : 0;
			$n3 = isset($params['n3']) ? (int)$params['n3'] : 0;
			$sum = $n1 + $n2 + $n3;
			
			$data = [
				'n1' => $n1,
				'n2' => $n2,
				'n3' => $n3,
				'sum' => $sum
			];
			
			return $this->render('num/sum', $data);
		}
	}
