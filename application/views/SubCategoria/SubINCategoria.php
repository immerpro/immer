<?php echo form_open('Subcategoria/SubInCategoria'); ?> 

<div class="flex-center">
    <h1 class="h1 green-text">subcategoria de <?=$nombrecategoria?></h1>
</div>
<input type="hidden" name="codigoCategoria[]" value="<?=$codcategoria?>">
<div class="row">
   <div class="col col-5">
   <div class="md-form">
       <input type="text" id="form1" class="form-control" name="NombreSubCategoria[]">
            <label for="form1" class="">Subcategoria</label>
           
            </div>
</div>  
</div>
<div class="row">
    <div class="col">
                <button type="button" class="btn btn-success">AGREGAR</button>
            </div>
</div>
<table>
    <tr>
        <td width="400" height="">
           
        </td>
        <td></td>
    </tr>
    <tr>
        <td>
            <div class="md-form">
            <input type="text" id="form1" class="form-control" name="NombreSubcategoria[]">
            <label for="form1" class="">Subcategoria</label>
            </div>
             <div class="md-form">
            <input type="text" id="form1" class="form-control" name="detalSubCategoria[]">
            <label for="form1" class=""> detalle Subcategoria</label>
            </div>
        </td>
        <td><button type="button" class="btn btn-danger"><i class="fa fa-minus"></i></button></td>
        <td><button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
    </tr>
    <tr>
         <td>
            <div class="md-form">
            <input type="text" id="form1" class="form-control" name="NombreSubCategoria[]">
            <label for="form1" class="">Subcategoria</label>
            </div>
        </td>
         <div class="md-form">
            <input type="text" id="form1" class="form-control" name="detalSubCategoria[]">
            <label for="form1" class=""> detalle Subcategoria</label>
            </div>
        <td><button type="button" class="btn btn-danger"><i class="fa fa-minus"></i></button></td>
        <td><button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
    </tr>
    
    
</table>

<button type="submit" class="btn btn-warning">Crear</button>


</div>

<?php echo form_close(); ?>
<div class="col-9 ">
    <span class="alert-danger close"><?php echo validation_errors(); ?></span> 
</div>

