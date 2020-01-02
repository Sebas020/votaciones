<?php

class Database{
	public static function connect(){
		$db = new mysqli('localhost', 'root', '', 'votaciones');
		$db->query("SET NAMES 'utf8'");
		$db->set_charset("utf8");
		return $db;
	}
}

