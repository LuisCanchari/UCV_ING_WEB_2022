<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
		<?php $this->view('includes/crumbs', ['crumbs' => $crumbs])?>
	
		<?php if ($row):;?>
		<div class="card-group justify-content-center">

		<form action="<?=ROOT?>/condominios/update/<?=$row[0]->id;?>" method="POST">

			<h3>Editar Condominio</h3>

			
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
				
				<input class="my-2 form-control" value="<?=get_var('name',$row[0]->name) ?>" type="text" name="name" placeholder="Nombre Condominio">
				<input class="my-2 form-control" value="<?=get_var('city',$row[0]->city) ?>" type="text" name="city" placeholder="Ciudad">
				<input class="my-2 form-control" value="<?=get_var('city',$row[0]->address) ?>" type="text" name="address" placeholder="Direccion">

				<br>
				<input class="btn btn-primary float-end" type="submit" value="Actualizar">
				<a href="<?= ROOT ?>/condominios">
					<input class="btn btn-danger" type="button" value="Cancelar">
				</a>
			
		</form>
	</div>
<?php else : ?>

	<div style="text-align: center;">
		<h3>El condomino no existe</h3>
		<div class="clearfix"></div>
		<br><br>
		<a href="<?= ROOT ?>/condominios">
			<input class="btn btn-danger" type="button" value="Cancel">
		</a>
	</div>
<?php endif; ?>


</div>
<?php $this->view('includes/footer') ?>