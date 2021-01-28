<!-- BARRA DE NAVEGACIÓN -->
<nav style="background-color: #58666D;">
    <!-- FLASHDATA -->
    <div class="container-fluid navbar navbar-light  max-width">
        <?php if ($msg = $this->session->flashdata('msg')) : ?>
            <div class="col-2  alert alert-success  " role="alert">
                <?= $msg ?>
            </div>
        <?php endif; ?>
        <div class="col-8   ">
            <p class=" text-light "> <strong> Rango: </strong> <?= $this->session->rango ?>
                <br>
                <strong>Nombre de usuario: </strong><?= $this->session->nombre_usuario ?>
            </p>
        </div>
        <div class="col-1  ">
            <a href="<?= base_url('login/logout'); ?>" class=" btn btn-light "> Cerrar sesión </a>
        </div>
    </div>
</nav>