<?php

class Connection{
		public static function getConnection(){
			$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
			$params = self::getParam();
			$dsn = sprintf('%s:host=%s;dbname=%s', $params[0], $params[1], $params[2]);
			return new PDO($dsn, $params[3], $params[4], $options);
		}
		
		private static function getParam(){
			return explode(';', file_get_contents('database/config.properties'));
		}
}