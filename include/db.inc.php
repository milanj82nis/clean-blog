<?php 
session_start();
date_default_timezone_set('Europe/Belgrade');

class DbConnect {

	private $host = 'localhost';

	private $dbname = 'clean-blog';

	private $username = 'root';

	private $password = '';

	protected function connect(){


		try {

			$sql = 'mysql:host='. $this -> host .';dbname='. $this -> dbname ;

			$pdo = new PDO ( $sql , $this -> username , $this -> password );

			$pdo -> setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );

			$pdo -> setAttribute ( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );

			$pdo -> exec ( 'set names utf-8');

			return $pdo;
		
		} catch ( PDOException $e) {

			echo $e -> getMessage();

		}

		
	}// connect 



}// DbConnect
