<div style="height: 5vh"></div>
<p class="h1 orange-text text-center">Recuperar Clave</p>
<div style="height: 4vh"></div>
<div class="container">
    <section class="section">

        <?php echo form_open('recupera'); ?>
        <div class="row">
            <div class="col-lg-6 ">
                <div class="alert-danger"><?php echo validation_errors(); ?></div> 
            </div>
            <div class="col-lg-6">
                <?php if ($this->session->flashdata('usuario_mal')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('usuario_mal') ?></div> 
                <?php endif; ?>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-3"></div>
            <div class=" col col-6">
                <div class="md-form">
                    <i class="fa fa-user fa-3x prefix" aria-hidden="true" ></i>
                    
                    <input type="text" id="user" class="form-control" name="txtusuario" data-parsley-required="true" 
                              data-parsley-trigger="keyup" >

                    <label for="user" >Usuario</label>
                </div>
                <div style="height: 2vh"></div>
                <div class="md-form">
                    <i class="fa fa-lock fa-3x prefix" aria-hidden="true"></i>
                    <input type="password" id="pass" class="form-control" name="txtOlvidopassword" data-parsley-required="true" 
                              data-parsley-trigger="keyup">
                    <label for="pass" > Nueva Contraseña</label>
                </div>
                <button type="submit" class="btn btn-orange waves-effect orange" name="btnRecuperaClave" > <i class='fa fa-send'> </i>  Recuperar Contraseña</button>
               

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
