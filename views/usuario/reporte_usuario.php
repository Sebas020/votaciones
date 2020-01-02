<?php Utils::isAdmin();?>
<h1 style="text-align: center;">Reportes</h1>
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">Documento Lider</div>
				<div class="card-body">
					<form action="<?=base_url?>reporte/usuarios" method="POST">
				<input type="number" name="docid" class="form-control input-sm">
				<br>
				<input type="submit" value="Enviar" class="form-control btn btn-success btn-sm">
			</form>
				</div>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
<br>


<table class="table table-hover table-sm table-responsive table-striped table-bordered">
	<thead class="thead-dark">
		<tr>
			<th scope="col">Docid</th>
			<th scope="col">Nombres</th>
			<th scope="col">Apellidos</th>
			<th scope="col">Email</th>
			<th scope="col">Dirección</th>
			<th scope="col">Barrio</th>
			<th scope="col">Celular</th>
			<th scope="col">Teléfono</th>
			<th scope="col">Profesión</th>
			<th scope="col">Puesto de votación</th>
			<th scope="col">Mesa de votación</th>
			<th scope="col">Ocupación</th>
			<th scope="col">Usuario que lo registro</th>
		</tr>
	</thead>
	<tbody>
		<?php if(@$users && is_object($users)): ?>
			<?php while($us = @$users->fetch_object()): ?>
				<tr>
					<td><?=$us->docid?></td>
					<td><?=$us->nombre?></td>
					<td><?=$us->apellidos?></td>
					<td><?=@$us->email?></td>
					<td><?=$us->direccion?></td>
					<td><?=$us->barrio?></td>
					<td><?=@$us->celular?></td>
					<td><?=@$us->telefono?></td>
					<td><?=@$us->profesion?></td>
					<td><?=$us->puesto_votacion?></td>
					<td><?=$us->mesa_votacion?></td>
					<td><?=@$us->ocupacion?></td>
					<td><?=$us->usuario_registra?></td>
				</tr>
			<?php endwhile; ?>
		<?php endif; ?>
	</tbody>
</table>