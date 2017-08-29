<font size="20" color="green"></font>
<br><center>

<br><div class="col-lg-50">
<label><font size="8" color="green">Consulta de Orden Entrada</font></label></div>

<br><br>
<table>
    <tr>
        <td width="400" height="">
            <div class="md-form">
            <input type="text" id="form1" class="form-control">
            <label for="form1" class="">entrada</label>
            </div>
        </td>
        <td>
            <div class="btn-group">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buscar Por</button>

        <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Producto</a>
        <a class="dropdown-item" href="#">Proveedor</a>
        <div class="dropdown-divider"></div>
    </div>
    </div>
    </td>
    </tr>
    <tr>
        <td><button class="btn btn-orange " type="submit"><i class="fa fa-search"></i>  Buscar</button></td>
    </tr>
</table>
<br>
<br>
<br>
<br>
<br>

<table cellpadding="20" class="table-striped" cellspacing="20" border="0">
    <tr>
        <td width="200" height=""><b>Proveedor</b></td>
        <td width="200" height=""><b>Producto</b></td>
        <td width="200" height=""><b>Fecha Entrada</b></td>
        <td width="200" height=""><b>Cantidad Entrada</b></td>
        <td width="200" height=""><b>Precio</b></td>
    </tr>
    <tr>

    <?php foreach ($entradas as $listadov): ?>
    <td><?= $listadov['proveedor'] ?></td>
    <td><?= $listadov['producto'] ?></td>
    <td><?= $listadov['fecha'] ?></td>
    <td><?= $listadov['cantidad'] ?></td>
    <td><?= $listadov['precio'] ?></td>
</tr>
<?php endforeach; ?>
    </tr>
   
    
</table>

</center>



<br>
<br>
<br>
<br>