
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria_model
 *
 * @author User
 */
class Categoria_model extends CI_Model {

    // OBTENER TODAS LAS CATEGORIAS
    public function traerCategorias() {
        $this->db->where('estado_EstadoId', 1);
        $query = $this->db->get('categoria');
        return $query->result_array();
    }

    public function traerCategoriasXSubcategoria() {
        $query = $this->db->query("SELECT DISTINCT c.idCategoria as codCategoria,c.NombreCategoria as categoria  FROM categoria c 
INNER JOIN subcategoria s ON c.idCategoria=s.Categoria_idCategoria");
//        $this->db->distinct('*');
//        $this->db->from('subcategoria');
//        $this->db->join('categoria', 'Categoria.idCategoria = subcategoria.Categoria_idCategoria','INNER');
//        $query = $this->db->get();
        return $query->result_array();
//        $query = $this->db->query('CALL SPObtenerCategoriaXSubcategoria()');
//        return $query->result_array();
    }

    // llenar subcategorias a partir de una categoria
    public function asociarSubcategoria($idCategoria) {
        $this->db->where('Categoria_idCategoria', $idCategoria);
        $subcategoriasAsoc = $this->db->get('subcategoria');
        if ($subcategoriasAsoc->num_rows() > 0) {
            return $subcategoriasAsoc->result();
        } else {
            echo "no tiene subcategorias asociadas";
        }
    }

    //put your code here
    public function obtenerCategorias() {
        $this->db->where('estado_EstadoId', 1);
        $query = $this->db->get('categoria');
        return $query->result_array();
    }

    //ingresar categorias
    public function ingressarCategoria() {
        $categoria = array(
            'NombreCategoria' => $this->input->post('NombreCategoria'),
            'detalles' => $this->input->post('txtdetalle'),
            'estado_EstadoId' => 1
        );

        return $this->db->insert('categoria', $categoria);
    }

    public function nombrecategoria($id) {
        $this->db->select('NombreCategoria');
        $this->db->from('categoria');
        $this->db->where('idCategoria', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function Actualizacategoria($idCategoria, $data) {
        $this->db->where('idCategoria', $idCategoria);
        $this->db->update('categoria', $data);
    }

    public function obtener_categoria_a_modificar($idCategoria) {


        $this->db->where('idCategoria', $idCategoria);
        $query = $this->db->get('categoria');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function inactivarcategoria($idCategoria) {
        $this->db->set('estado_EstadoId', 2);
        $this->db->where('idCategoria', $idCategoria);

        $inactiva = $this->db->update('categoria');
        return $inactiva;
    }

// obtiene el nombre de la categoria a apartir del id de subcategoria
    public function obtenerNombreXid($id) {

        $this->db->select('*');
        $this->db->from('subcategoria');
        $this->db->join('categoria', 'categoria.idCategoria = subcategoria.Categoria_idCategoria');
        $this->db->where('subcategoria.Categoria_idCategoria', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

}
