<?php

class Ordenentrada_model extends CI_Model {

    public function obtenerordenentrada() {
//        $this->db->where('');
        $query = $this->db->get('ordenentrada');
        return $query->result_array();
    }

    public function registrarordenentrada($codUsuario,$codProveedor,$precioEntrada,$cantEntrada,$codProducto) {
        
        $ingreso_orden_entrada = $this->db->query("CALL SPRegistroOrdenEntrada(
                '$codUsuario',"
                . "'$codProveedor',"
                . "'$precioEntrada',"
                . "'$cantEntrada',"
                . "'$codProducto')");
                
        return $ingreso_orden_entrada;
    }
   
public function obtenerentrada() {
    $query = $this->db->get('entradaview');
    return $query->result_array();
}
    }


