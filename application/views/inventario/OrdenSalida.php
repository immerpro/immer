<!--Carousel Wrapper-->

<div class="flex-center">
<table>
    <tr>
        <td width="400" height="">
            <div class="md-form">
                <input type="text" id="form1" class="form-control">
                <label for="form1" class="">salida</label>
            </div>
        </td>
        <td>
            <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buscar Por</button>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Producto</a>
                    <a class="dropdown-item" href="#">Motivo</a>
                    <div class="dropdown-divider"></div>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td><button class="btn btn-orange " type="submit"><i class="fa fa-search"></i>Buscar</button></td>
    </tr>
</table>
</div>


<table class="table table-hover">
    <th>Nombre Producto</th>
    <th>Precio </th>
    <th>Cantidad</th>
    <th>Motivo</th>



    <?php foreach ($lsalida as $listado): ?>
        <tbody>
            <tr>
                <td><?= $listado['productoSaliente'] ?></td>
                <td><?= $listado['precioSal'] ?></td>
                <td><?= $listado['cantidadSaliente'] ?></td>
                <td><?php echo $listado['motivoSal']; ?></td>
            </tr>




        <?php endforeach; ?>  
</table>
</tbody>







<!--/.First slide-->

<!--Second slide-->

<!--/.Second slide-->

<!--Third slide-->

<!--/.Third slide-->

</div>
<!--/.Slides-->

</div>

<!--/.Carousel Wrapper-->
