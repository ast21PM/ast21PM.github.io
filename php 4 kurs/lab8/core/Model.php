<?php
	namespace Core;
	
	class Model
	{
		private static $link;
		
	public function __construct()
	{
		if (!self::$link) {
			$link = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if (!$link) {
				$error = mysqli_connect_error();
				throw new \Exception("Ошибка подключения к базе данных: " . $error . ". Проверьте настройки подключения в файле /project/config/connection.php");
			}
			self::$link = $link;
			mysqli_query(self::$link, "SET NAMES 'utf8'");
		}
	}
		
		protected function findOne($query)
		{
			$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
			return mysqli_fetch_assoc($result);
		}
		
		protected function findMany($query)
		{
			$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
			for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
			
			return $data;
		}
	}
