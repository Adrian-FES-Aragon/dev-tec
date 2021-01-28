<!-- FOOTER -->
</body>
<footer>
    <div class="container-fluid  max-width navbar navbar-dark bg-dark fixed-bottom ">
        <div class="col-2 col-lg-1 ">
            <img src="<?= base_url('assets/img/icon.png') ?>" height="45%" , width="45%">
        </div>
        <div class="col  col-lg-1 ">
            <h4 class="text-light  fs-6 ">Getting started </h4>
            <a href="<?= base_url('users/create'); ?>" class="navbar-text navbar-brand fs-6"> Sign in </a>
            <br>
            <a href="<?= base_url('about'); ?>" class="navbar-text navbar-brand fs-6"> About</a>
        </div>
        <div class="col  col-lg-2 ">
            <h4 class="text-light  fs-6 ">About us </h4>
            <a href="https://github.com/Adrian-ICO" class="navbar-text navbar-brand fs-6">GARCÍA CHÁVEZ TOMÁS ADRIAN </a>
            <a href="https://github.com/CristobalMH" class="navbar-text navbar-brand fs-6"> MIRANDA HERNÁNDEZ CRISTÓBAL</a>
        </div>
        <div class="col  col-lg-1 ">
            <h4 class="text-light  fs-6 ">Contact us </h4>
            <a href="" class="navbar-text navbar-brand fs-6">00-1800-5500</a>
            <br>
            <a href="" class="navbar-text navbar-brand fs-6">devtec@mail.com</a>
        </div>
        <div class="col col-lg-1 text-light ">
            <p>©2021 Copyright</p>
        </div>
    </div>
</footer>
<!-- SCRIPT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= base_url('assets/auth/login.js') ?>"></script>

</html>