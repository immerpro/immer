<?php

class Reestablecer extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('inventario_model');
    }

    public function index() {

        if ($this->session->userdata('rol') == NULL || $this->session->userdata('rol') != 1) {
            redirect(base_url().'iniciar'); 
        }
        $data = [
            'titulo' => 'Restauracion',
            'listadoCategoriaDel' => $this->inventario_model->mostrarCategoriaEliminada(),
            'listadoproveedores' => $this->inventario_model->mostrarProveedor(),
            'listadosubcategoria'=> $this->inventario_model->mostrarSucategoria(),
            'listadoproducto'=>$this->inventario_model->mostrarProductos(),
            'es_usuario_normal' => FALSE
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('restauracion/index', $data);
        $this->load->view('templates/footer');
    }

    public function activoCategoria($codCategoria) {
        $activoCat = $this->inventario_model->activarCategoria($codCategoria);
        if ($activoCat) {
            echo "<script type='text/javascript'>"
            . "alert('la categorìa fue activada correctamente y se podra ver en el listado de categorias');"
            . "location.href ='". base_url()."categoria';"
            . "</script>";
        }
    }

    public function activoProveedor($codProveedor) {
        $activoProvee = $this->inventario_model->activarProveedor($codProveedor);
        if ($activoProvee) {
            echo "<script type='text/javascript'>"
            . "alert('El Proveedor fue Activado correctamente y se podra ver en el listado de Proveedores');"
            . "location.href ='". base_url()."proveedor';"
            . "</script>";
        }
    }
    public function activarsubcategoria($codsubcategoria) {
       $activosub = $this->inventario_model->activarsubcategoria($codsubcategoria);
        if ($activosub) {
            echo "<script type='text/javascript'>"
            . "alert('La subcategoria fue Activada correctamente y se podra ver en el listado de Subcategorias');"
            . "location.href = '". base_url()."categoria';"
            . "</script>";
        } 
    }
    
    public function activarproducto($codproducto) {
       $activopro = $this->inventario_model->activarRestauracion('Estados_idEstados','producto','idProducto',$codproducto);
        if ($activopro) {
            echo "<script type='text/javascript'>"
            . "alert('El producto fue activada correctamente y se podra ver en el listado de Productos');"
            . "location.href = '".base_url()."producto';"
            . "</script>";
        } 
    }

}
