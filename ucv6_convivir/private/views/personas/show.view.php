<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>

	<?php if ($row) : ?>

		<?php
 			$image = get_image($row->image,$row->gender);
 		?>

		<div class="row">
			<div class="col-sm-4 col-md-3">
				<img src="<?= $image ?>" class="border border-primary d-block mx-auto rounded-circle " style="width:150px;">
				<h3 class="text-center"><?= esc($row->firstname) ?> <?= esc($row->lastname) ?></h3>
				<br>
				<?php if (Auth::access('admin')) : ?>
					<div class="text-center">
						<a href="<?= ROOT ?>/users/edit/<?= $row->id ?>">
							<button class="btn-sm btn btn-success">Edit</button>
						</a>
						<a href="<?= ROOT ?>/users/destroy/<?= $row->id ?>">
							<button class="btn-sm btn btn-danger">Delete</button>
						</a>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-8 col-md-9 bg-light p-2">
				<table class="table table-hover table-striped table-bordered">
					<tr>
						<th>Nombre :</th>
						<td><?= esc($row->firstname) ?></td>
					</tr>
					<tr>
						<th>Apellido:</th>
						<td><?= esc($row->lastname) ?></td>
					</tr>
					<tr>
						<th>Email:</th>
						<td><?= esc($row->email) ?></td>
					</tr>
					<tr>
						<th>Genero:</th>
						<td><?= esc($row->gender) ?></td>
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