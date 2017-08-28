
<div style="height: 5vh"></div>
<div class="container" >

    <section class="section">

        <p class="display-4 orange-text text-center h1-responsive">Notificaciones</p>
        <div style="height: 4vh"></div>
        <?php echo form_open('inventario/notificar'); ?>
        <p class="lead">
            Estimado Administrador(a) usted recibira una notificaciòn por correo electrònico
            que le notificara cuantos productos estan agotados,
            proximos a agotarse  y cuales productos estan por vencerse
            Por favor ingrese su correo electronico para recibir las notificaciones.
        </p>
        <div class="row flex-center" data-parsley-validate >

            <div class="col-6"> 
                <div >
                    <label for="noticorreo" data-error="wrong" data-success="right" class=" badge badge-primary"> <i class="fa fa-envelope prefix"></i> Correo Electrònico</label>

                    <input type="email" id="noticorreo" name="txtnoticorreo" class="form-control validate" data-parsley-type="email">
                    <?php // if (form_error('txtnoticorreo')): ?>
                    <!--                        <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                    <span class="red-text"><?php echo form_error('txtnoticorreo'); ?></span>  
                    <!--</div>-->
                    <?php // endif; ?>


                </div>


                <div  class="hidden-md-down hiddendiv">
                    <label for="noticelular" data-error="wrong" data-success="right" class=" badge badge-primary"> <i class="fa fa-phone prefix"></i> Celular</label>

                    <input type="text" id="noticelular"  name="txtnoticelular"class="form-control validate" data-parsley-type="number" data-parsley-min-length="10" data-parsley-trigger="keyup" >
                    <?php // if (form_error('txtnoticelular')): ?>
                    <!--                        <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->

                    <span class="red-text"><?php echo form_error('txtnoticelular'); ?></span>  

                    <!--</div>-->
                    <?php // endif; ?>
                </div>



                <div>
                    <label for="noticelular" data-error="wrong" data-success="right" class=" badge badge-primary lead"> <i class="fa fa-bell-o prefix" aria-hidden="true"></i> Notificar por</label>


                    <select class="form-control validate"  required name="cbomotivoNoti">
                        <option value="">seleccione una opciòn </option>
                        <option value="vencido">Producto vencido</option>
                        <option value="agotado">Producto agotado</option>
                        <option value="proximoAgotado">Producto por  agotarse</option>

                    </select>

                </div>

            </div>    

        </div>
        <!--codigo de barras 13 numeros-->


        <div class="flex-center">
            <button type="submit" class="btn btn-orange waves-effect orange" name="btnNuevoProducto" data-toggle="modal" data-target="#envio" ><i class='fa fa-send'> Notificar</i></button>

        </div>


        <?php echo form_close(); ?>

    </section>

    <script>
        $(document).ready(function () {

            $('form').parsley();
        });
    </script>
</div>

