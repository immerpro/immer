<div style="height: 5vh"></div>
<h1 class=" text-center orange-text">Registro</h1>
 <div class="row">
            <div class="col-6 ">
                <span class="alert-danger close"><?php echo validation_errors(); ?></span> 
            </div>

        </div>
        <?php if ($this->session->flashdata('correcto')): ?>
            <div class=" alert alert-success" ><?php echo $this->session->flashdata('correcto'); ?> </div> 
        <?php endif; ?>
        <?php  if ($this->session->flashdata('incorrecto')): ?>
            <div class=" alert alert-danger" ><?php echo $this->session->flashdata('incorrecto'); ?> </div> 
        <?php endif; ?>

<center>
    <?php echo form_open('registro'); ?>
<table cellpadding="20" cellspacing="20">
  <tr>
    <td><i class="fa fa-user  fa-3x orange-text" aria-hidden="true"></i></td>
        <td width="400" height="">

            <div class="md-form">

                <input type="text" id="nombrecompleto" class="form-control" name="txtnombrecompleto">

            <label for="nombrecompleto"  class="">Nombre Completo</label>
            </div>
        </td>
    </tr>
      <tr>
    <td><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></td>
        <td width="400" height="">

            <div class="md-form">

                <input type="text" id="Correoelectronico" class="form-control" name="txtcorreo">

            <label for="Correoelectronico"  class="">Correo electronico</label>
            </div>
        </td>
    </tr>
     
    <tr>
    <td><i class="fa fa-user fa-3x" aria-hidden="true"></i></td>
        <td width="400" height="">

            <div class="md-form">

                <input type="text" id="usuario" class="form-control" name="txtusuario">

            <label for="usuario"  class="">Usuario</label>
            </div>
        </td>
    </tr>
    <tr>
        <td><i class="fa fa-lock fa-3x" aria-hidden="true"></i></td>
        <td width="400" height="">
            
            <div class="md-form">
                <input type="password" id="password" class="form-control" name="txtpassword">
            <label for="password" class="">Contraseña</label>
            </div>
            <div style="height: 5vh"></div>
            <button type="submit" class="btn btn-orange waves-effect orange" name="btnRegistro" > <i class='fa fa-send'> </i> Registrar</button>
        </td>
        <td></td>

    </tr>
   
    
</table>

<?php echo form_close(); ?>


</center>

