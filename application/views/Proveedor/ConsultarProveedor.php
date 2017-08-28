

<div class="container" >

    <section class="section">
        <p class=" orange-text flex-center h1-responsive">Proveedores del minimercado</p>
        <table class="table table-striped ">
            <tr>
                <th>Nit</th>
                <th>Proveedor</th>
                <th>Telefono</th>
                <th>Direcciòn</th>
                <th>Correo electronico </th>
                <th>Persona de contacto</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <?php foreach ($proveedor as $proveedor_item): ?>
                    <td><?= $proveedor_item['nit'] ?></td>
                    <td><?= $proveedor_item['NombreProveedor'] ?></td>
                    <td><?= $proveedor_item['TelefonoProveedor'] ?></td>
                    <td><?= $proveedor_item['DireccionProveedor'] ?></td>
                    <td><?= $proveedor_item['CorreoElectronicoProveedor'] ?></td>
                    <td><?= $proveedor_item['NombreContacto'] ?></td>
                    <td>
                        Modificar<a class="teal-text"  href=" <?php echo base_url() . 'proveedor/EditarProveedor/' . $proveedor_item['idProveedor'] ?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>


                        Inactivar<a class="red-text"  href=" <?php echo base_url() . 'Proveedor/modal/' . $proveedor_item['idProveedor'] ?>">
                            <i class="fa fa-times" ></i></a>
                    </td>

                </tr>

            <?php endforeach; ?>   

        </table>

