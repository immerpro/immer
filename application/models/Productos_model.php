<?php

class Productos_model extends CI_Model {

    //obtener todos los productos
    public function obtenerProductos() {
        $this->db->where('Estados_idEstados', 1);
        $query = $this->db->get('producto');
        return $query->result_array();
    }

    public function registrarProductoDetalle($descrip, $nombpro, $codb, $min, $max, $exist, $subc, $cantp, $lote, $fvencida) {
        $ingreso_producto_detalle = $this->db->query("CALL SPIngresoDetalProducto('$descrip',"
                . "'$nombpro',"
                . "'$codb',"
                . "'$min',"
                . "'$max',"
                . "'$exist',"
                . "'$subc',"
                . "'$cantp',"
                . "'$lote',"
                . "'$fvencida')");
        return $ingreso_producto_detalle;
    }

    // obtener productos para modificar

    public function obtener_productos_a_modificar($idProducto) {
        $this->db->where('idProducto', $idProducto);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    // mostrar el nombre del producto
    public function obtener_nombre($idProducto) {
        $this->db->select('NombreProducto');
        $this->db->from('producto');
        $this->db->where('idProducto', $idProducto);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

// actualizar datos de la bd
    public function actualizarProducto($idProducto, $data) {
        $this->db->where('idProducto', $idProducto);
        $this->db->update('producto', $data);
    }

    // inactivar Producto
    public function inactivarProducto($idProducto) {
        $this->db->set('Estados_idEstados', 2, FALSE);
        $this->db->where('idProducto', $idProducto);
        $this->db->where('Existencias <=', 6);
        $inactiva = $this->db->update('producto');
        return $inactiva;
    }

    public function cantidad_filas() {

        $consulta = $this->db->get('producto');
        return $consulta->num_rows();
    }

    //obtenemos todos los posts a paginar con la función
    //total_posts_paginados pasando lo que buscamos, la cantidad por página y el segmento
    //como parámetros de la misma
    public function paginarProducto($limite, $numPag) {
        $this->db->where('Estados_idEstados', 1);
        $consulta = $this->db->get('producto', $limite, $numPag);
        if ($consulta->num_rows() > 0) {

            return $consulta->result_array();
        }
    }

    public function paginarProductoFiltrado($limite, $numPag, $buscar_x_campo, $filtro) {
        $this->db->like($filtro, $buscar_x_campo);
        $this->db->where('Estados_idEstados', 1);
        $consulta = $this->db->get('producto', $limite, $numPag);
        if ($consulta->num_rows() > 0) {

            return $consulta->result_array();
        }
    }

    public function cantidad_filasFiltrado($buscar_x_campo, $filtro) {
        $this->db->like($filtro, $buscar_x_campo);
        $consulta = $this->db->get('producto');
        return $consulta->num_rows();
    }

    public function obtener_nombreSubcategoria($idSubCategoria) {
        $this->db->select('NombreSubcategoria');
        $this->db->from('subcategoria');
        $this->db->where('idSubcategoria', $idSubCategoria);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function obtener_nombreCategoria($idSubcategoria) {
        $obtenerNombreCat = $this->db->query("CALL SPObtenerNombreCategoria('$idSubcategoria')");
        return $obtenerNombreCat->row();
    }

}
