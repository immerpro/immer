<?php

class UsuarioController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    // pagina principal
    public function index() {
        $informacion = array('titulo' => 'immerpro', 'slogan' => 'Bienvenido', 'es_usuario_normal' => TRUE);
        $this->load->view('templates/header', $informacion);
        $this->load->view('templates/menu', $informacion);
        $this->load->view('Usuario/index');
        $this->load->view('templates/footer');
    }

    public function Login() {
        //¡¡Hazme parte de ti!!
        switch ($this->session->userdata('rol')) {
            case '':
                $data = array('token' => $this->token(),
                    'titulo' => 'login',
                    'slogan' => '¡¡Hazme parte de ti!!',
                    'es_usuario_normal' => TRUE);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu', $data);
                $this->load->view('Usuario/Login');
                $this->load->view('templates/footer');

                break;
            case 1:
                redirect(base_url() . 'admin');
                break;
            case 2:
                redirect(base_url() . 'colaborador');
                break;
            default:
                $data = array('titulo' => 'login', 'slogan' => '¡¡Hazme parte de ti!!',
                    'es_usuario_normal' => TRUE);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu', $data);
                $this->load->view('Usuario/Login');
                $this->load->view('templates/footer');
                break;
        }
    }

    public function ingresoUsuario() {
        $this->load->library('form_validation');
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {

            $this->form_validation->set_rules('txtusuario', 'usuario', 'required|trim|min_length[5]|max_length[12]xss_clean');
            $this->form_validation->set_rules('txtpassword', 'contraseña', 'required|trim|min_length[5]|max_length[12]xss_clean');
            $this->form_validation->set_message('required', 'El campo %s no debe estar vacio');
            $this->form_validation->set_message('min_length', 'El campo %s  debe tener minimo 5 caracteres');
            $this->form_validation->set_message('max_length', 'El  campo %s  debe tener maximo 12 caracteres');
            


            if ($this->form_validation->run() === FALSE) {
                $this->Login();
            } else {
                $nombreusuario = $this->input->post('txtusuario');
                $claveusuario = $this->input->post('txtpassword');

                $logueo = $this->usuario_model->iniciarSesion($nombreusuario, $claveusuario);

                if ($logueo != FALSE) {
                    $infouser = array(
                        'esta_logueado' => true,
                        'idUsuario' => $logueo->idUsuario,
                        'rol' => $logueo->RolUsuario_idRolUsuario,
                        'usuario' => $logueo->NombreUsuario,
                        'apellidos' => $logueo->nombreCompleto,
                        'correo' => $logueo->email
                    );
                    $this->session->set_userdata($infouser);
                    $this->Login();
                }
            }
        } else {
            redirect(base_url() . 'iniciar');
            echo "no ingreso";
        }
    }

    //el token evita los sitios cruzados 
    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    public function cerrarsesion() {
        $this->session->sess_destroy();
        redirect(base_url() . 'iniciar');
    }

    public function RegistroUsuario() {
        $info = array(
            'titulo' => 'Registro',
            'slogan' => '¡¡Hazme parte de ti!!',
            'es_usuario_normal' => TRUE,
        );
        //clase para validar en codeigneiter 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtnombrecompleto', 'Nombre', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('txtcorreo', 'correo', 'required|valid_email|is_unique[usuario.email]');
        $this->form_validation->set_rules('txtusuario', 'usuario', 'required|alpha_numeric');
        $this->form_validation->set_rules('txtpassword', 'password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $info);
            $this->load->view('templates/menu', $info);
            $this->load->view('Usuario/Registro');
            $this->load->view('templates/footer');
        } else {
            // llamo al metodo para agregar productos
            $this->load->helper('url');
            // ingresamos los datos 
            $data = array(
                'ClaveUsuario' => sha1($this->input->post('txtpassword')),
                'NombreUsuario' => $this->input->post('txtusuario'),
                'RolUsuario_idRolUsuario' => 2,
                'nombreCompleto' => $this->input->post('txtnombrecompleto'),
                'email' => $this->input->post('txtcorreo'),
                'Estado_EstadoId' => 2);


            $registrouser = $this->usuario_model->registrarusuario($data);
            if ($registrouser) {
                //Sesion de una sola ejecución
                $this->session->set_flashdata('correcto', 'usuario creado correctamente');
            } else {
                $this->session->set_flashdata('incorrecto', ' se produjo un error al registrar el usuario intentalo mas tarde');
            }
            // cargar la vista
            $this->load->view('templates/header', $info);
            $this->load->view('templates/menu', $info);
            $this->load->view('Usuario/Registro');
            $this->load->view('templates/footer');
        }
    }

    public function olvidarClave() {
        $info = array(
            'titulo' => 'Olvidar Clave',
            'slogan' => '¡¡Hazme parte de ti!!',
            'es_usuario_normal' => TRUE,
        );
        // cargar la vista
        $this->load->view('templates/header', $info);
        $this->load->view('templates/menu', $info);
        $this->load->view('Usuario/olvidoClave');
        $this->load->view('templates/footer');
    }

    public function recuperaClave() {
        
    }

}
