
<div style="height: 5vh"></div>
<div class="col-lg-50">
    <div class="container" >
        <h1  class="h1-responsive orange-text text-center">Orden de Entrada</h1>
        <section class="section">
            <div class="row">
                <div class="col-8">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo validation_errors(); ?> 

                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('correcto')): ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('correcto'); ?> 
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('incorrecto')): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('incorrecto'); ?> 
                        </div>

                    <?php endif; ?>


                </div>


            </div>
            <?php echo form_open('IngreseEntrada'); ?>
            <div class="row">
                <div class="col-5">
                    <div class="md-form">
                        <input type="text" name="txtCodProduc" id="form1" class="form-control">
                        <label for="form1" class="badge badge-warning">Nombre del producto</label>
                    </div> <br>
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="txtCantentra">
                        <label for="form1"  class="badge badge-warning">Cantidad entrada</label>
                    </div> <br>


                    <br>
                    <div class="md-form">
                        <input type="text" name="txtPreentra" id="form1" class="form-control">
                        <label for="form1" class="badge badge-warning">Precio entrada</label>
                    </div><br>

                    <div class="md-form">
                        <br>
                        <br>
                        <label for="proveedor" class="badge badge-warning">Proveedor</label>
                        <select name="txtCodProv" class="form-control md-form"  id="txtCodProv" required data-parsley-trigger="keyup">
                            <option value="">seleccione un Proveedor</option>
                            <?php foreach ($proveedor_select as $proveedor_item): ?>
                                <option value="<?= $proveedor_item['idProveedor'] ?>"><?= $proveedor_item['NombreProveedor'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>



                </div>

            </div>
            <div class="flex-center  flex-column">
                <button type="submit" class="btn btn-warning "> <i class="fa fa-send "></i>  Registrar Orden Entrada</button>

            </div>
    </div>
    <?php echo form_close(); ?>
</section>

</div>




