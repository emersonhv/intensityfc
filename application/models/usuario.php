<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends MY_Model {

    function _construct() {
        parent::_construct();
        $this->table = 'usuarios';
    }

    /**
     *
     * @param type $id
     * @return Array
     */
    function get_usuarios($id = false) {

        $this->db->select("u.id, u.nombre, u.correo");
        $this->db->from('usuarios u');
        if ($id != false) {
            $this->db->where('u.id', $id);
            $query = $this->db->get();
            $result = $query->result_array();
            if ($query->num_rows() > 0) {
                return $result[0];
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

