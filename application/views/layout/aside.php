<!-- ASIDE -->
<nav class="col-md-2 d-none d-md-block navbar-light sidebar" style="background-color: #58666D;">
    <style>
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 78px;
            height: calc(100vh - 78px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: black;
            background-color: white;
        }

        a {
            color: white;
        }

        a:hover {
            color: black;
        }
    </style>

    <div class="sidebar-sticky" style="margin-top: 1em;">
        <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a href="<?= base_url('users') ?>" class=" nav-link  <?= $this->uri->segment(2) == '' ? 'active' : ''; ?>" data-toggle="pill">Usuarios</a>
            <a href="<?= base_url('users/create') ?>" class=" nav-link  <?= $this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'store' ? 'active' : ''; ?>" data-toggle="pill">Alta empleado</a>
            <a href="<?= base_url('users/reportes') ?>" class=" nav-link <?= $this->uri->segment(2) == 'reportes' ? 'active' : ''; ?>" data-toggle="pill">Reportes</a>
            <a href="<?= base_url('users/alta') ?>" class=" nav-link <?= $this->uri->segment(2) == 'alta' ? 'active' : ''; ?>" data-toggle="pill">Levantar reporte</a>
        </div>
    </div>

</nav>