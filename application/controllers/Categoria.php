<?php

class Categoria extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('categoria_model');
        $this->load->model('subcategoria_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        // usamos la clase Categoria y llamamos al metodo que obtiene todos los categorias
        $data['categorias'] = $this->categoria_model->obtenerCategorias();
        $data['titulo'] = "categoria";
        $data['es_usuario_normal']=FALSE;
       
        // cargar la vista
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('Categoria/index', $data);
        $this->load->view('templates/footer');
    }

    public function InCategoria() {
        $data['categorias'] = $this->categoria_model->obtenerCategorias();
        $data['titulo'] = " crear categoria";
        $data['Mensaje'] = "Categoria creada correctamente";
        $data['es_usuario_normal']=FALSE;
      
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('NombreCategoria', 'NombreCategoria', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('Categoria/INCategoria');
            $this->load->view('templates/footer');
        } else {
            $almacenar = $this->categoria_model->ingressarCategoria();
            if ($almacenar == true) {
                $this->session->set_flashdata('correcto', 'La categoria fue creada correctamente');
            } else {
                $this->session->set_flashdata('incorrecto', 'La categoria no se pudo crear correctamente');
            }
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('Categoria/INCategoria', $data);
            $this->load->view('templates/footer');
        }
    }

    public function ver($id) {

        $data['categorias'] = $this->subcategoria_model->Versub($id);
        $data['titulo'] = " ver subcategoria";
        $data['es_usuario_normal']=FALSE;
     
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('Categoria/Ver');
        $this->load->view('templates/footer');
    }

    public function Agregar() {
        $mostrarNombre = $this->categoria_model->nombrecategoria($this->uri->segment(3));
        foreach ($mostrarNombre->result() as $fila) {
            $nombreCategoria = $fila->NombreCategoria;
        }
        $agr = ['titulo' => 'agregarsubcategoria',
            'codcategoria' => $this->uri->segment(3),
            'nombrecategoria' => $nombreCategoria,
            'es_usuario_normal'=>FALSE];
       

        $this->load->view('templates/header', $agr);
        $this->load->view('templates/menu', $data);
        $this->load->view('SubCategoria/NuevaSubcategoria', $agr);
        $this->load->view('templates/footer');
    }

    public function editar() {
    $dato=['titulo' => " Editar Categoria",'es_usuario_normal'=>FALSE];
      
        $idCategoria = $this->uri->segment(3);
        $obtenerCategoria = $this->categoria_model->obtener_categoria_a_modificar($idCategoria);

        // cargar el helper de manejo de formularios
        $this->load->helper('form');
        // cargar libreria para validar formularios

        if ($obtenerCategoria != FALSE) {
            foreach ($obtenerCategoria->result() as $fila) {
                $NombreCategoria = $fila->NombreCategoria;
                $detalles = $fila->detalles;
            }
            $data = array(
                'id' => $idCategoria,
                'Nombre' => $NombreCategoria,
                'Detalles' => $detalles,
            );
        } else {
            $data = '';
            return FALSE;
        }
        $this->load->view('templates/header', $dato);
        $this->load->view('templates/menu', $dato);
        $this->load->view('Categoria/Actualizacategoria', $data);
        $this->load->view('templates/footer');
    }

    public function CategoriaActualizada() {
        $id = $this->uri->segment(3);
        $categoria_a_modificar = array(
            'idCategoria' => $id,
            'Nombrecategoria' => $this->input->post('NombreCategoria'),
            'detalles' => $this->input->post('txtdetalle')
        );
        $act = $this->categoria_model->Actualizacategoria($id, $categoria_a_modificar);


        if ($act == true) {
            $this->session->set_flashdata('correcto', 'La categoria fue actualizada correctamente');
        } else {
            $this->session->set_flashdata('incorrecto', 'La categoria no se pudo actualizada correctamente');
        }


        redirect('Categoria');
    }

    public function modal() {
        $idCategoria = $this->uri->segment(3);
        $mostrarNombre = $this->categoria_model->nombrecategoria($idCategoria);
        foreach ($mostrarNombre->result() as $fila) {
            $nombrecategoria = $fila->NombreCategoria;
        }
        $info_modal = array(
            'id' => $idCategoria,
            'titulo_h1' => "Categoria a inactivar",
            'titulo' => "modal",
            'nombrecat' => $nombrecategoria
        );

        $this->load->view('templates/header', $info_modal);
        $this->load->view('categoria/modal', $info_modal);
    }

    public function inactivar($id) {
        /* $mostrarNombre = $this->productos_model->obtener_nombre($id);
          foreach ($mostrarNombre->result() as $fila) {
          $nombreProducto = $fila->NombreProducto;
          }
          $info_modal = array(
          'id' => $id,
          'titulo_h1' => "producto a inactivar",
          'titulo' => "modal",
          'nombrePro' => $nombreProducto
          );
         */
        $inactivocategoria = $this->categoria_model->inactivarcategoria($id);
        redirect('categoria');
    }

}
