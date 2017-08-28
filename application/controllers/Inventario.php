<?php

class Inventario extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('inventario_model');
    }

    public function index() {
        if ($this->session->userdata('rol') == NULL || $this->session->userdata('rol') != 1) {
            redirect(base_url() . 'iniciar');
        }
        $data = [
            'titulo' => 'inventario',
            'cvencidos' => $this->inventario_model->cantidadVencidos(),
            'cantAgotados' => $this->inventario_model->cantidadAgotados(),
            'cporAgotarse' => $this->inventario_model->cantidadXAgotarse(),
            'existenciaTotal' => $this->inventario_model->cantidadExistencia(),
            'vendido' => $this->inventario_model->cantidadVendida(),
            'CantidadSalida' => $this->inventario_model->cantidadSaliente(),
            'cantidadEntrada' => $this->inventario_model->cantidadEntrante(),
            'mostrarVencidos' => $this->inventario_model->obtenerVencidos(),
            'mostrarAgotado' => $this->inventario_model->obtenerProductosAgotados(),
            'listXAgotarse' => $this->inventario_model->obtenerProductosXAgotarse(),
            'es_usuario_normal' => FALSE
            
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('inventario/index');
        $this->load->view('templates/footer');
    }
    
    public function mostrarNotificacionView() {
        if ($this->session->userdata('rol') == NULL || $this->session->userdata('rol') != 1) {
            redirect(base_url() . 'iniciar');
        }
        $data = ['titulo' => 'Notificaciones', 'es_usuario_normal' => FALSE];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('inventario/notifica');
        $this->load->view('templates/footer');
    }

    public function notificar() {
        $vencido = $this->inventario_model->cantidadVencidos();
        $agotado = $this->inventario_model->cantidadAgotados();
        $porAgotarse = $this->inventario_model->cantidadXAgotarse();
//        $this->form_validation->set_rules('txtnoticorreo', 'Correo Electrònico', 'valid_email');
        $this->form_validation->set_rules('txtnoticelular', 'Celular', 'min_length[10]|integer');
        $this->form_validation->set_message('integer', 'Ingrese numeros en el campo %s ');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener 10 numeros');
//        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un correo valido');
        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            if ($this->input->post('txtnoticorreo') != "") {
//cargamos la libreria email de ci
                $this->load->library("email");

                //configuracion para gmail
                $configGmail = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'immerpro2018@gmail.com',
                    'smtp_pass' => 'Eleonore2018',
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n"
                );

                //cargamos la configuración para enviar con gmail
                $this->email->initialize($configGmail);

                $this->email->from('immerpro2018@gmail.com', 'ImmerPRO');
                $this->email->to($this->input->post('txtnoticorreo'));
                $this->email->bcc('immerpro2018@gmail.com');
                switch ($this->input->post('cbomotivoNoti')) {
                    case "vencido":
                        $this->email->subject('ImmerPRO - Producto Vencido-' . date("d-M-Y"));
                        $this->email->message($this->session->userdata('apellidos').'  tiene  '  . $vencido->cantVencido . '  productos vencidos .');
                        break;
                    case "agotado":
                        $this->email->subject('ImmerPRO - Producto Agotados-' . date("d-M-Y"));
                        $this->email->message($this->session->userdata('apellidos').' tiene  ' . $agotado->agotados . ' productos agotados.');
                        break;
                    case "proximoAgotado":
                        $this->email->subject('ImmerPRO - Producto Proximo a  Agotarse-' . date("d-M-Y"));
                        $this->email->message($this->session->userdata('apellidos').' tiene ' . $porAgotarse->cuantoAgotarse . ' productos proximos a agotarse se sugiere realize un pedido de los productos.');
                        break;
                }

                if ($this->email->send()) {
                  
                     $this->load->view('mensajeEmail');
                  
                } else {
                   
                     $this->load->view('mensajeEmail');
                 
                }
            }
            if ($this->input->post('txtnoticelular') != "") {
                echo "<script> alert('funcionalidad no disponible');</script>";
                redirect('productos');
            }
           
        }
    }

    public function OrdenSalida() {
        $data = ['titulo' => 'Orden Salida',
            'lproducto' => $this->productos_model->obtenerProductos(),
            'es_usuario_normal' => FALSE];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('inventario/OrdenSalida', $data);
        $this->load->view('templates/footer');
    }

    public function CrearSalida() {
        $data = ['titulo' => 'Nueva Orden Salida',
            'lproducto' => $this->productos_model->obtenerProductos(),
            'es_usuario_normal' => FALSE];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('inventario/NuevaSalida');
        $this->load->view('templates/footer');
    }

     public function ordenentrada() {
       
        $data=['titulo'=> "ordenentrada",'es_usuario_normal' => FALSE];
        $t['proveedor_select'] = $this->Proveedor_model->TraerDatos();

        // cargar la vista
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('Ordenentrada/ordenentrada',$t);
        $this->load->view('templates/footer');
    }
    public function consultarordenentrada() {
       $data=['titulo'=> "Listado Entradas",'es_usuario_normal' => FALSE];
        // cargar la vista
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('Ordenentrada/consultarordenentrada');
        $this->load->view('templates/footer');
    }



public function NuevaOrdenDeEntrada() {

         $data=['titulo'=> "nuevo orden de entrada",'es_usuario_normal' => FALSE];
        
        // cargar el helper de manejo de formularios
        $this->load->helper('form');
        // cargar libreria para validar formularios
        $this->load->library('form_validation');
        /* asigno reglas de validacion 1parametro=> name del campo del formulario 
         * 2parametro=> titulo validacion 
          3parametro restricciones */
        $this->form_validation->set_rules('txtCodUsuario', 'Codigo del usuario', 'required');
        $this->form_validation->set_rules('txtCodProv', 'Codigo del Proveedor', 'required');
        $this->form_validation->set_rules('txtPreentra', 'Precio entrada', 'required|numeric');
        $this->form_validation->set_rules('txtCantentra', 'cantidad Entrada', 'required|integer');
        $this->form_validation->set_rules('txtCodProduc', 'nombre Producto', 'required');
        
// FIN VALIDACION DETALLE
        // asignar mensajes
        // %s es el nombre del campo que ha fallado
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('numeric', 'Ingrese numeros en el campo %s ');
        $this->form_validation->set_message('integer', 'Ingrese numeros en el campo %s ');
       
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('Ordenentrada/ordenentrada', $data);
            $this->load->view('templates/footer');
        } else {
            // defino variables para ingresar los datos 
            $codUsuario = trim($this->input->post('txtcodUsuario'));
            $codProveedor = $this->input->post('txtCodProv');
            $precioEntrada = $this->input->post('txtPreentra');
            $cantEntrada = $this->input->post('txtCantentra');
            $codProducto = $this->input->post('txtCodProduc');

            // llamo al metodo para agregar productos y el detalle 
            $ingresoNuevaordendeentrada = $this->Ordenentrada_model->registrarordenentrada($codUsuario,$codProveedor,$precioEntrada,$cantEntrada,$codProducto);

            if ($ingresoNuevaordendeentrada) {
                //Sesion de una sola ejecución
                $this->session->set_flashdata('correcto', 'orden entrada registrada correctamente');
            } else {
                $this->session->set_flashdata('incorrecto', 'El orde de entrada no  esta  registrada');
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('Ordenentrada/ordenentrada', $data);
            $this->load->view('templates/footer');
        }
}

//    public function asociarProveedor() {
//
//        if ($this->input->post('proveedor')) {
//            $proveedor = $this->input->post('proveedor');
//           
//    }
//    }

            }





