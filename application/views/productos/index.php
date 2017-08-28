<div class="container" >
    <section class="section">
        <div style="height: 5vh"></div> 
        <p class="display-4 orange-text flex-center">Listado de Productos</p>
        <div class="flex-center">
            <div class="row">
                <div class="col col-8">
                    <div class="md-form">
                        <input type="search" name="txtbuscar" id="buscar" required="required" class="form-control">
                        <label for="buscar" class="badge badge-warning"><i class="fa fa-search"></i> busqueda</label>
                    </div>  
                </div>
                <?php //echo form_open('ProductoController/pagina'); ?>
                <div class="col col-8">
                    <select name="ddlfiltro" class="form-control">
                        <option value="NombreProducto">Producto</option>   
                        <option value="NombreSubCategoria">Subcategoria</option>   
                    </select> 
                    <button class="btn btn-orange " type="submit"><i class="fa fa-search"></i>  Buscar</button>
                </div>
            </div>
        </div>
        <?php echo $div1 . $table; ?>

        <?php //echo form_close(); ?>
    </section>
</div>
