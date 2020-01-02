<?php if(isset($_SESSION['error_login'])): ?>
	<strong class="alert_red"><?=$_SESSION['error_login']?></strong>
<?php endif; ?>
<?php Utils::deleteSession('error_login'); ?>
<div class="container" style="height: 26em;">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header" align="center">INGRESO</div>
				<div class="card-body">
					<form method="POST" action="<?=base_url?>usuario/login" class="form-control">
						<label for="dpcid">Documento</label>
						<input type="number" name="docid" class="form-control" />
						<label for="password">Contraseña</label>
						<input type="password" name="password" class="form-control" />
						<br>
						<input type="submit" value="Enviar" class="form-control input-sm btn btn-success" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>