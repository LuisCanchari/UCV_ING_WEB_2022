<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]); ?>
	<a href="<?= ROOT ?>/personas/create">
		<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New</button>
	</a>

	<div class="card-group justify-content-center">
		<?php if ($rows) : ?>
			<?php foreach ($rows as $row) : ?>
				<?=$row->nombre?>
				
				
			<?php endforeach; ?>
		<?php else : ?>
			<h4>No se encontro usuarios</h4>
		<?php endif; ?>
	</div>


</div>

<?php $this->view('includes/footer') ?>