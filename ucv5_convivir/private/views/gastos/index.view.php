<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>

	<div class="row">
		<div class="col-4">
			<h5>Documentos de <?= Auth::getCondominio_name(); ?></h5>
		</div>
		<div class="col-4">

			<a href="<?= ROOT ?>/gastos/report" target="_blank">
				<button class="btn btn-sm btn-success"><i class="fa fa-file"></i>Reporte</button>
			</a>
		</div>
	</div>



	<div class="card-group justify-content-center">
		<table class="table table-striped table-hover">
			<tr>
				<th></th>
				<th>Documento</th>
				<th>Monto</th>
				<th>Descripcion </th>
				<th>Fecha</th>
				<th>
					<a href="<?= ROOT ?>/gastos/create">
						<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Nuevo</button>
					</a>
				</th>
			</tr>
			<?php if ($rows) : ?>

				<?php foreach ($rows as $row) : ?>

					<tr>
						<td><a href="<?= ROOT ?>/gastos/show/<?= $row->id ?>">
								<button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i></button>
							</a>
						</td>
						<td><?= $row->type ?> <?= $row->number ?></td>
						<td><?= $row->total ?></td>
						<td><?= $row->description ?></td>
						<td><?= get_date($row->date) ?></td>

						<td>
							<a href="<?= ROOT ?>/gastos/edit/<?= $row->id ?>">
								<button class="btn-sm btn btn-info text-white"><i class="fa fa-edit"></i></button>
							</a>

							<a href="<?= ROOT ?>/gastos/destroy/<?= $row->id ?>">
								<button class="btn-sm btn btn-danger"><i class="fa fa-trash-alt"></i></button>
							</a>

						</td>
					</tr>

				<?php endforeach; ?>
			<?php else : ?>
				<h4>No se encontro documentos</h4>
			<?php endif; ?>

		</table>
	</div>
</div>


<?php $this->view('includes/footer') ?>