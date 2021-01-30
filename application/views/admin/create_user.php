<form action="<?= base_url('users/store') ?>" method="POST">
    <div class="container">
        <h3>Datos de la cuenta</h3>
        <hr>
        <div class="row ">
            <div class="col-7 ">
                <label for="">Usuario</label>
                <input type="text" name="user" class="form-control" placeholder="Nombre de usuario" value="<?= set_value('user') ?>">
                <div class="text-danger"><?= form_error('user') ?></div>
            </div>
            <div class="col">
                <label for="">Correo</label>
                <input type="text" name="correo" class="form-control" placeholder="correo@mail.com" value="<?= set_value('correo') ?>">
                <div class="text-danger"><?= form_error('correo') ?></div>
            </div>
            <div class="col ">
                <label for="">Rango de usuario</label>
                <select name="range" class="custom-select">
                    <option selected value="">Seleccione el rango</option>
                    <option <?= set_value('range') == 'admin' ? 'selected' : ''; ?> value="admin">Administrador</option>
                    <option <?= set_value('range') == 'empleado' ? 'selected' : ''; ?> value="empleado">Empleado</option>
                    <!-- <option <?= set_value('range') == 'user' ? 'selected' : ''; ?> value="user">Usuario</option> -->
                </select>
                <div class="text-danger"><?= form_error('range') ?></div>
            </div>
            <br>
        </div>
        <br>
        <br>
        <h3>Información de usuario</h3>
        <hr>
        <div class="row">
            <div class="col-7">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Ingrese su(s) nombre(s)" value="<?= set_value('name') ?>">
                <div class="text-danger"><?= form_error('name') ?></div>
            </div>
            <br>
            <div class="col">
                <label for="">Apellido</label>
                <input type="text" name="lastname" class="form-control" placeholder="Ingrese su(s) apellido(s)" value="<?= set_value('lastname') ?>">
                <div class="text-danger"><?= form_error('lastname') ?></div>
            </div>
            <br>
            <div class="col ">
                <label for="">Area</label><br>
                <select name="area" class="custom-select">
                    <option selected value="">Seleccione el Area</option>
                    <option <?= set_value('area') == 'admin' ? 'selected' : ''; ?> value="admin"> Encargado de calidad </option>
                    <option <?= set_value('area') == 'Ing. de laboratorio' ? 'selected' : ''; ?> value="Ing. de laboratorio"> Ing. de laboratorio </option>
                    <option <?= set_value('area') == 'Empacador' ? 'selected' : ''; ?> value="Empacador"> Empacador </option>
                    <option <?= set_value('area') == 'Administrador de logistica' ? 'selected' : ''; ?> value="Administrador de logistica"> Administrador de logistica </option>
                    <option <?= set_value('area') == 'empleado4' ? 'selected' : ''; ?> value="Control de daños"> Control de daños </option>
                    <option <?= set_value('area') == 'empleado5' ? 'selected' : ''; ?> value="Reparador"> Reparador </option>
                    <!-- <option <?= set_value('area') == 'user' ? 'selected' : ''; ?> value="user"> Cliente </option> -->
                </select>
                <div class="text-danger"><?= form_error('area') ?></div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <br>
            <div class="col-7">
                <label for="">Especialidad</label>
                <input type="text" name="especialidad" class="form-control" placeholder="Ingrese su especialidad" value="<?= set_value('especialidad') ?>">
                <div class="text-danger"><?= form_error('especialidad') ?></div>
            </div>
            <br>
            <div class="col">
                <label for="">Cédula</label>
                <input type="text" name="cedula" class="form-control" placeholder="XXXXXXXXXX-X" value="<?= set_value('user') ?>">
                <div class="text-danger"><?= form_error('cedula') ?></div>
            </div>
            <br>
        </div>
    </div><br>

    <div class="container  ">
        <div class="row justify-content-md-center">
            <div class="col-1">
                <input type="submit" class="btn  btn-dark" value="Dar de alta">
            </div>
        </div>
    </div>
</form>