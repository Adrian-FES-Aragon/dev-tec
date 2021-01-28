<?= $head ?>
<?= $header ?>
<form action=<?= base_url('login/validate') ?> method="POST" id="frm_login">
    <div class="container-fluid" style="padding-top:12em;">
        <div class="row  justify-content-md-center" ">
            <h1 class="text-center">LOGIN</h1>
            <div class=" col-3" id="email">
            <input type="email" name="email" class="form-control " placeholder="example@mail.com" id="exampleInputEmail1">
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <br>
    <div class="row  justify-content-center">
        <div class="col-3" id="password">
            <input type="password" name="password" class="form-control " placeholder="contraseña" id="exampleInputPassword1">
            <div class="invalid-feedback"></div>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-3 offset-md-2">
            <button type="submit" class="btn btn-primary " >Iniciar sesión</button>
            </div>
        </div>
</form>
<?= $footer ?>