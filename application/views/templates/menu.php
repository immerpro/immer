<body >
    <div class="flex-center flex-column">
        <?php
        $propiedad_img = array(
            'src' => 'public/img/immerproLogo.png',
            'alt' => 'immerpro',
            'class' => 'animated fadeIn mb-2 img-fluid',
            'title' => 'logo',
        );

        echo img($propiedad_img);
        ?>
    </div>
    <?php if ($es_usuario_normal): ?>
        <div class="flex-center">
            <h1 class="h1 green-text" ><?= $slogan ?></h1>
        </div>
    <?php else: ?>
        <div class="flex-center">
            <h1 class="h1 green-text" >te asesorarè muy bien</h1>
        </div>
    <?php endif; ?>
    <div style="height: 5vh"></div>
    <!-----------------MENU DE LA ADMINISTRACION ----------->
    <nav class="navbar navbar-expand-lg navbar-dark blue" role="navigation">
        <?php $atributo = array('class' => 'navbar-brand'); ?>
        <?= anchor('bienvenido', 'Immerpro', $atributo) ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav">
                <?php if ($es_usuario_normal): ?>
                    <!-----------------MENU USUARIO TE ASESORARÈ MUY BIEN!----------->
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url('bienvenido') ?>#acerca"><i class=" fa fa-users"></i> Acerca <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('bienvenido') ?>#contacto"><i class="fa fa-phone" aria-hidden="true"></i> Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('iniciar') ?>"><i class="fa fa-user-secret" aria-hidden="true"></i> Login</a>
                    </li>
                <?php else: ?>
                    <!-----------------MENU USUARIO TE ASESORARÈ MUY BIEN!----------->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="inv" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <i class="fa fa-user"></i>  <?= $this->session->userdata('usuario') ?><span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item " href="<?= site_url('perfiladmin') ?>"><p class="black-text"> <i class="fa fa-user" aria-hidden="true"></i> Perfil Admin</p></a>
                            <a class="dropdown-item " href="<?= site_url('habilita') ?>"><p class="black-text"> <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> Habilitar Colaborador</p></a>
                            <?php if ($this->session->userdata('rol') == 2): ?>  
                                <a class="dropdown-item " href="<?= site_url('perfilcolabora') ?>"><p class="black-text"> <i class="fa fa-user" aria-hidden="true"></i> Perfil Colaborador</p></a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?= site_url('registro') ?>"><p class="black-text"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrar Colaborador</p></a>
                            <a class="dropdown-item " href="<?= site_url('salir') ?>"><p class="black-text"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesiòn</p></a>

                        </div>
                    </li>




                    <?php if ($this->session->userdata('rol') == 1): ?>     
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                Categoría 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo site_url('categoria/crear'); ?>"><p class="black-text">Nueva Categorìa</p></a>
                                <a class="dropdown-item" href="<?php echo site_url('categoria'); ?>"><p class="black-text">Listar Categorìa</p></a>

                            </div>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Producto
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo site_url('nuevoProducto'); ?>"><p class="black-text">Nuevo Producto</p></a>
                            <a class="dropdown-item" href="<?php echo site_url('producto'); ?>"><p class="black-text">Consultar Producto</p></a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Proveedor
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo site_url('proveedor/NuevoProveedor'); ?>"><p class="black-text">Crear Proveedor</p></a>
                            <a class="dropdown-item" href="<?php echo site_url('proveedor'); ?>"><p class="black-text">Consultar Proveedor</p></a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="inv" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Inventario
                        </a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item " href="<?php echo site_url('Entrada'); ?>"><p class="black-text">Orden Entrada</p></a>
                            <a class="dropdown-item " href="<?php echo site_url('Consultar'); ?>"><p class="black-text">Consultar Orden Entrada</p></a>
                            <a class="dropdown-item" href="<?php echo site_url('nuevaSalida'); ?>"><p class="black-text">Orden Salida</p></a>
                            <a class="dropdown-item" href="<?php echo site_url('salida'); ?>"><p class="black-text">Consultar Orden Salida</p></a>
                            <a class="dropdown-item" href="<?php echo site_url('inventario'); ?>"><p class="black-text">Notificaciones</p></a>
                            <a class="dropdown-item" href=""><p class="black-text">Reporte</p></a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('recuperadato'); ?>"><i class="fa fa-reorder"></i>Restauraciòn Datos</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-------------FIN NAVEGACION---------------->
    ​