<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends MY_Model {

    function _construct() {
        parent::_construct();
        $this->table = 'clientes';
    }

    /**
     *
     * @param type $id
     * @return Array
     */
    function get_clientes($id = false) {

        $this->db->select("*");
        $this->db->from('clientes c');
        if ($id != false) {
            $this->db->where('c.id', $id);
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
}

