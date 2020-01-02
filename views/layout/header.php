<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registro votantes</title>
	<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
	<link rel="stylesheet" href="<?=base_url?>assets/bootstrap/dist/css/bootstrap.min.css" />
	<script src="<?=base_url?>assets/js/jquery.min.js"></script>
	<script src="<?=base_url?>helpers/main.js"></script>
	<script src="<?=base_url?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body><br/>
	<div id="container" style="margin-top: -1.2em;">
		<div class="navbar navbar-expand-lg navbar-light bg-light">
			<div id="logo">
				<img src="<?=base_url?>assets/img/Bello.jpeg" alt="Logo" />
				<a href="<?=base_url?>usuario/registro">
					Registro votantes
				</a>
			</div>
			<?php if(@$_SESSION['identity']): ?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				<?php if(@$_SESSION['admin']): ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Reportes
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="<?=base_url?>reporte/todos_los_usuarios">Todos los usuario</a>
				          <a class="dropdown-item" href="<?=base_url?>reporte/usuarios">Usuarios por líderes</a>
        				</div>
					</li>
				<?php endif; ?>
						<li class="nav-item my-2, my-lg-0, mr-sm-0, my-sm-0"><a class="nav-link" href="<?=base_url?>usuario/logout">Salir</a></li>
					</ul>
				</div>
			<?php endif; ?>
			</div>
			<br>

			<div id="content">