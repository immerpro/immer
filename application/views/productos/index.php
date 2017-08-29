<div class="container" >
    <section class="section" data-parsley-validate>
        <div style="height: 5vh"></div> 
        <p class="display-4 orange-text flex-center">Listado de Productos</p>
        <?php echo form_open('buscador'); ?>
        <span ><?php echo validation_errors(); ?></span>
        <div class="form-inline flex-center">
            <div class="row">
               
                    <div class="md-form form-group">
                        <input type="search" name="txtbuscar" id="buscar" required="required" class="form-control" data-parsley-required="true">
                        <label for="buscar" class="badge badge-warning"> <i class="fa fa-search"></i> busqueda</label>
                    </div>  
              
               <div class="form-group">
                    <select name="ddlfiltro" class="form-control" data-parsley-required="true">
                        <option value="NombreProducto">Producto</option>   
                        <option value="NombreSubCategoria">Subcategoria</option>   
                    </select> 
                    <button class="btn btn-orange " type="submit"> <i class="fa fa-search"></i>  Buscar</button>
               </div>

            </div>
        </div>
        <?php echo $div1 . $table; ?>

        <?php echo form_close(); ?>
    </section>
</div>
