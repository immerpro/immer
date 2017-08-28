<?php

class ColaboradorController extends CI_Controller{
    //put your code here
   public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }
    public function index() {
        if ($this->session->userdata('rol') == NULL || $this->session->userdata('rol') != 2) {
            redirect(base_url().'iniciar'); 
        }
        $data=['titulo' => 'Colaborador','es_usuario_normal' => FALSE];
        $this->load->view('templates/header', $data);
                $this->load->view('templates/menu', $data);
                $this->load->view('Colaborador/index');
                $this->load->view('templates/footer');
        
    }
    public function mostrarPerfilColaborador() {
        $data = ['titulo' => 'perfil Admin','es_usuario_normal' => FALSE];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
       $this->load->view('Admin/perfilColaborador');
        $this->load->view('templates/footer');
        
    }
}
