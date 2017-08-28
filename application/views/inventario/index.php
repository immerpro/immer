<main class="col-sm-9 ml-sm-auto col-md-11 pt-3" role="main">
    <h1 class="h1-responsive text-center orange-text">Notificaciones del Inventario</h1>

    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3 placeholder">

            <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Productos Vencidos</h4>
            <div class="text-muted"><i class="fa fa-bell fa-3x"> </i> 
                <h2> <span class="badge badge-grey" id="cantivencido"> <?= $cvencidos->cantVencido ?></span> </h2>
                <a class="btn btn-link waves-button waves-effect bg-grey" href="" data-toggle="modal" data-target="#basicExample">Ver</a>
            </div>
        </div>
        <div class="col-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Productos Agotados</h4>
            <div class="text-muted"><i class="fa fa-bell-slash-o fa-3x red-text"> </i>
                <h2> <span class="badge badge-red">
                        <?= $cantAgotados->agotados ?>
                    </span> </h2>
                <a class="btn btn-link waves-button waves-effect bg-danger" data-toggle="modal" data-target="#modalagotado" href="">Ver</a>

            </div>
        </div>
        <div class="col-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Productos por Agotarse </h4>
            <div class="text-muted">
                <div class="text-muted"><i class="fa fa-bell-o fa-3x orange-text"> </i>
                    <h2> <span class="badge badge-deep-orange">
                            <?= $cporAgotarse->cuantoAgotarse ?>
                        </span> </h2>
                    <a class="btn btn-link waves-button waves-effect bg-warning"  data-toggle="modal" data-target="#agotarse" href="">Ver</a>

                </div>

            </div>
        </div>
        <div class="col-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Notificaciones</h4>
            <span class="text-muted"><i class="fa fa-server fa-3x green-text"></i></span>
            <h2><span class="badge badge-green"><i class="fa fa-bell"> </i> </span></h2>
            <a class="btn btn-link waves-button waves-effect bg-faded bg-dark-green" href="<?= site_url('notificacion') ?>">Configurar</a>

        </div>
    </section>
    <div style="height: 4vh"></div>
    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3 placeholder">

            <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Existencia total</h4>
            <div class="text-muted"><i class="fa fa-bell fa-3x"> </i> 
                <h2> <span class="badge badge-yellow">
                        <?= $existenciaTotal->ExistenciaTotal ?>
                    </span> </h2>

                <a class="btn btn-link waves-button waves-effect bg-yellow" href="">Ver</a>
            </div>
        </div>
        <div class="col-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Existencia Restante</h4>
            <div class="text-muted"><i class="fa fa-bell-slash-o fa-3x"> </i>
                <h2> <span class="badge badge-info">
                        <?= $vendido->cvendida ?>
                    </span> </h2>
                <a class="btn btn-link waves-button waves-effect bg-danger" href="">Ver</a>

            </div>
        </div>
        <div class="col-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Productos Salientes </h4>
            <div class="text-muted">
                <div class="text-muted"><i class="fa fa-bell-o fa-3x"> </i>
                    <h2> <span class="badge badge-elegant">
                            <?= $CantidadSalida->csalida ?>
                        </span> </h2>
                    <a class="btn btn-link waves-button waves-effect bg-danger" href="">Ver</a>

                </div>

            </div>
        </div>
        <div class="col-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>productos entrantes</h4>
            <div class="text-muted"><i class="fa fa-server fa-3x"></i>
                <h2> <span class="badge badge-elegant"><?= $cantidadEntrada->centrada ?></span>

            </div>

            <h2></h2>
            <a class="btn btn-link waves-button waves-effect bg-faded bg-dark-green"  href="">ver</a>

        </div>
    </section>
    <script>
       
        function notificacion() {
            alertify.log("Bienvenido(a) <?= $this->session->userdata('apellidos') ?>  al modulo de notificaciones,\n\
     podra ver las notificaciones de los inventarios.");
            return false;
        }
        notificacion();
    </script>

    <!-- modales con informacion -->
    <!-- Modal -->
    <div class="modal fade" id="basicExample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Productos vencidos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <table class="table table-bordered table-hover ">
                        <thead class="table-inverse bg-green">
                            <tr>
                                <th>Producto</th>
                                <th>Fecha salida</th>
                                <th>Motivo</th>
                                <th>Fecha vencimiento</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($mostrarVencidos as $listadov): ?>
                                    <td><?= $listadov['nombproducto'] ?></td>
                                    <td><?= $listadov['FechaSalida'] ?></td>
                                    <td><?= $listadov['motivo'] ?></td>
                                    <td><?= $listadov['fechaVencimiento'] ?></td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal PRODUCTOS AGOTADOS -->
    <div class="modal fade" id="modalagotado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Productos Agotados</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <p>se sugiere al administrador que realize un pedido de los siguientes productos por favor comunicarse con el respectivo proveedor</p>
                    <table class="table table-bordered table-hover ">
                        <thead class="table-inverse bg-red">
                            <tr>
                                <th>Producto</th>
                                <th>Estado</th>
                                <th>Existencias</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($mostrarAgotado as $listagotados): ?>
                                    <td><?= $listagotados['producto'] ?></td>
                                    <td>
                                        <?php if ($listagotados['estado'] == 4): ?>
                                            <span class="badge badge-danger">AGOTADO</span>
                                        <?php endif; ?>

                                    </td>
                                    <td><?= $listagotados['existencia'] ?></td>


                                </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal PRODUCTOS  X AGOTARSE -->
    <div class="modal fade" id="agotarse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Productos Por Agotarse</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <p>se sugiere al administrador que realize un pedido de los siguientes productos por favor comunicarse con el respectivo proveedor</p>
                    <table class="table table-bordered table-hover ">
                        <thead class="table-inverse bg-warning">
                            <tr>
                                <th>Producto</th>
                                <th>Estado</th>
                                <th>Existencias</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($listXAgotarse as $porAgotarse): ?>
                                    <td><?= $porAgotarse['producto'] ?></td>
                                    <td>
                                        <?php if ($porAgotarse['estado'] == 1): ?>
                                            <span class="badge badge-primary">ACTIVO</span>
                                        <?php endif; ?>
                                        <?php if ($porAgotarse['estado'] == 2): ?>
                                            <span class="badge badge-grey">INACTIVO</span>
                                        <?php endif; ?>

                                    </td>
                                    <td><?= $porAgotarse['existencia'] ?></td>


                                </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Modal -->
</div>
</main>
