<?php
require_once 'models/usuario.php';

class usuarioController{
	
	public function index(){
		require_once 'views/usuario/index.php';
	}
	
	public function registro(){
		if(isset($_SESSION['identity'])){
			require_once 'views/usuario/registro.php';
		}else{
			header('Location:'.base_url);
		}
		
	}
	
	public function save(){
		$usuario_registra = $_SESSION['identity']->docid;
		if(isset($_POST)){
			$docid= isset($_POST['docid']) ? $_POST['docid'] : false; 
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$puestov = isset($_POST['puesto_votacion']) ? $_POST['puesto_votacion'] : false;
			$mesav = isset($_POST['mesa_votacion']) ? $_POST['mesa_votacion'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			$barrio = isset($_POST['barrio']) ? $_POST['barrio'] : false;
			$celular = isset($_POST['celular']) ? $_POST['celular'] : false;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
			$profesion = isset($_POST['profesion']) ? $_POST['profesion'] : false;
			$ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : 'NULL';
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$tipousu = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : 'NULL';
		
			if($docid && $nombre && $apellidos && $puestov && $mesav && $direccion && $barrio){

				$usuario = new Usuario();
				$usuario->setDocid($docid);
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setPuestoVotacion($puestov);
				$usuario->setMesaVotacion($mesav);
				$usuario->setDireccion($direccion);
				$usuario->setBarrio($barrio);
				$usuario->setCelular($celular);
				$usuario->setTelefono($telefono);
				$usuario->setProfesion($profesion);
				$usuario->setOcupacion($ocupacion);
				$usuario->setUsuarioRegistra($usuario_registra);
				$usuario->setPassword($password);
				$usuario->setEmail($email);
				$usuario->setTipoUsuario($tipousu);

				$save = $usuario->save();
				if($save){
					$_SESSION['register'] = "complete";
				}else{
					$_SESSION['register'] = "failed";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
		}else{
			$_SESSION['register'] = "failed";
		}
		header("Location:".base_url.'usuario/registro');
	}
	
	public function login(){
		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setDocid($_POST['docid']);
			$usuario->setPassword($_POST['password']);
			
			$identity = $usuario->login();
			
			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
				header("Location:".base_url.'usuario/registro');
				if($identity->tipo_usuario == 2){
					$_SESSION['admin'] = true;
				}
			}else{
				$_SESSION['error_login'] = 'Identificación fallida !!';
				header("Location:".base_url.'usuario/index');
			}
		
		}
	}

	public function home(){

	require_once 'views/usuario/home.php';

	}

	/*public function reporte_usuario() {
		require_once 'views/usuario/reporte_usuario.php';
	}*/
	
	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		header("Location:".base_url);
	}
	
} // fin clase