<?php

class Proveedor extends CI_Controller {

    private $proveedor_model;

    public function __construct() {
        parent::__construct();
        $this->load->model('Proveedor_model');
    }

    // metodo que ejecuta la vista principal


public function NuevoProveedor(){
    $t=['titulo' => " Nuevo Porveedor", 'es_usuario_normal' => FALSE];
//        $data['subcategorias'] = $this->subcategoria_model->obtenerSubCategorias();
        //clase para validar en codeigneiter 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtNProveedor', 'Nombre', 'required');
        $this->form_validation->set_rules('txtNit', 'nit', 'required');
        $this->form_validation->set_rules('txtcorreo', 'Email', 'required|valid_email|is_unique[usuario.email]');
        $this->form_validation->set_rules('txtdireccion', 'Direccion', 'required');
        $this->form_validation->set_rules('txtcontacto', 'Contacto', 'required');
        $this->form_validation->set_rules('txttelefono', 'Telefono', 'required|numeric');


        $this->form_validation->set_message('valid_email', 'Ingrese un correo valido');
        $this->form_validation->set_message('is_unique', '%s Debe ser unico');
        $this->form_validation->set_message('numeric', 'Los Datos de %s deben ser numericos');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s debe tener letras y numero');

     
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $t);
            $this->load->view('templates/menu', $t);
            $this->load->view('Proveedor/NuevoProveedor');
            $this->load->view('templates/footer');
        } else {
            // llamo al metodo para agregar productos
            $this->load->helper('url');
            // ingresamos los datos 
             $data = array (
                'TelefonoProveedor' => $this->input->post('txttelefono'),
                'NombreProveedor' => $this->input->post('txtNProveedor'),
                'NombreContacto' => $this->input->post('txtcontacto'),
                'DireccionProveedor' => $this->input->post('txtdireccion'),
                'CorreoElectronicoProveedor' => $this->input->post('txtcorreo'),
                'nit' => $this->input->post('txtNit'),
                'Estados_idEstados' => 1,
                );
            $registro = $this->Proveedor_model->RegistrarProveedor($data);

            if ($registro) {
                //Sesion de una sola ejecución
                $this->session->set_flashdata('correcto', ' creado correctamente');
            } else {
                $this->session->set_flashdata('incorrecto', ' se produjo un error al registrar ');
            }
            // cargar la vista
            $this->load->view('templates/header', $t);
            $this->load->view('templates/menu', $t);
            $this->load->view('Proveedor/NuevoProveedor');
            $this->load->view('templates/footer');
        }
    }
    
    public function index(){
        
           $info= array(
           
            'titulo' => "Consultar Proveedor",
            'proveedor' => $this->Proveedor_model->TraerDatos(),
            'es_usuario_normal' => FALSE  
               );
//
        
            $this->load->view('templates/header', $info);
            $this->load->view('templates/menu', $info);
            $this->load->view('Proveedor/ConsultarProveedor',$info);
            $this->load->view('templates/footer');
    }
    
        public function editarproveedor() {
        $dato=['titulo' => " Editar Proveedor",'es_usuario_normal' => FALSE];
        $idProveedor = $this->uri->segment(3);
        $obtenerProveedor= $this->Proveedor_model->Proveedor_Modificar($idProveedor);

        // cargar el helper de manejo de formularios
        $this->load->helper('form');
        // cargar libreria para validar formularios

        if ($obtenerProveedor != FALSE) {
            foreach ($obtenerProveedor->result() as $fila) {
                
               $nit =$fila->nit;
               $NombreProveedor = $fila->NombreProveedor;
               $TelefonoProveedor = $fila->TelefonoProveedor;
               $DireccionProveedor = $fila->DireccionProveedor;
	       $CorreoElectronicoProveedor = $fila->CorreoElectronicoProveedor;
	       $NombreContacto = $fila->NombreContacto;

            }
            $data = array(
                'id' => $idProveedor,
                 'nitp' => $nit,
                'NombrePr' => $NombreProveedor,
                'telefono' => $TelefonoProveedor,
                'direccion' => $DireccionProveedor,
                'correo' => $CorreoElectronicoProveedor,
                'nombrecotacto' => $NombreContacto,
                
            );
        } else {
            $data = '';
            return FALSE;
        }
        $this->load->view('templates/header', $dato);
        $this->load->view('templates/menu', $dato);
        $this->load->view('Proveedor/EditarProveedor', $data);
        $this->load->view('templates/footer');
    }

    // metodo para actualizar un producto
    public function ProveedorActualizado() {
        $id = $this->uri->segment(3);
        $proveedorActualizar = array(
            'nit' => $this->input->post('txtNit'),
            'NombreProveedor' => $this->input->post('txtNProveedor'),
            'TelefonoProveedor' => $this->input->post('txttelefono'),
            'DireccionProveedor' => $this->input->post('txtdireccion'),
            'CorreoElectronicoProveedor' => $this->input->post('txtcorreo'),
            'NombreContacto' => $this->input->post('txtcontacto'),
            
        );
        $this->Proveedor_model->EditarProveedor($id, $proveedorActualizar);
        redirect('proveedor');
    }
    
    
      public function modal() {
        $idProveedor = $this->uri->segment(3);
        $mostrarNombre = $this->Proveedor_model->obtener_nombre_proveedor($idProveedor);

        $info_modal = array(
            'id' => $idProveedor,
            'titulo_h1' => "Proveedor a inactivar",
            'titulo' => "modal",
            'nombrePro' => $mostrarNombre
        );

        $this->load->view('templates/header', $info_modal);
        $this->load->view('Proveedor/modal', $info_modal);
    }
             
    
    public function inactivar($id) {
   
        $inactivoProveedor = $this->Proveedor_model->inactivarProveedor($id);
        if ($inactivoProveedor) {
             echo "<script type='text/javascript'>"
            . "alert('Proveedor inactivado correctamente ');"
                    . "location.href ='". base_url()." proveedor';"
                    . "</script>";
        }
  


}

        }