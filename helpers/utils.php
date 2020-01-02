<?php

class Utils{
	
	public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
		
		return $name;
	}
	
	public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}

	public static function showOcupaciones() {
		$db = Database::connect();
		$sql="SELECT * FROM tbl_ocupacion ORDER BY id DESC";
		$ocupaciones = $db->query($sql);
		if($ocupaciones){
			return $ocupaciones;
		}else{
			return false;
		}
	}

	public static function showTipoUsuario() {
		$db = Database::connect();
		$sql="SELECT * FROM tbl_tipo_usuario ORDER BY id DESC";
		$tipoU = $db->query($sql);
		if($tipoU){
			return $tipoU;
		}else{
			return false;
		}
	}
	
}
