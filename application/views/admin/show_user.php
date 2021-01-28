<body>
    <h1 class="text-center">Tabla de usuarios</h1>
    <table class="table table-dark table-striped table-hover table align-middle">
        <div class="table-responsive ">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Rango</th>
                    <th scope="col">Nombre de usuario</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <th scope="row"><?= $item->id ?></th>
                        <td><?= $item->nombre_usuario ?></td>
                        <td><?= $item->correo ?></td>
                        <td><?= $item->status == 1 ? 'activo' : 'inactivo' ?></td>
                        <td><?= $item->rango ?></td>
                        <td><?= $item->nombre_usuario ?></td>
                        <td><a class="btn btn-outline-info" href="<?= base_url('users/edit/' . $item->id) ?>" role="button">Editar</a> /
                            <a class="btn btn-outline-danger" href="<?= base_url('users/delete/' . $item->id) ?>" role="button">Eliminar</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </div>
    </table>

    <?= $this->pagination->create_links() ?>