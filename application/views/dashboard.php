<?= $head ?>
<?= $header ?>
<?php if($nav){
    echo $nav;
} ?>

<div class="container-fluid">
    <div class="row">
        <?= $aside ?>

        <!-- CONTENT -->
        <main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <!-- <h1 class="is-title"> Bienvenido al dashboard</h1> -->
            <?= $content ?>
        </main>

    </div>
</div>
<?= $footer ?>

