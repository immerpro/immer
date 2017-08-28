<?php

class AdminController extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    public function index() {
        if ($this->session->userdata('rol') == NULL || $this->session->userdata('rol') != 1) {
            redirect(base_url() . 'iniciar');
        }
        $data = [
            'titulo' => 'Admin',
            'es_usuario_normal' => FALSE];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('Admin/index');
        $this->load->view('templates/footer');
    }

    public function mostrarPerfilAdmin() {
        $data = ['titulo' => 'perfil Admin', 'es_usuario_normal' => FALSE, 'correo' => $this->session->userdata('correo')];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('Admin/perfilAdmin', $data);
        $this->load->view('templates/footer');
    }

    public function habilitarColaboradores() {
        $data = ['titulo' => 'Habilitar',
            'es_usuario_normal' => FALSE,
            'colaboradores' => $this->usuario_model->mostrarColaboradorSinAutorizar()];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('Admin/habilitarColaborador', $data);
        $this->load->view('templates/footer');
    }

    public function colaboradorAutorizado() {
        $selColabora = $this->input->post('cboColabora');
        $selEstado = $this->input->post('cboEstado');
        $autorizado = $this->usuario_model->cambiarAutorizacion($selColabora, $selEstado);
        if ($autorizado) {
           
            $this->load->view('mensaje');
          
        } else {
           
            $this->load->view('mensaje');
          
           
        }
    }

}
