<div style="height: 5vh"></div>
<?php echo form_open('Subcategoria/actualizarsub/'.$idSub); ?>  
<input type="hidden" name="hdcodigoCategoria" value="<?=$codCategoria?>">
<h1 class="h1 orange-text text-center">subcategoria a Actualizar</h1>
<div class="flex-center">
    <table>
        <tr>
            <td>

                <div class="md-form">
                    <input type="text" id="form1" class="form-control" name="NombreSubcategoria" value="<?php echo $NombreSub; ?>">
                    <label for="form1" class="">Subcategoria</label>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <br>
                <br>
                <textarea rows="10" cols="90" placeholder="Detalle Subcategoria" name="detalSubCategoria"><?php echo $DetallesSub; ?></textarea> 
                <br>
                <br>
            </td>
        </tr>

        <tr><td><button type="submit" class="btn btn-orange waves-effect orange" name="btnEditaSubcategoria"><i class='fa fa-edit'> Actualizar Subcategoria</i></button></td></tr>
    </table>
</div>
<?php echo form_close(); ?>
<div class="col-9 ">
    <span class="alert-danger close"><?php echo validation_errors(); ?></span> 
</div>
