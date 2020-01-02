<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
	<strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
	<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header" style="text-align: center;">REGISTRAR USUARIO</div>
				<div class="card-body">
					<form action="<?=base_url?>usuario/save" method="POST">
						<div class="row" align="center">
							<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<label for="docid">DOCUMENTO DE IDENTIDAD</label>
								<input type="number" name="docid" class="form-control" required/>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<label for="nombre">NOMBRE</label>
								<input type="text" name="nombre" class="form-control" required/>
							</div>
							<div class="col-sm-6">
								<label for="apellidos">APELLIDOS</label>
								<input type="text" name="apellidos" class="form-control" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label for="puesto_votacion">DIRECCIÓN PUESTO DE VOTACION</label>
								<input type="text" name="puesto_votacion" class="form-control" required/>
							</div>
							<div class="col-sm-6">
								<label for="mesa_votacion">MESA DE VOTACIÓN</label>
								<input type="text" name="mesa_votacion" class="form-control" required/>							
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label for="direccion">DIRECCIÓN</label>
								<input type="text" name="direccion" class="form-control" required/>
							</div>
							<div class="col-sm-6">
								<label for="barrio">BARRIO</label>
								<input type="text" name="barrio" class="form-control" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label for="celular">CELULAR</label>
								<input type="text" name="celular" class="form-control">
							</div>
							<div class="col-sm-6">
								<label for="telefono">TELEFONO</label>
								<input type="text" name="telefono" class="form-control"/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label for="profesion">PROFESIÓN</label>
								<input type="text" name="profesion" class="form-control">
							</div>
							<div class="col-sm-6">
								<label for="ocupacion">OCUPACIÓN</label>
								<?php $ocupaciones = Utils::showOcupaciones(); ?>
								<select name="ocupacion" class="form-control">
									<option value="0">seleccione...</option>
									<?php while($oc = $ocupaciones->fetch_object()): ?>
									<option value="<?= $oc->id ?>"><?=$oc->nombre?></option>
								<?php endwhile; ?>
								</select>
							</div>
						</div>
						<?php if(isset($_SESSION['admin'])): ?>
						<div class="row">
							<div class="col-sm-6">
								<label for="password">CONTRASEÑA</label>
								<input type="password" name="password" id="con1" class="form-control" required/>
							</div>
							<div class="col-sm-6">
								<label for="password">CONFIRME CONTRASEÑA</label>
								<input type="password" name="passwordconf" id="con2" class="form-control" required/>
							</div>	
						</div>
						<?php endif ?>
						<div class="row">
							<div class="col-sm-6">
								<label for="email">EMAIL</label>
								<input type="email" name="email" class="form-control"/>
							</div>			
						<?php if(isset($_SESSION['admin'])): ?>				
							<div class="col-sm-6">
								<label for="tipo_usuario">TIPO DE USUARIO</label>
								<?php $tipoU = Utils::showTipoUsuario(); ?>
								<select name="tipo_usuario" class="form-control">
									<option value="0">seleccione...</option>
									<?php while($tu = $tipoU->fetch_object()): ?>
									<option value="<?= $tu->id ?>"><?=$tu->nombre?></option>
								<?php endwhile; ?>
								</select>
							</div>
						<?php endif ?>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<input type="submit" id="registrar" value="Registrar" onclick="validarPass(event)" class="form-control btn btn-primary btn-sm"/>	
							</div>
							<div class="col-sm-6">
								<a href="https://wsp.registraduria.gov.co/censo/consultar/" class="btn btn-primary btn-sm form-control" target="_blacnk">Consultar puesto de votación</a>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>