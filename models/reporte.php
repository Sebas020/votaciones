<?php 
	class Reporte{
		private $db;

		public function __construct() {
			$this->db = Database::connect();
		}

		public function getByUser($user) {
			$sql = "SELECT u.docid, u.nombre, u.apellidos, u.direccion, u.barrio,u.celular, u.telefono, u.profesion,u.puesto_votacion, u.mesa_votacion, o.nombre as 'ocupacion', u.usuario_registra FROM tbl_usuarios as u INNER JOIN tbl_ocupacion as o 
				ON u.ocupacion = o.id 
				WHERE usuario_registra = $user";

			$users = $this->db->query($sql);

			$result = false;
			if($users && !$this->db->error){ 
				$result = $users;
			}
			return $result;
		}

		public function getAll(){
			$sql = "SELECT * FROM tbl_usuarios ORDER BY docid";

			$user = $this->db->query($sql);

			$result = false;
			if($user && !$this->db->error){ 
				$result = $user;
			}
			return $result;
		}
	}
 ?>