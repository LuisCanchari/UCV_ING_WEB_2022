<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>

	<?php if ($row) : ?>
		<div class="card-group justify-content-center">
			<form method="post">
				<h3>Estas seguro de eliminar el documento?!</h3>
				<input type="hidden" value="<?= get_var('type', $row[0]->id) ?>" name="hidden">
				<input disabled autofocus class="form-control" value="<?= get_var('type', $row[0]->type) ?> <?= get_var('number', $row[0]->number) ?>" type="text" name="gasto" ><br><br>

				<input class="btn btn-danger float-end" type="submit" value="Eliminar">

				<a href="<?= ROOT ?>/gastos">
					<input class="btn btn-success" type="button" value="Cancelar">
				</a>
			</form>
		</div>
	<?php else : ?>

		<div style="text-align: center;">
			<h3>No se encuentra el Documento</h3>
			<div class="clearfix"></div>
			<br><br>
			<a href="<?= ROOT ?>/gasto">
				<input class="btn btn-danger" type="button" value="Cancel">
			</a>
		</div>
	<?php endif; ?>
</div>

<?php $this->view('includes/footer') ?>