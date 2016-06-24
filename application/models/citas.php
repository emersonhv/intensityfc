<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Citas extends MY_Model {

    function _construct() {
        parent::_construct();
        $this->table = 'citas';
    }

    /**
     *
     * @param type $id
     * @return Array
     */
    function get_citas($id = false) {

        $this->db->select("*");
        $this->db->from('citas c');
        if ($id != false) {
            $this->db->where('c.id', $id);
            $this->db->where('c.estado', '0');
			$this->db->where('c.cancelada', '0');
            $query = $this->db->get();
            $result = $query->result_array();
            if ($query->num_rows() > 0) {
                return $result[0];
            } else {
                return NULL;
            }
        } else {
			$this->db->where('c.estado', '0');
			$this->db->where('c.cancelada', '0');
            $query = $this->db->get();
            $result = $query->result_array();
            if ($query->num_rows() > 0) {
                return $result;
            } else {
                return NULL;
            }
        }
    }
	
	/**
     *
     * @param type $id
     * @return Array
	 * traer citas por planes, clientes y organizado por fechas y planes
     */
    function get_citas_order($id_cliente = false) {

        $this->db->select("*");
        $this->db->from('citas c');
        if ($id_cliente != false) {
            $this->db->where('c.id_cliente', $id_cliente);
			//$this->db->group_by('nombre_plan'); 
			$this->db->order_by('fecha', 'desc');
            $query = $this->db->get();
            $result = $query->result_array();
            if ($query->num_rows() > 0) {
                return $result;
            } else {
                return NULL;
            }
        } else {
            $query = $this->db->get();
            $result = $query->result_array();
            if ($query->num_rows() > 0) {
                return $result;
            } else {
                return NULL;
            }
        }
    }

    /**
     *
     * @param type $nombre
     * @param type $contrasenha
     * @return boolean
     */
    function verificar_usuario($correo, $contrasena) {

        $this->db->select('id, nombre, correo, contrasena');
        $this->db->where('correo', $correo);
        $this->db->where('contrasena', sha1($contrasena));
        $this->db->limit(1);
        $query = $this->db->get('usuarios');
        // si el resultado de la query es positivo
        if ($query->num_rows() > 0) {
            // devolvemos Array
            $result = $query->result_array();
            return $result[0];
        } else {
            // si el resultado de la query no es positivo
            // devolvemos FALSE
            return FALSE;
        }
    }
}
