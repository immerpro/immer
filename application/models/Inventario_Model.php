<?php

class Inventario_Model extends CI_Model {

    Public function __construct() {
        parent::__construct();
    }

   //    NOTIFICACIONES
    // saber cuantos productos estan  agotados 
    public function cantidadAgotados() {
        $cuantoAgotado = $this->db->query("select count(pv.estado) agotados from productosview pv where estado = 4");
        return $cuantoAgotado->row();
    }

    // saber cuantos productos estan vencidos
    public function cantidadVencidos() {
        $cuantovencido = $this->db->query("SELECT COUNT(motivo) AS cantVencido FROM vencidosview ");
        return $cuantovencido->row();
    }
// CUANTOS PRODUCTOS ESTAN POR AGOTARSE
    public function cantidadXAgotarse() {
        $agotarse = $this->db->query(" select COUNT(vp.codProducto) as cuantoAgotarse from productosview  vp where existencia < 14 and existencia > 2");
        return $agotarse->row();
    }
// CUANTAS EXISTENCIAS HAY EN EL INVENTARIO
    public function cantidadExistencia() {
        $cantExist = $this->db->query("select count(existencia) as ExistenciaTotal from productosview");
        return $cantExist->row();
    }
// MOSTRAR LOS PRODUCTOS VENCIDOS
    public function obtenerVencidos() {
        $query = $this->db->get('vencidosview');
        return $query->result_array();
    }
// MOSTRAR PRODUCTOS AGOTADOS
    public function obtenerProductosAgotados() {
        $this->db->where('estado', 4);
        $query = $this->db->get('productosview');
        return $query->result_array();
    }
//MOSTRAR PRODUCTOS POR AGOTARSE
    public function obtenerProductosXAgotarse() {
        $infoxagotarse = $this->db->query(" select * from productosview  vp where existencia < 14 and existencia > 2");
        return $infoxagotarse->result_array();
    }
    // oreden de salida
    // procedimiento almacenado
     public function registrarOrdenSalida($motivo,$Precio,$Cantidad,$nombre) {
        
        $ingreso_orden_salida= $this->db->query("CALL SPRegistrarOrdenSalida(
                '$motivo',"
                . "'$Precio',"
                . "'$Cantidad',"
                . "'$nombre')");
                
        return $ingreso_orden_salida;
    }
    
    // CONSULTA SALIDA
    
    public function ConsultarSalida() {
    $query = $this->db->get('salidaview');
    return $query->result_array();
}
   

}
