<div style="height: 5vh"></div>
<p class="h1 orange-text text-center">Autorización</p>
<div style="height: 4vh"></div>
<div class="container">
    <section class="section data-parsley-validate">

        <?php echo form_open('AdminController/colaboradorAutorizado'); ?>
        <div class="row">
            <div class="col-lg-6 ">
                <div class="alert-danger"><?php //echo validation_errors();     ?></div> 
            </div>
           

        </div>

        <div class="row">
            <script type="text/javascript">
                alertify.success("bienvenido Admin <?=$this->session->userdata('usuario')?> a la secciòn de habilitar y dar permisos a los colaboradores");

            </script>
            <div class="col-lg-3"></div>
            <div class=" col col-6">
                <?php echo form_open('authCol'); ?>
                <div >
                    <i class="fa fa-users fa-3x prefix" aria-hidden="true" ></i>
                    <label for="user" class="badge badge-green" >Colaborador</label>

                    <select name="cboColabora" class="form-control" required data-parsley-trigger="keyup">
                        <option value="">- seleccione un colaborador-</option>
                        <?php foreach ($colaboradores as $lcolabora): ?>
                            <option value="<?= $lcolabora['idUsuario'] ?>"><?= $lcolabora['nombreCompleto'] ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div style="height: 2vh"></div>
                <div >
                    <i class="fa fa-check-square-o fa-3x prefix" aria-hidden="true"></i>
                    <label for="pass" class="badge badge-green" >Estado</label>

                    <select name="cboEstado" class="form-control" required data-parsley-trigger="keyup">
                        <option value="">-- seleccione un estado --</option>
                        <option value="1" title="puede ingresar al sistema crear producto,Orden Salida, realizar consultas">Autorizado</option>
                        <option value="2" title="no ingresa y no puede usar el sistema">Inactivo</option>
                        <option value="3" class="hiddendiv" title="puede ingresar sistema y solo consultar informacion orden salida y productos">Consultor</option>
                        <option value="4"  class="hiddendiv" title=" puede ingresar al sistema y solo crea productos y orden de salida">Creador</option>

                    </select>
                </div>
                <button type="submit" class="btn btn-orange waves-effect orange" name="btnHabilita" ><i class='fa fa-send'></i> Habilitar Colaborador</button>


            </div> 
        </div>

    </section>

</div>
<script>
    $(document).ready(function () {
        $('form').parsley();
    });
</script>

<?php echo form_close(); ?>
