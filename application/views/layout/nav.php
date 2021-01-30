<!-- BARRA DE NAVEGACIÓN -->
<nav class="bg-secondary">
    <!-- FLASHDATA -->
    <div class="container-fluid navbar navbar-light  ">
        <?php if ($msg = $this->session->flashdata('msg')) : ?>
            <div class="col-md-auto  alert alert-success  " role="alert">
                <?= $msg ?>
            </div>
        <?php endif; ?>
        <div class="col-sm-auto">
            <p class=" text-light "> <strong> Rango: </strong> <?= $this->session->rango ?>
                <br>
                <strong>Nombre de usuario: </strong><?= $this->session->nombre_usuario ?>
            </p>
        </div>
        <div class="col-sm-auto">
            <a href="<?= base_url('login/logout'); ?>" class=" btn btn-light "> Cerrar sesión </a>
        </div>
    </div>
</nav>