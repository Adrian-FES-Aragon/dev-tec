<!-- HEADER -->
<header>
    <nav class="container-fluid navbar navbar-dark bg-dark max-width sticky-md-top">
        <div class="col col-lg-2" >
            <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/img/logo1.png') ?>" height="60px" , width="100px"></a>
        </div>
        <div class="col col-lg-2">
            <span class="navbar-text navbar-brand">
                Temas Especiales de Computación
            </span>
        </div>
        <div class="col col-lg-2">
            <?php foreach ($menu as $item) : ?>
                <a class="navbar-text navbar-brand " href="<?= $item['url'] ?>"><?= $item['title'] ?></a>
            <?php endforeach; ?>
        </div>
    </nav>
</header>
<body  style="margin-bottom:4.8%;"  >
    