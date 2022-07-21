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
				<div class="card-header  text-white bg-primary mb-3">Datos de inmueble</div>
					<div class="card-body">
						<p class="card-text"><?= ucfirst(esc($row->tipo)) ?> <?= esc($row->numeracion) ?></p>
						<p class="card-text">Area M2: <?= esc($row->area) ?></p>
						<?php if (Auth::access('admin')) : ?>
							<a href="<?= ROOT ?>/inmuebles/edit/<?= $row->id ?>">
								<button class="btn-sm btn btn-success">Edit</button>
							</a>
							<a href="<?= ROOT ?>/inmuebles/destroy/<?= $row->id ?>">
								<button class="btn-sm btn btn-danger">Delete</button>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header  text-white bg-primary mb-3">Propietario</div>
					<div class="card-body ">
						<p class="card-text">Nombre: <?= esc($row->propietario ? $row->propietario->nombre : '') ?></p>
						<p class="card-text">Apellido paterno: <?= esc($row->propietario ? $row->propietario->apellido_1 : '') ?></p>
						<p class="card-text">Apellido materno: <?= esc($row->propietario ? $row->propietario->apellido_2 : '') ?></p>
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
			<a href="<?= ROOT ?>/inmuebles/residente_add/<?= $row->id ?>">
				<button class="btn-sm btn btn-primary">Añadir Residentes</button>
			</a>
			<?php if ($row->residentes) : ?>
				<?php foreach ($row->residentes as $key => $residente) : ?>
					<p class="card-text"><?= $residente->nombre ?> <?= $residente->apellido_1 ?> <?= $residente->apellido_2 ?>
						<a href="<?= ROOT ?>/inmuebles/residente_del/<?= $residente->id ?>"><span class="badge bg-danger">x</span></a>
					</p>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div>
</div>

<?php $this->view('includes/footer') ?>