<div class="container-fluid  ">
    <form class=" needs-validation" action="<?= base_url('reports/store') ?>" method="POST">
        <h2 class="text-center">Reporte de equipos de computo</h2>

        <h4>Responsable</h4>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row ">

                    <div class="col">
                        <label class="fs-6 mb-1" for="">Empleado que realiza alta del equipo</label>
                        <select class="custom-select form-select form-select-sm  " name="employ" id="" >
                            <option disabled selected value=""> empleado </option>
                            <option <?= set_value('employ') == 'employ1' ? 'selected' : ''; ?> value="employ1">Administrador</option>
                            <option <?= set_value('employ') == 'employ2' ? 'selected' : ''; ?> value="employ2">Empleado</option>
                            <div class="text-danger"><?= form_error('employ') ?></div>
                        </select>
                    </div>

                    <div class="col">
                        <label class="fs-6 mb-1" for="">Area del empleado</label>
                        <select class="custom-select form-select form-select-sm  " name="area" id="" >
                            <option disabled selected value=""> area </option>
                            <option <?= set_value('area') == 'area1' ? 'selected' : ''; ?> value="area1">Calidad</option>
                            <option <?= set_value('area') == 'area2' ? 'selected' : ''; ?> value="area2">Administración</option>
                            <option <?= set_value('area') == 'area3' ? 'selected' : ''; ?> value="area3">Control de daños</option>
                            <div class="text-danger"><?= form_error('area') ?></div>
                        </select>
                        <br>
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                Acepto ser el responsable del reporte
                            </label>
                            <div class="invalid-feedback">
                                Debes aceptar antes de enviar el reporte
                            </div>
                        </div>
                    </div>

                    <div class="col text-center">
                        <label class="fs-6 mb-1" for="">Fecha de reporte</label>
                        <input type="date" name="date" step="1" min="2021-01-01" max="2030-12-31" value="<?php echo date("Y-m-d"); ?>" >
                        <div class="text-danger"><?= form_error('product') ?></div>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <h4>Equipo</h4>
        <div class="card mb-3">
            <div class="card-body ">
                <div class="row mb-3 justify-content-center">

                    <div class="col ">
                        <label class="fs-6 mb-1" for="">Equipo a reportar</label>
                        <select class=" custom-select form-select form-select-sm mb-2 " name="equipo" id="" >
                            <option disabled selected value=""> equipos disponibles</option>
                            <option <?= set_value('equipo') == 'pc' ? 'selected' : ''; ?> value="pc">Computadora de escritorio</option>
                            <option <?= set_value('equipo') == 'laptop' ? 'selected' : ''; ?> value="laptop">Laptop</option>
                            <div class="text-danger"><?= form_error('equipo') ?></div>
                        </select>

                        <label class="fs-6 mb-1 " for="">Caracteristicas del producto</label>
                        <select class="custom-select form-select form-select-sm  mb-2" name="caract" id="" >
                            <option disabled selected value="">caracteristicas</option>
                            <option <?= set_value('caract') == 'car1' ? 'selected' : ''; ?> value="">Acer, 16 GB RAM, HDD 1TB, Intel, Core i3, SO Windows 
                            </option>
                            <option <?= set_value('caract') == 'car2' ? 'selected' : ''; ?> value="">AMD AM3+ FX™/Phenom™, AMD 760G, 16GB, </option>
                            <option <?= set_value('caract') == 'car3' ? 'selected' : ''; ?> value="">Intel Pentium G4560,  1TB SATA3, ASRock H270M-ITX/ac</option>
                        </select>
                        <label class="fs-6 mb-1" for="">Procedimiento a seguir</label>
                        <select class="custom-select form-select form-select-sm  " name="product" id="" >
                            <option disabled selected value=""> Procedimiento </option>
                            <option <?= set_value('proc') == 'proc1' ? 'selected' : ''; ?> value="proc1"> Reparación</option>
                            <option <?= set_value('proc') == 'proc2' ? 'selected' : ''; ?> value="proc2">Destrucción</option>
                            <div class="text-danger"><?= form_error('proc') ?></div>
                        </select>
                    </div>

                    <div class="col">
                        <label class="fs-6 mb-1" for="">Primeras observaciones</label>
                        <textarea class="form-control mb-3 " id="" rows="4"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-auto align-self-center">
                        <div class="form-check mb-3 ">
                            <input class="form-check-input" type="checkbox" value="accept" id="accept" >
                            <label class="form-check-label" for="accept">
                                Confirmar reporte
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="form-check mb-3 ">
                            <input class="form-check-input" type="checkbox" value="" id="" checked disabled>
                            <label class="form-check-label" for="">
                                Recibí reporte
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-3">
            <div class="row text-center">
                <div class="col">
                    <input type="submit" class="btn btn-dark btn-lg" value="Reportar">
                </div>
            </div>
        </div>
    </form>
</div>