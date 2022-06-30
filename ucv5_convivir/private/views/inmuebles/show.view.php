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
					<div class="card-body">
						<h5 class="card-title">Propietario</h5>
						<p class="card-text">Nombre: <?= esc($row->propietario->nombre) ?></p>
						<p class="card-text">Apellido paterno: <?= esc($row->propietario->apellido_1) ?></p>
						<p class="card-text">Apellido materno: <?= esc($row->propietario->apellido_2) ?></p>
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
			<a href="<?= ROOT ?>/resindentes/add/<?= $row->id ?>">
				<button class="btn-sm btn btn-primary">Añadir Residentes</button>
			</a>
			<?php foreach ($row->residentes as $key => $residente) : ?>
				<p class="card-text"><?= $residente->nombre ?> <?= $residente->apellido_1 ?> <?= $residente->apellido_2 ?></p>
			<?php endforeach ?>

			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Launch demo modal
			</button>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<?php $this->view('includes/footer') ?>