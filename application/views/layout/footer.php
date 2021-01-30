<!-- SCRIPT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/auth/login.js') ?>"></script>
<!-- FOOTER -->
</body>
<footer>
    <div class="container-fluid navbar navbar-dark bg-dark ">
        <div class="col-sm-auto ">
            <img src="<?= base_url('assets/img/icon.png') ?>" width="35%">
        </div>
        <div class="col  ">
            <h4 class="text-light  fs-6 ">Getting started </h4>
            <a href="<?= base_url('users/create'); ?>" class="navbar-text navbar-brand fs-6"> Registrate </a>
            <br>
            <a href="<?= base_url('about'); ?>" class="navbar-text navbar-brand fs-6"> Más información</a>
        </div>
        <div class="col ">
            <h4 class="text-light  fs-6 ">About us </h4>
            <a href="https://github.com/Adrian-ICO" class="navbar-text navbar-brand fs-6">GARCÍA CHÁVEZ TOMÁS ADRIAN </a>
            <a href="https://github.com/CristobalMH" class="navbar-text navbar-brand fs-6"> MIRANDA HERNÁNDEZ CRISTÓBAL</a>
        </div>
        <div class="col ">
            <h4 class="text-light  fs-6 ">Contact us </h4>
            <a href="" class="navbar-text navbar-brand fs-6">00-1800-5500</a>
            <br>
            <a href="" class="navbar-text navbar-brand fs-6">devtec@mail.com</a>
        </div>
        <div class="col-sm-auto text-end ">
            <p class="text-light">©2021 Copyright<a class=" navbar-brand fs-6" href="#">.</a></p>
        </div>
    </div>
</footer>

</html>