<?php

class Detalle_Model extends CI_Model {

    // ingresamos el detalle del producto
    public function ingresarDetalle($datosDetalle) {
        return $this->db->insert('detalleproducto', $datosDetalle);
    }

    public function obtener_id_producto1() {
        $this->db->select_max('idProducto');
        $query = $this->db->get('producto');
        return $query;
    }
     public function obtener_id_producto() {
        $this->db->select_max('idProducto');
        $this->db->from('producto');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

}
