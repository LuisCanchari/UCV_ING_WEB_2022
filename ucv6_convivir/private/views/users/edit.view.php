<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
	
	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
		<center><h4>Editar Usuario</h4></center>
		<?php if($row):?>

			<?php
				$image = get_image($row->image,$row->persona->genero);
			?>

			<form method="post" enctype="multipart/form-data" action="<?=ROOT?>/usuarios/update/<?=$row->id;?>">
			<div class="row">
				<div class="col-sm-4 col-md-3">
					<img src="<?=$image?>" class="border d-block mx-auto" style="width:150px;">
					<br>
					<?php if(Auth::access('super_admin') || Auth::i_own_content($row)):?>
					<div class="text-center">
						<label for="image_browser" class="btn-sm btn btn-info text-white">
							<input onchange="display_image_name(this.files[0].name)" id="image_browser" type="file" name="image" style="display: none;">
							Buscar Imagen
						</label>
						<br>
						<small class="file_info text-muted"></small>
					</div>
					<?php endif;?>
				</div>
				<div class="col-sm-8 col-md-9 bg-light p-2">
						<div class="p-4 mx-auto mr-4 shadow rounded" >
						
							<?php if(count($errors) > 0):?>
							<div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
							<strong>Errors:</strong>
							<?php foreach($errors as $error):?>
								<br><?=$error?>
							<?php endforeach;?>
							<span  type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</span>
							</div>
							<?php endif;?>

							<input class="my-2 form-control" value="<?=get_var('email',$row->email)?>" type="text" name="email" placeholder="Email" >
							<input class="my-2 form-control" value="<?=get_var('nombre',$row->persona->nombre)?>" type="text" name="nombre" >
							<input class="my-2 form-control" value="<?=get_var('apellido_1',$row->persona->apellido_1)?>" type="text" name="apellido_1">
							<input class="my-2 form-control" value="<?=get_var('apellido_2',$row->persona->apellido_2)?>" type="text" name="apellido_2">

							<select class="my-2 form-control" name="genero">
								<option <?=get_select('genero',$row->persona->genero)?> value="<?=$row->persona->genero?>"><?=ucwords($row->persona->genero)?></option>
								<option <?=get_select('genero','masculino')?> value="masculino">Masculino</option>
								<option <?=get_select('genero','femenino')?> value="femenino">Femenino</option>
							</select>
							
							<select class="my-2 form-control" name="doc_tipo">
								<option <?=get_select('doc_tipo',$row->persona->doc_tipo)?> value="<?=$row->persona->doc_tipo?>"><?=ucwords($row->persona->doc_tipo)?></option>
								<option <?=get_select('doc_tipo','dni')?> value="dni">DNI</option>
								<option <?=get_select('doc_tipo','ce')?> value="ce">CE</option>
							</select>

							<input class="my-2 form-control" value="<?=get_var('doc_numero',$row->persona->doc_numero)?>" type="text" name="doc_numero">

	
							<select class="my-2 form-control" name="rol">
								<option <?=get_select('rol',$row->rol)?> value="<?=$row->rol?>"><?=ucwords($row->rol)?></option>
								<option <?=get_select('rol','user')?> value="user">User</option>
								<option <?=get_select('rol','admin')?> value="admin">Admin</option>

								<?php if(Auth::getRank() == 'super_admin'):?>
								<option <?=get_select('rank','super_admin')?> value="super_admin">Super Admin</option>
								<?php endif;?>

							</select>
	
							<input class="my-2 form-control" value="<?=get_var('password')?>" type="text" name="password" placeholder="Password">
							<input class="my-2 form-control" value="<?=get_var('password2')?>" type="text" name="password2" placeholder="Retype Password">
							<br>
							<button class="btn btn-primary float-end">Actualizar</button>

							<a href="<?=ROOT?>/usuarios/show/<?=$row->id?>">
								<button type="button" class="btn btn-danger">Volver</button>
							</a>
							
						</div>
				</div>
			</div>
			</form>
		<br>
 		 
		<?php else:?>
			<center><h4>That profile was not found!</h4></center>
		<?php endif;?>

	</div>
<script>
	function display_image_name(file_name)
	{
		document.querySelector(".file_info").innerHTML = '<b>Archivo seleccionado:</b><br>' + file_name;
	}
</script>
<?php $this->view('includes/footer')?>
