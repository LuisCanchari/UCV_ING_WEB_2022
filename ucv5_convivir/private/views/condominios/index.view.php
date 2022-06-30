<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>
	<h5>Condominios</h5>
	
	<div class="card-group justify-content-center">
		<table class="table table-striped table-hover">
			<tr>
				<th></th>
				<th>Condominio</th>
				<th>Ciudad</th>
				<th>Direccion </th>
				<th>Fecha</th>
				<th>
					<a href="<?= ROOT ?>/condominios/create">
						<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Nuevo</button>
					</a>
				</th>
			</tr>
			<?php if ($rows) : ?>

				<?php foreach ($rows as $row) : ?>

					<tr>
						<td><button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i></button></td>
						<td><?= $row->name ?></td>
						<td><?= $row->city ?></td>
						<td><?= $row->address?></td>
						<td><?= get_date($row->date) ?></td>

						<td>
							<a href="<?= ROOT ?>/condominios/edit/<?= $row->id ?>">
								<button class="btn-sm btn btn-info text-white"><i class="fa fa-edit"></i></button>
							</a>

							<a href="<?= ROOT ?>/condominios/destroy/<?= $row->id ?>">
								<button class="btn-sm btn btn-danger"><i class="fa fa-trash-alt"></i></button>
							</a>

							<a href="<?= ROOT ?>/users/switch_condominio/<?= $row->id ?>">
								<button class="btn-sm btn btn-success">Cambiar a <i class="fa fa-chevron-right"></i></button>
							</a>
						</td>
					</tr>

				<?php endforeach; ?>
			<?php else : ?>
				<h4>No se encontro condiminios</h4>
			<?php endif; ?>

		</table>
	</div>
</div>


<?php $this->view('includes/footer') ?>