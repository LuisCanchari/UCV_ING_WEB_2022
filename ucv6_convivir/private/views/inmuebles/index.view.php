<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>

	<div class="row">
		<div class="col-4">
			<h5>Viviendas de <?= Auth::getCondominio_name(); ?></h5>
		</div>
	</div>
	<div class="card-group justify-content-center">
		<table class="table table-striped table-hover">
			<tr>
				<th></th>
				<th>Tipo</th>
				<th>Numeracion</th>
				<th>Propietario</th>
				<th>
					<a href="<?= ROOT ?>/inmuebles/create">
						<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Nuevo</button>
					</a>
				</th>
			</tr>
			<?php if ($rows) : ?>

				<?php foreach ($rows as $row) : ?>

					<tr>
						<td><a href="<?= ROOT ?>/inmuebles/show/<?= $row->id ?>">
								<button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i></button>
							</a>
						</td>
						<td><?= $row->tipo ?></td>
						<td><?= $row->numeracion ?></td>
						<td><?= $row->propietario->nombre??''?> <?= $row->propietario->apellido_1??''?> </td>
						<td>
							<a href="<?= ROOT ?>/inmuebles/edit/<?= $row->id ?>">
								<button class="btn-sm btn btn-info text-white"><i class="fa fa-edit"></i></button>
							</a>

							<a href="<?= ROOT ?>/inmuebles/destroy/<?= $row->id ?>">
								<button class="btn-sm btn btn-danger"><i class="fa fa-trash-alt"></i></button>
							</a>

						</td>
					</tr>

				<?php endforeach; ?>
			<?php else : ?>
				<h4>No se encontro inmuebles</h4>
			<?php endif; ?>
		</table>
	</div>
</div>

<?php $this->view('includes/footer') ?>