<?php

class ProductoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('table'); //-->haremos uso de tablas
        $this->load->library('Jquery_pagination'); //-->uso de paginación 
    }

    // metodo que ejecuta la vista principal
    public function index($numPag = 0) {
        if ($this->session->userdata('rol') == NULL || $this->session->userdata('rol') != 1) {
            redirect(base_url() . 'iniciar');
        }
//        $idProducto = $this->uri->segment(3);
        //creamos la salida del html a la vista con ob_get_contents
        //que lo que hace es imprimir el html
        ob_start();
        $this->pagina(0);
        $initial_content = ob_get_contents();
        ob_end_clean();

        //asignamos $initial_content al array data para pasarlo a la vista
        //y así poder mostrar tanto los links como la tabla
        // datos para inactivar un producto
//        $idProducto = $this->uri->segment(3);
        $data = array(
            'div1' => " <div id='pagina'>",
            'table' => $initial_content,
            'titulo' => "producto",
            'es_usuario_normal' => FALSE
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('productos/index', $data);
        $this->load->view('templates/footer');



//
//        // cargar la vista
    }

    public function pagina($numPag = 0) {


        $config['base_url'] = base_url('ProductoController/pagina/');
        $config['div'] = '#pagina'; //asignamos un id al contenedor general
        $config['anchor_class'] = 'btn btn-dark-green btn-rounded'; //asignamos una clase a los links para maquetar
        $config['show_count'] = FALSE; //en true queremos ver Viendo 1 a 10 de 52
        $config['total_rows'] = $this->productos_model->cantidad_filas();
        $config['per_page'] = 4; //-->número de productos por página
        $config['num_links'] = 2; //-->número de links visibles
        $config['first_link'] = '&lsaquo; Primera'; //->configuramos 
        $config['last_link'] = 'Última &rsaquo;'; //--->y siguiente
        $config['full_tag_open'] = '<nav aria-label="Page navigation" class="flex-center"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li class="previous">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#" class="btn btn-orange">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $template = array(
            'table_open' => '<table class="table table-striped table-bordered table-hover">',
            'thead_open' => '<thead >',
            'thead_close' => '</thead>',
            'heading_row_start' => '<tr>',
            'heading_row_end' => '</tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end' => '</th>',
            'tbody_open' => '<tbody>',
            'tbody_close' => '</tbody>',
            'row_start' => '<tr>',
            'row_end' => '</tr>',
            'cell_start' => '<td>',
            'cell_end' => '</td>',
            'row_alt_start' => '<tr>',
            'row_alt_end' => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end' => '</td>',
            'table_close' => '</table>'
        );

        $this->table->set_template($template);
        $this->table->set_heading('Producto', 'Descripción', 'Minimo Stock', 'Maximo Stock', 'Existencias', 'Acciones');
        foreach ($this->productos_model->paginarProducto($config['per_page'], $numPag)as $productos_item) {
            $this->table->add_row(
                    $productos_item['NombreProducto'], $productos_item['DescripcionProducto'], $productos_item['minimoStock'], $productos_item['MaximoStock'], $productos_item['Existencias'], 'Modificar <a class="teal-text" href=' . base_url() . 'ProductoController/editar/' . $productos_item['idProducto'] . '><i class="fa fa-pencil "></i></a>'
                    . nbs(3) . 'Inactivar <a class="red-text" href=' . base_url() . 'ProductoController/modal/' . $productos_item['idProducto'] . '><i class="fa fa-times" ></i></a>');
        }

        $this->jquery_pagination->initialize($config);

        //cargamos la paginación con los links
        $html = $this->table->generate() .
                $this->jquery_pagination->create_links();

        echo $html;
    }

// metodo que ejecuta la vista para ingresar datos
    public function nuevoProducto() {

        $titulo['titulo'] = " nuevo producto";

        $data = ['es_usuario_normal' => FALSE,
            'subcategorias' => $this->subcategoria_model->obtenerSubCategorias(),
            'categorias_select' => $this->categoria_model->traerCategoriasXSubcategoria()];
        // cargar el helper de manejo de formularios
        $this->load->helper('form');
        // cargar libreria para validar formularios
        $this->load->library('form_validation');
        /* asigno reglas de validacion 1parametro=> name del campo del formulario 
         * 2parametro=> titulo validacion 
          3parametro restricciones */
        $this->form_validation->set_rules('txtDescripcion', 'Descripción', 'required');
        $this->form_validation->set_rules('txtNombProd', 'Producto', 'required|is_unique[producto.NombreProducto]');
        $this->form_validation->set_rules('txtCodBarras', 'Codigo de barras', 'required|integer|min_length[13]|is_unique[producto.CodigoDeBarras]');
        $this->form_validation->set_rules('txtMinimo', 'minimo Stock', 'required|integer');
        $this->form_validation->set_rules('txtMaximo', 'maximo Stock', 'required|integer|greater_than[' . $this->input->post('txtMinimo') . ']');
        $this->form_validation->set_rules('txtExits', 'existencias', 'required|integer|less_than[' . $this->input->post('txtMaximo') . ']');

        // validaciones para el detalle de producto txtLote 
        $this->form_validation->set_rules('nbCantidadPro', 'Cantidad', 'required|numeric');
        $this->form_validation->set_rules('txtLote', 'lote', 'required');
        $this->form_validation->set_rules('fvencimiento', 'Fecha de Vencimiento', 'required');
// FIN VALIDACION DETALLE
        // asignar mensajes
        // %s es el nombre del campo que ha fallado
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('numeric', 'Ingrese numeros en el campo %s ');
        $this->form_validation->set_message('integer', 'Ingrese numeros en el campo %s ');
        $this->form_validation->set_message('is_unique', 'la información de %s ya existe por favor ingrese nueva información ');
        $this->form_validation->set_message('min_length', 'El %s  debe tener 13 numeros');
        $this->form_validation->set_message('greater_than', 'el maximo stock debe ser mayor que el minimo stock');
        $this->form_validation->set_message('less_than', 'las existencias deben ser menores que el maximo stock ');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $titulo);
            $this->load->view('templates/menu', $data);
            $this->load->view('productos/nuevoProducto', $data);
            $this->load->view('templates/footer');
        } else {
            // defino variables para ingresar los datos 
            $descrip = trim($this->input->post('txtDescripcion'));
            $nomPro = $this->input->post('txtNombProd');
            $CodBarras = $this->input->post('txtCodBarras');
            $minStock = $this->input->post('txtMinimo');
            $maximoStock = $this->input->post('txtMaximo');
            $existencias = $this->input->post('txtExits');
            $subcat_id = $this->input->post('subcategoria');
            $cantPro = $this->input->post('nbCantidadPro');
            $lote = $this->input->post('txtLote');
            $fechavenc = date("Ymd", strtotime($this->input->post('fvencimiento')));

            // llamo al metodo para agregar productos y el detalle 
            $ingresoNuevoProducto = $this->productos_model->registrarProductoDetalle($descrip, $nomPro, $CodBarras, $minStock, $maximoStock, $existencias, $subcat_id, $cantPro, $lote, $fechavenc);

            if ($ingresoNuevoProducto) {
                //Sesion de una sola ejecución
                $this->session->set_flashdata('correcto', 'producto creado correctamente');
            } else {
                $this->session->set_flashdata('incorrecto', 'El producto no  esta  creado');
            }

            $this->load->view('templates/header', $titulo);
            $this->load->view('templates/menu', $data);
            $this->load->view('productos/nuevoProducto', $data);
            $this->load->view('templates/footer');
        }
    }

// metodo que ejecuta la vista de edicion de productos
    public function editar() {
        $dato = ['titulo' => " Editar producto", 'es_usuario_normal' => FALSE];
//        $data['subcategorias'] = $this->subcategoria_model->obtenerSubCategorias();

        $idProducto = $this->uri->segment(3);
        $obtenerProducto = $this->productos_model->obtener_productos_a_modificar($idProducto);

        // cargar el helper de manejo de formularios
        $this->load->helper('form');
        // cargar libreria para validar formularios

        if ($obtenerProducto != FALSE) {
            foreach ($obtenerProducto->result() as $fila) {
                $DescripcionProducto = $fila->DescripcionProducto;
                $NombreProducto = $fila->NombreProducto;
                $CodigoDeBarras = $fila->CodigoDeBarras;
                $minimoStock = $fila->minimoStock;
                $MaximoStock = $fila->MaximoStock;
                $Existencias = $fila->Existencias;
                $subcategoria = $fila->Subcategoria_idSubcategoria;
            }
//           $nombC = $this->productos_model->obtener_nombreCategoria($subcategoria);
//            var_dump($nombC);

            $data = array(
                'id' => $idProducto,
                'descripcion' => $DescripcionProducto,
                'producto' => $NombreProducto,
                'codBarras' => $CodigoDeBarras,
                'minStock' => $minimoStock,
                'maxStock' => $MaximoStock,
                'exist' => $Existencias,
                'idsub' => $subcategoria,
                'categorias_select' => $this->categoria_model->traerCategoriasXSubcategoria(),
                'nombreSub' => $this->productos_model->obtener_nombreSubcategoria($subcategoria),
                'nombreCategoria' => $this->productos_model->obtener_nombreCategoria($subcategoria)
            );
        } else {
            $data = '';
            return FALSE;
        }
        $this->load->view('templates/header', $dato);
        $this->load->view('templates/menu', $dato);
        $this->load->view('productos/actualizaProducto', $data);
        $this->load->view('templates/footer');
    }

    // metodo para actualizar un producto
    public function ProductoActualizado() {
        $id = $this->uri->segment(3);
        $producto_a_actualizar = array(
            'DescripcionProducto' => $this->input->post('txtDescripcion'),
            'NombreProducto' => $this->input->post('txtNombProd'),
            'CodigoDeBarras' => $this->input->post('txtCodBarras'),
            'minimoStock' => $this->input->post('txtMinimo'),
            'MaximoStock' => $this->input->post('txtMaximo'),
            'Existencias' => $this->input->post('txtExits'),
            'Subcategoria_idSubcategoria' => $this->input->post('subcategoria')
        );
        $this->productos_model->actualizarProducto($id, $producto_a_actualizar);
        redirect('producto');
    }

    // muestra la vista de modal 
    public function modal() {
        $idProducto = $this->uri->segment(3);
        $mostrarNombre = $this->productos_model->obtener_nombre($idProducto);

        $info_modal = array(
            'id' => $idProducto,
            'titulo_h1' => "producto a inactivar",
            'titulo' => "modal",
            'nombrePro' => $mostrarNombre
        );

        $this->load->view('templates/header', $info_modal);
        $this->load->view('productos/modal', $info_modal);
    }

//     inactiva un producto
    public function inactivar($id) {
//        $mostrarNombre = $this->productos_model->obtener_nombre($id);
//        
//        $info_modal = array(
//            'id' => $id,
//            'titulo_h1' => "producto a inactivar",
//            'titulo' => "modal",
//            'nombrePro' => $mostrarNombre
//        );

        $inactivoProducto = $this->productos_model->inactivarProducto($id);
        if ($inactivoProducto) {
            echo "<script type='text/javascript'>"
            . " alert('producto inactivado correctamente ');"
            . " location.href = '" . base_url() . "producto';"
            . " </script> ";
        } else {
            echo "<script type='text/javascript'>"
            . "alert('no se puede inactivar el producto ');"
            . "location.href = '" . base_url() . "producto';"
            . "</script>";
        }
    }

    public function asociarCategoria_a_subcategoria() {

        if ($this->input->post('categoria')) {
            $categoria = $this->input->post('categoria');
            $subcategorias = $this->categoria_model->asociarSubcategoria($categoria);
            foreach ($subcategorias as $valSub) {
                ?>
                <option value="<?= $valSub->idSubcategoria ?>"><?= $valSub->NombreSubcategoria ?> </option>


            <?php } ?>
        <?php } else { ?>
            <option value='000'>no tiene subcategorias asociadas</option>
            <?php
        }
    }

}
