<?php

class Usuario{
	private $docid;
	private $nombre;
	private $apellidos;
	private $email;
	private $direccion;
	private $barrio;
	private $celular;
	private $telefono;
	private $profesion;
	private $puesto_votacion;
	private $mesa_votacion;
	private $ocupacion;
	private $tipo_usuario;
	private $password;
	private $usuario_registra;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getDocid() {
		return $this->docid;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getApellidos() {
		return $this->apellidos;
	}

	function getEmail() {
		return $this->email;
	}

	function getDireccion() {
		return $this->direccion;
	}

	function getBarrio() {
		return $this->barrio;
	}

	function getCelular() {
		return $this->celular;
	}

	function getTelefono() {
		return $this->telefono;
	}

	function getProfesion() {
		return $this->profesion;
	}

	function getPuestoVotacion() {
		return $this->puesto_votacion;
	}

	function getMesaVotacion() {
		return $this->mesa_votacion;
	}

	function getOcupacion() {
		return $this->ocupacion;
	}

	function getUsuarioRegistra() {
		return $this->usuario_registra;
	}

	function getTipoUsuario() {
		return $this->tipo_usuario;
	}

	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function setDocid($docid) {
		$this->docid = $docid;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setApellidos($apellidos) {
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	function setDireccion($direccion) {
		$this->direccion = $this->db->real_escape_string($direccion);
	}

	function setBarrio($barrio) {
		$this->barrio = $this->db->real_escape_string($barrio);
	}

	function setCelular($celular) {
		$this->celular = $this->db->real_escape_string($celular);
	}

	function setTelefono($telefono) {
		$this->telefono = $this->db->real_escape_string($telefono);
	}

	function setProfesion($profesion) {
		$this->profesion = $this->db->real_escape_string($profesion);
	}

	function setPuestoVotacion($puesto_votacion) {
		$this->puesto_votacion = $this->db->real_escape_string($puesto_votacion);
	}

	function setMesaVotacion($mesa_votacion) {
		$this->mesa_votacion = $this->db->real_escape_string($mesa_votacion);
	}

	function setOcupacion($ocupacion) {
		$this->ocupacion = $this->db->real_escape_string($ocupacion);
	}

	function setUsuarioRegistra($usuario_registra) {
		$this->usuario_registra = $this->db->real_escape_string($usuario_registra);
	}

	function setTipoUsuario($tipo_usuario) {
		$this->tipo_usuario = $this->db->real_escape_string($tipo_usuario);
	}

	function setPassword($password) {
		$this->password = $password;
	}

	public function save(){
		$sql = "INSERT INTO tbl_usuarios VALUES('{$this->getDocid()}', '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}','{$this->getDireccion()}','{$this->getBarrio()}','{$this->getCelular()}','{$this->getTelefono()}','{$this->getProfesion()}','{$this->getPuestoVotacion()}','{$this->getMesaVotacion()}',{$this->getOcupacion()},{$this->getTipoUsuario()}, '{$this->getPassword()}', '{$this->getUsuarioRegistra()}');";
		$save = $this->db->query($sql);
		$result = false;

		if($save && !$this->db->error){
			$result = true;
		}else{
			return false;
		}

		return $result;
	}
	
	public function login(){
		$result = false;
		$docid = $this->docid;
		$password = $this->password;
		
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM tbl_usuarios WHERE docid = '$docid'";
		$login = $this->db->query($sql);
		
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		
		return $result;
	}
	
	
	
}