<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_model
 *
 * @author APRENDIZ
 */
class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function registrarusuario($registroU) {

        return $this->db->insert('usuario', $registroU);
    }

    public function iniciarSesion($usuario, $password) {

        $this->db->where('NombreUsuario', $usuario);
        $this->db->where('ClaveUsuario', sha1($password));
        $this->db->where('Estado_EstadoId', 1);
        $consulta = $this->db->get('usuario');
        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            $this->session->set_flashdata('usuario_mal', 'datos ingresados incorrectos o no tiene autorizaciòn para ingresar');
            redirect(base_url() . 'iniciar', 'refresh');
        }
    }

    public function iniciarSesionXUsuario($usuario) {

        $this->db->where('NombreUsuario', $usuario);
        $consulta = $this->db->get('usuario');
        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            $this->session->set_flashdata('usuario_mal', 'no se pudo ingresar');
            redirect(base_url() . 'iniciar', 'refresh');
        }
    }

    /*
      metodo mostrar colaboradores
     * no autorizados
     *  */

    public function mostrarColaboradorSinAutorizar() {

        $this->db->where('RolUsuario_idRolUsuario', 2);
        $query = $this->db->get('usuario');
        return $query->result_array();
    }
    public function cambiarAutorizacion($idUsColabora,$estado) {
        $this->db->set('Estado_EstadoId',$estado);
        $this->db->where('idUsuario', $idUsColabora);
       $cambio= $this->db->update('usuario');
       return $cambio;
    }

}
