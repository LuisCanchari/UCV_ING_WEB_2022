<?php $this->view('includes/header') ?>

<div class="container-fluid">
    <form action="" method="POST">
        <div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
            <h2 class="text-center">Aplicacion Convivir</h2>
            <img src="<?= ROOT ?>/assets/logocasa.png" class="border border-primary d-block mx-auto rounded-circle" style="width:100px;">
            <h3>Añadir Usuario</h3>

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


            <input class="my-2 form-control" value="<?= get_var('firstname') ?>" type="text" name="firstname" placeholder="First Name">
            <input class="my-2 form-control" value="<?= get_var('lastname') ?>" type="text" name="lastname" placeholder="Last Name">
            <input class="my-2 form-control" value="<?= get_var('email') ?>" type="text" name="email" placeholder="Email">

            <select class="my-2 form-control" name="gender">
                <option value="">--Seleciona un genero--</option>
                <option <?= get_select('gender', 'masculino') ?> value="masculino">Masculino</option>
                <option <?= get_select('gender', 'femenino') ?> value="femenino">Femenino</option>
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

<?php $this->view('includes/footer') ?>