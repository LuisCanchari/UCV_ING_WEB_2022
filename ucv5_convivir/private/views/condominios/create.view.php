<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>
	<div class="card-group justify-content-center">

		<form action="<?= ROOT ?>/condominios/store" method="POST">

			<h3>Nuevo Condominio</h3>

			<div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
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
				<img src="<?= ROOT ?>/assets/logocasa.png" class="border border-primary d-block mx-auto rounded-circle" style="width:100px;">

				<input class="my-2 form-control" value="<?= get_var('name') ?>" type="text" name="name" placeholder="Nombre Condominio">
				<input class="my-2 form-control" value="<?= get_var('city') ?>" type="text" name="city" placeholder="Ciudad">
				<input class="my-2 form-control" value="<?= get_var('address') ?>" type="text" name="address" placeholder="Direccion">

				<br>
				<button class="btn btn-primary float-end">Guardar</button>
				<a href="<?=ROOT?>/condominios">
			 		<input class="btn btn-danger" type="button" value="Cancelar">
			 	</a>
			</div>
		</form>
	</div>


</div>
<?php $this->view('includes/footer') ?>