<?php 
	require_once 'models/reporte.php';
	class reporteController{

		public function index() {
			require_once 'views/usuario/home.php';
		}

		public function usuarios() {
			if($_POST){
				$docid = isset($_POST['docid']) ? $_POST['docid'] : false;

				if($docid) {
					$report = new Reporte();
					$users = $report->getByUser($docid);
				}
			}
			require_once 'views/usuario/reporte_usuario.php';
			
		}

		public function todos_los_usuarios() {

			$report = new Reporte();
			$todos = $report->getAll();

			require_once 'views/usuario/home.php';

		}
	}
 ?>