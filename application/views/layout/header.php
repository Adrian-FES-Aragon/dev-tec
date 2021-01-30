<!-- HEADER -->
<header>
    <div class="container-fluid navbar navbar-dark bg-dark">
        <div class="col-md-auto    ">
            <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/img/logo1.png') ?>" width="50%"></a>
        </div>
        <div class="col-md-auto    ">
            <span class="navbar-text navbar-brand">
                Temas Especiales de Computación
            </span>
        </div>
        <div class="col-md-auto     ">
            <?php foreach ($menu as $item) : ?>
                <a class="navbar-text navbar-brand " href="<?= $item['url'] ?>"><?= $item['title'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</header>

<body>
    