<div class="content">
    <div class="container-fluid " style="padding-top:12vh; ">
        <form action=<?= base_url('login/validate') ?> method="POST" id="frm_login">
            <div class="row justify-content-center">
                <div class="card" style="width: 30rem;">
                    <h1 class=" text-center">LOGIN</h1>
                    <div class="card-body">
                        <div id="email">
                            <input type="email" name="email" class="form-control " placeholder="example@mail.com" id="exampleInputEmail1">
                            <div class="invalid-feedback"></div>
                        </div><br>
                        <div id="password">
                            <input type="password" name="password" class="form-control " placeholder="contraseña" id="exampleInputPassword1">
                            <div class="invalid-feedback"></div>
                        </div><br>
                        <div class="text-center">
                            <button type="submit" class="btn  btn-dark ">Iniciar sesión</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>