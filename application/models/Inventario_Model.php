<?php

class Inventario_Model extends CI_Model {

    Public function __construct() {
        parent::__construct();
    }

    public function mostrarRestauracion($colEstado, $tabla) {
        $this->db->where($colEstado, 2);
        $query = $this->db->get($tabla);
        return $query->result_array();
    }

    public function activarRestauracion($colEstado, $tabla, $idTabla, $valId) {
        $this->db->set($colEstado, 1, FALSE);
        $this->db->where($idTabla, $valId);
        $activaRestauracion = $this->db->update($tabla);
        return $activaRestauracion;
    }

    // codigo para mostrar las categorias eliminadas
    public function mostrarCategoriaEliminada() {
        $this->db->where('Estado_estadoId', 2);
        $query = $this->db->get('categoria');
        return $query->result_array();
    }

    // codigo para mostrar las subcategorias eliminadas
    public function mostrarSucategoria() {
        $this->db->where('Estado_estadoId', 2);
        $query = $this->db->get('subcategoria');
        return $query->result_array();
    }

    // muestro los proveedores inactivos

    public function mostrarProveedor() {
        $this->db->where('Estados_idEstados', 2);
        $query = $this->db->get('proveedor');
        return $query->result_array();
    }

    // muestro los productos inactivos 
    public function mostrarProductos() {
        $this->db->where('Estados_idEstados', 2);
        $query = $this->db->get('producto');
        return $query->result_array();
    }

    // codigo para activar las categorias 
    public function activarCategoria($codigoCategoria) {
        $this->db->set('Estado_estadoId', 1, FALSE);
        $this->db->where('idCategoria', $codigoCategoria);
        $activaCat = $this->db->update('categoria');
        return $activaCat;
    }

    // codigo para activar subcategoria
    // activo subcategoria
    public function activarsubcategoria($codigosubcategoria) {
        $this->db->set('Estado_estadoId', 1, FALSE);
        $this->db->where('idSubcategoria', $codigosubcategoria);
        $activasub = $this->db->update('subcategoria');
        return $activasub;
    }

    // codigo para activar los productos 
    // codigo para activar los proveedores
    public function activarProveedor($codigoproveedor) {
        $this->db->set('Estados_idEstados', 1, FALSE);
        $this->db->where('idProveedor', $codigoproveedor);
        $activaProve = $this->db->update('proveedor');
        return $activaProve;
    }

//    NOTIFICACIONES
    // saber cuantos productos agotados 
    public function cantidadAgotados() {
        $cuantoAgotado = $this->db->query("select count(pv.estado) agotados from productosview pv where estado = 4");
        return $cuantoAgotado->row();
    }

    // saber cuantos productos vencidos
    public function cantidadVencidos() {
        $cuantovencido = $this->db->query("SELECT COUNT(motivo) AS cantVencido FROM vencidosview ");
        return $cuantovencido->row();
    }

    public function cantidadXAgotarse() {
        $agotarse = $this->db->query(" select COUNT(vp.codProducto) as cuantoAgotarse from productosview  vp where existencia < 14 and existencia > 2");
        return $agotarse->row();
    }

    public function cantidadExistencia() {
        $cantExist = $this->db->query("select count(existencia) as ExistenciaTotal from productosview");
        return $cantExist->row();
    }

    public function cantidadVendida() {
        $cantExist = $this->db->query("SELECT count(venta.CodigoProducto) as cvendida FROM productovendido_view venta");
        return $cantExist->row();
    }

    public function cantidadSaliente() {
        $cantExist = $this->db->query("select count(idOrdenSalida) as csalida from ordensalida");
        return $cantExist->row();
    }

    public function cantidadEntrante() {
        $cantExist = $this->db->query("select count(idOrdenEntrada) as centrada from ordenentrada");
        return $cantExist->row();
    }

    public function MostrarProductosVenta() {
        $mprovent = $this->db->query("select * from productovendido_view");
        return $mprovent->row();
    }

    public function mostrarvencido() {
        $mprovent = $this->db->query(" SELECT * FROM ordensalida os WHERE os.motivoSalida='vencimiento'");
        return $mprovent->row();
    }

    public function obtenerVencidos() {
        $query = $this->db->get('vencidosview');
        return $query->result_array();
    }

    public function obtenerProductosAgotados() {
        $this->db->where('estado', 4);
        $query = $this->db->get('productosview');
        return $query->result_array();
    }

    public function obtenerProductosXAgotarse() {
        $infoxagotarse = $this->db->query(" select * from productosview  vp where existencia < 14 and existencia > 2");
        return $infoxagotarse->result_array();
    }
    public function obtenerProductosMayoresExistencias() {
        $infoxagotarse = $this->db->query(" select * from productosview  vp where existencia > 30");
        return $infoxagotarse->result_array();
    }

}
