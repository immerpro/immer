<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

    <!--Controls-->
    <div class="controls-top">
        <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
    </div>
    <!--/.Controls-->
    
    <table class="table table-hover">
                <th>IdProducto</th>
                <th>NombreProdcuto</th>
                <th>Descripcion</th>
                <th>Existencias</th>
                
    <?php foreach ($lproducto as $listado): ?>
        <!--Indicators-->

        


            


        <tbody>
            <tr>
                <td><?php echo $listado['idProducto']; ?></td>
                <td><?= $listado['NombreProducto'] ?></td>
                <td><?= $listado['DescripcionProducto'] ?></td>
                <td><?= $listado['Existencias'] ?></td>
            </tr>
            
            


    <?php endforeach; ?>  
            </table>
        </tbody>

</div>






<!--/.First slide-->

<!--Second slide-->

<!--/.Second slide-->

<!--Third slide-->

<!--/.Third slide-->

</div>
<!--/.Slides-->

</div>

<!--/.Carousel Wrapper-->
