<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>

	<form action="<?= ROOT ?>/inmuebles/update/<?= $row->id ?>" method="POST">
		<center>
			<h3>Editar Inmueble</h3>
		</center>

		<div class="row">
			<div class="col-sm-4 col-md-3">
				<img src="<?= ROOT ?>/assets/no_image.jpg" class="border border-primary d-block mx-auto" style="width:100%">

			</div>
			<div class="col-sm-8 col-md-9">
				<?php if (count($errors) > 0) : ?>
					<div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
						<strong>Errors:</strong>
						<?php foreach ($errors as $error) : ?>
							<br><?= $error ?>
						<?php endforeach; ?>
						<span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</span>
					</div>

				<?php endif; ?>

				<div class="row my-2">
					<div class="form-group col-md-6">
						<label for="tipo">Tipo Inmueble</label>
						<select id="tipo" class="form-control" name="tipo">
							<option value="<?= $row->tipo ?>"><?= ucwords($row->tipo) ?></option>
							<option <?= get_select('tipo', 'departamento') ?> value="departamento">Departamento</option>
							<option <?= get_select('tipo', 'vivienda') ?> value="vivienda">Vivienda</option>
							<option <?= get_select('tipo', 'cochera') ?> value="cochera">Cochera</option>
							<option <?= get_select('tipo', 'deposito') ?> value="cochera">Deposito</option>
						</select>
					</div>

					<div class="form-group col-md-6">
						<label for="numeracion">Numeracion</label>
						<input type="text" value="<?= get_var('numeracion', $row->numeracion) ?>" class="form-control" id="numeracion" name="numeracion">
					</div>
				</div>

				<div class="row my-2">
					<div class="form-group col-md-6">
						<label for="area">Area</label>
						<input class="form-control" value="<?= get_var('area', $row->area) ?>" type="number" id="area" name="area" step="0.01">
					</div>
					
					<?php if (count($personas) > 0) : ?>
						<div class="form-group col-md-6">
							<label for="propietario">Propietarios</label>
							<select id="propietario" class="form-control" name="persona_id">

								<option <?= get_select('persona_id', $row->propietario ??$row->propietario->persona_id) ?> value="<?= $row->propietario ? $row->propietario->persona_id : '' ?>">
								<?php if ($row->propietario):?>
									<?= ucwords($row->propietario->nombre) ?> <?= ucwords($row->propietario->apellido_1) ?>
								<?php else:?>	
									---Selecionar---
								<?php endif;?>
								</option>

								<?php foreach ($personas as $key => $persona) : ?>
									<option value="<?= $persona->id ?>"><?= $persona->nombre ?> <?= $persona->apellido_1 ?></option>
								<?php endforeach ?>


							</select>

						</div>
					<?php endif ?>
				</div>

				<button class="btn btn-primary float-end">Guardar</button>
				<a href="<?= ROOT ?>/inmuebles">
					<input class="btn btn-danger" type="button" value="Cancelar">
				</a>
			</div>
		</div>
	</form>


</div>
<?php $this->view('includes/footer') ?>