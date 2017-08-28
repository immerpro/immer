<div class="container" >
       
        <section class="section">
        <p class="display-4 orange-text flex-center">Listado de Categorias</p>
<table class="table table-striped">
    <tr>
        <th>Nombre Categoria</th>
        <th>Detalles</th>
         <th>Acciones Subcategoria</th>
            <th>Acciones Categoria</th>
    </tr>
    <tr>
        <?php foreach ($categorias as $categoria_item): ?>
            <td><?php echo $categoria_item['NombreCategoria']; ?></td>
            <td><?php
                echo $categoria_item['detalles'];
                echo br(3);
                ?>
            
            </td>
              <td>
                  Mira <a class="orange-text" href=" <?php echo base_url().'Categoria/Ver/'.$categoria_item['idCategoria']?>" ><i class="fa fa-eye" onmouseover="Subcategoria"></i></a>
                  Agrega <a class="blue-text"  href=" <?php echo base_url().'Categoria/Agregar/'.$categoria_item['idCategoria']?>" ><i class="fa fa-plus"></i></a>
            </td>
            <td>
               Modificar <a class="teal-text"  href=" <?php echo base_url().'Categoria/editar/'.$categoria_item['idCategoria']?>" ><i class="fa fa-pencil "></i></a>
                   
               Elimina <a class="red-text" href=" <?php echo base_url().'Categoria/modal/'.$categoria_item['idCategoria']?>"><i class="fa fa-times" ></i></a>
            </td>
           
            

        </tr>

<?php endforeach; ?>   

</table>

</div>