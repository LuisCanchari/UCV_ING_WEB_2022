<?php

use Mpdf\Tag\Li;

$this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>

	<?php if ($row) : ?>
		<div class="row">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Datos de inmueble</h5>
						<p class="card-text"><?= ucfirst(esc($row->tipo)) ?> <?= esc($row->numeracion) ?></p>
						<p class="card-text">Area M2: <?= esc($row->area) ?></p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Propietario</h5>
						<p class="card-text">Nombre: <?= esc($row->propietario ? $row->propietario->nombre : '') ?></p>
						<p class="card-text">Apellido: <?= esc($row->propietario ? $row->propietario->apellido_1 : '') ?></p>

					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
		<center>
			<h4>No se encuentra el inmueble</h4>
		</center>
	<?php endif; ?>

	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item">
					<a class="nav-link active" href="#">Residentes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Cargos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="#">Abonos</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<form action="<?= ROOT ?>/inmuebles/residente_add/<?=$row->id?>" method="POST">
				<select class="my-2 form-control" name="doc_tipo">
					<option value="">--Seleccione tipo documento--</option>
					<option <?= get_select('doc_tipo', 'dni') ?> value="dni">Dni</option>
					<option <?= get_select('doc_tipo', 'ce') ?> value="ce">ce</option>
					<option <?= get_select('doc_tipo', 'otro') ?> value="otro">Otro</option>
				</select>

				<input class="my-2 form-control" value="<?= get_var('doc_numero') ?>" type="number" name="doc_numero" placeholder="Numero Documento" min="0">

				<input class="my-2 form-control" value="<?= get_var('nombre') ?>" type="text" name="nombre" placeholder="Nombre">
				<input class="my-2 form-control" value="<?= get_var('apellido_1') ?>" type="text" name="apellido_1" placeholder="Primer Apellido">
				<input class="my-2 form-control" value="<?= get_var('apellido_2') ?>" type="text" name="apellido_2" placeholder="Segundo Apellido">

				<select class="my-2 form-control" name="genero">
					<option value="">--Seleciona un genero--</option>
					<option <?= get_select('genero', 'masculino') ?> value="masculino">Masculino</option>
					<option <?= get_select('genero', 'femenino') ?> value="femenino">Femenino</option>
				</select>

				<button class="btn btn-primary float-end">Agregar User</button>
				<a href="<?=ROOT?>/inmuebles/show/<?=$row->id?>">
			 		<input class="btn btn-danger" type="button" value="Cancelar">
			 	</a>
			</form>
		</div>
	</div>
</div>

<?php $this->view('includes/footer') ?>