<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>

	<?php if ($row) : ?>

		<?php
 			$image = get_image($row->image, $row->persona->genero);
 		?>

		<div class="row">
			<div class="col-sm-4 col-md-3">
				<img src="<?= $image ?>" class="border border-primary d-block mx-auto rounded-circle " style="width:150px;">
				<h3 class="text-center"><?= esc($row->persona->nombre) ?> <?= esc($row->persona->apellido_1) ?></h3>
				<br>
				<?php if (Auth::access('admin')) : ?>
					<div class="text-center">
						<a href="<?= ROOT ?>/usuarios/edit/<?= $row->id ?>">
							<button class="btn-sm btn btn-success">Edit</button>
						</a>
						<a href="<?= ROOT ?>/usuarios/destroy/<?= $row->id ?>">
							<button class="btn-sm btn btn-danger">Delete</button>
						</a>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-8 col-md-9 bg-light p-2">
				<table class="table table-hover table-striped table-bordered">
					
					<tr>
						<th>Nombre :</th>
						<td><?= esc($row->persona->nombre) ?></td>
					</tr>
					<tr>
						<th>Apellidos:</th>
						<td><?= esc($row->persona->apellido_1) ?> <?= esc($row->persona->apellido_2) ?></td>
					</tr>
					
					<tr>
						<th>Documento:</th>
						<td><?= strtoupper($row->persona->doc_tipo) ?> : <?= esc($row->persona->doc_numero) ?></td>
					</tr>

					<tr>
						<th>Email:</th>
						<td><?= esc($row->email) ?></td>
					</tr>
					<tr>
						<th>Genero:</th>
						<td><?= esc($row->persona->genero) ?></td>
					</tr>
					<tr>
						<th>Rol:</th>
						<td><?= ucwords(str_replace("_", " ", $row->rol)) ?></td>
					</tr>
					<tr>
						<th>Fecha Creacion:</th>
						<td><?= get_date($row->date) ?></td>
					</tr>

				</table>
			</div>
		</div>
		<br>
		
	<?php else : ?>
		<center>
			<h4>That profile was not found!</h4>
		</center>
	<?php endif; ?>

</div>

<?php $this->view('includes/footer') ?>