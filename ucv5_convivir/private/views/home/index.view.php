
<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<style>
	h1{
		font-size: 80px;
		color:gray;
	}

	a{
		text-decoration: none;
	}

	.card-header{
		font-weight: bold;
	}

	.card{
		min-width: 250px;
	}
</style>
	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
	 
	 	<div class="row justify-content-center ">

	 		<?php if(Auth::access('super_admin')):?>
		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/condominios">
		 			<div class="card-header">CONDOMINIOS</div>
		 			<h1 class="text-center">
					<i class="far fa-building"></i>
		 			</h1>
		 			<div class="card-footer">Ver todos los condominios</div>
	 				</a>
		 		</div>
		 	<?php endif;?>

		 	<?php if(Auth::access('super_admin')):?>
		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/usuarios">
		 			<div class="card-header">USUARIOS</div>
		 			<h1 class="text-center">
					 <i class="fas fa-user"></i>
		 			</h1>
		 			<div class="card-footer">Ver todos los usuarios</div>
		 			</a>
		 		</div>
		 	<?php endif;?>

		 	<?php if(Auth::access('admin')):?>
		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/inmuebles">
		 			<div class="card-header">VIVIENDAS</div>
		 			<h1 class="text-center">
					<i class="fas fa-home"></i>
		 			</h1>
		 			<div class="card-footer">Ver todas las viviendas</div>
		 			</a>
		 		</div>
		 	<?php endif;?>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/gastos">
		 			<div class="card-header">GASTOS</div>
		 			<h1 class="text-center">
					 <i class="fas fa-dollar-sign"></i>
		 			</h1>
		 			<div class="card-footer">Ver todos los gastos</div>
		 			</a>
		 		</div>

		 		
		 		<?php if(Auth::access('admin')):?>
		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/estadisticas">
		 			<div class="card-header">ESTADISTICAS</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-chart-pie"></i>
		 			</h1>
		 			<div class="card-footer">Ver las estadisticas</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/settings">
		 			<div class="card-header">CONFIGURACION</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-cogs"></i>
		 			</h1>
		 			<div class="card-footer">Ver la configuracion</div>
		 			</a>
		 		</div>
		 		<?php endif;?>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/users/show/<?=Auth::getId()?>">
		 			<div class="card-header">PERFIL</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-id-card"></i>
		 			</h1>
		 			<div class="card-footer">Ver el Perfil</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 shadow rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/logout">
		 			<div class="card-header">SALIR</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-sign-out-alt"></i>
		 			</h1>
		 			<div class="card-footer">Salir del sistema</div>
	 				</a>
		 		</div>

	 	</div>
	</div>
 
<?php $this->view('includes/footer')?>
