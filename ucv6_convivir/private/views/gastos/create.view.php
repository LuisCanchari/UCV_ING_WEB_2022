<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>

	<form action="<?= ROOT ?>/gastos/store" method="POST">
		<center>
			<h3>Nuevo Documento</h3>
		</center>

		<div class="row">
			<div class="col-sm-4 col-md-3">
				<img src="<?= ROOT ?>/assets/no_image.jpg" class="border border-primary d-block mx-auto" style="width:100%">

			</div>
			<div class="col-sm-8 col-md-9">
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

				<div class="row my-2">
					<div class="form-group col-md-6">
						<label for="type">Tipo Documento</label>
						<select id="type" class="form-control" name="type">
							<option selected>---Seleccionar---</option>
							<option value="boleta">Boleta</option>
							<option value="factura">Factura</option>
							<option value="recibo">Recibo</option>
							<option value="ticket">Ticket</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="number">Numero Documento</label>
						<input type="text" value="<?= get_var('number') ?>" class="form-control" id="number" name="number">
					</div>
				</div>

				<div class="row my-2">
					<div class="form-group col-md-6">
						<label for="date">Fecha Documento</label>
						<input class="form-control" value="<?= get_var('date') ?>" type="date" id="date" name="date">
					</div>
					<div class="form-group col-md-6">
						<label for="total">Monto del gasto</label>
						<input type="number" value="<?= get_var('total') ?>" class="form-control" id="total" name="total" step="0.01">
					</div>
				</div>

				<div class="row my-2">
					<div class="form-group col-md-6">
						<label for="year">Año Periodo</label>
						<input class="form-control" value="<?= get_var('year') ?>" type="number" id="year" name="year" step="1" min="2010">
					</div>
					<div class="form-group col-md-6">
						<label for="month">Mes Periodo</label>
						<input type="number" value="<?= get_var('month') ?>" class="form-control" id="month" name="month" step="1" min="1" max="12">
					</div>
				</div>
						

				<div class="row my-2">
					<div class="form-group">
						<label for="description">Descripcion</label>
						<textarea class="form-control" id="description" name="description"><?=get_var('description')?></textarea>
					</div>
				</div>
				<button class="btn btn-primary float-end">Guardar</button>
				<a href="<?= ROOT ?>/gastos">
					<input class="btn btn-danger" type="button" value="Cancelar">
				</a>
			</div>
		</div>
	</form>


</div>
<?php $this->view('includes/footer') ?>