<?php

class Ordenentrada_model extends CI_Model {

    public function obtenerordenentrada() {
//        $this->db->where('');
        $query = $this->db->get('ordenentrada');
        return $query->result_array();
    }

    public function registrarordenentrada($codUsuario,$codProveedor,$precioEntrada,$cantEntrada,$codProducto) {
        
        $ingreso_orden_entrada = $this->db->query("CALL SPIngresoordenentrada(
                '$codUsuario',"
                . "'$codProveedor',"
                . "'$precioEntrada',"
                . "'$cantEntrada',"
                . "'$codProducto')");
                
        return $ingreso_orden_entrada;
    }
    //    public function consultarordenentrada() {
//        $this->db->where('idOrdenEntrada', 1);
//        $query = $this->db->get('ordenentrada');
//        return $query->result_array();
//    }
    
    }


