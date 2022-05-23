<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]); ?>
	<h1>Pagina Usuarios</h1>

</div>

<?php $this->view('includes/footer') ?>