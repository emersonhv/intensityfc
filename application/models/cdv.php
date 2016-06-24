<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cdv extends MY_Model {

    function _construct() {
        parent::_construct();
        $this->table = 'cdv';
    }
    
    /**
     * 
     * @param type $codigo
     * @return boolean
     */
    function cdv_by_codigo($codigo) {
        
        $this->db->select('id, codigo, longitud, latitud, barrio, direccion, dia, hora, lideres_cabeza');
        $this->db->where('codigo', $codigo);
        $this->db->limit(1);
        $query = $this->db->get('cdv');
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
    
    /**
     * 
     * @param type $codigo
     * @return data
     */
    function all_cdv() {
        
        $this->db->select('id, codigo, longitud, latitud, barrio, direccion, dia, hora, lideres_cabeza');
        $query = $this->db->get('cdv');
        // si el resultado de la query es positivo
        if ($query->num_rows() > 0) {
            // devolvemos Array
            $result = $query->result_array();
            return $result;
            
        } else {
            // si el resultado de la query no es positivo
            // devolvemos FALSE
            return FALSE;
        }
    }
}
