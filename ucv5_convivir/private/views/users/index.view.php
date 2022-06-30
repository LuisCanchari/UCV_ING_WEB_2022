<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]); ?>
	<a href="<?= ROOT ?>/usuarios/create">
		<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New</button>
	</a>
	<div class="card-group justify-content-center">
		<?php if ($rows) : ?>
			<?php foreach ($rows as $row) : ?>
				<?php
				$image = get_image($row->image, $row->persona->genero);
				?>
				<div class="card m-2 shadow-sm" style="max-width: 12rem;min-width: 12rem;">
					<img src="<?= $image ?>" class=" rounded-circle card-img-top w-75 d-block mx-auto mt-" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title"> <?= $row->persona->nombre ?> <?= $row->persona->apellido_1 ?></h5>
						<p class="card-text"><?=str_replace("_", " ", $row->rol)?></p>
						
						<a href="<?= ROOT ?>/usuarios/show/<?= $row->id ?>" class="btn btn-secondary">Perfil</a>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else : ?>
			<h4>No se encontro usuarios</h4>
		<?php endif; ?>
	</div>
</div>

<?php $this->view('includes/footer') ?>