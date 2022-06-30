<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<div class="container-fluid">
    <form action="<?= ROOT ?>/usuarios/store" method="POST">
        <div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px; text-align:center;">
			<h2>Añadir Usuario</h2>
            <img src="<?= ROOT ?>/assets/logocasa.png" class="border border-primary d-block mx-auto rounded-circle" style="width:100px;">

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

            <input class="my-2 form-control" value="<?= get_var('email') ?>" type="text" name="email" placeholder="Email">

			<select class="my-2 form-control" name="doc_tipo">
                <option value="">--Seleccione tipo documento--</option>
                <option <?= get_select('doc_tipo', 'dni') ?> value="dni">Dni</option>
                <option <?= get_select('doc_tipo', 'ce') ?> value="ce">ce</option>
                <option <?= get_select('doc_tipo', 'otro') ?> value="otro">Otro</option>
            </select>

            <input class="my-2 form-control" value="<?= get_var('doc_numero') ?>" type="number" name="doc_numero" placeholder="Numero Documento" min="0">

            <input class="my-2 form-control" value="<?= get_var('nombre') ?>" type="text" name="nombre" placeholder="Nombre">
            <input class="my-2 form-control" value="<?= get_var('apellido_1') ?>" type="text" name="apellido_1" placeholder="Primer Apellido">
            <input class="my-2 form-control" value="<?= get_var('apellido_2') ?>" type="text" name="apellido_2" placeholder="Segundo Apellido">
            
            <select class="my-2 form-control" name="genero">
                <option value="">--Seleciona un genero--</option>
                <option <?= get_select('genero', 'masculino') ?> value="masculino">Masculino</option>
                <option <?= get_select('genero', 'femenino') ?> value="femenino">Femenino</option>
            </select>
			
            <select class="my-2 form-control" name="rol">
                <option value="">--Seleccione un Rol--</option>
                <option <?= get_select('rol', 'user') ?> value="user">Usuario</option>
                <option <?= get_select('rol', 'admin') ?> value="admin">Admin</option>
                <option <?= get_select('rol', 'super_admin') ?> value="super_admin">Super Admin</option>
            </select>

            <input class="my-2 form-control" value="<?= get_var('password') ?>" type="text" name="password" placeholder="Password">
            <input class="my-2 form-control" value="<?= get_var('password2') ?>" type="text" name="password2" placeholder="Retype Password">
            <br>
            <button class="btn btn-primary float-end">Agregar User</button>
            <button type="button" class="btn btn-danger">Cancelar</button>
        </div>
    </form>
</div>
 
<?php $this->view('includes/footer')?>