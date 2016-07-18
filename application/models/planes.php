<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Planes extends MY_Model {

    function _construct() {
        parent::_construct();
        $this->table = 'planes';
    }

    /**
     *
     * @param type $id
     * @return Array
     */
    function get_planes($id = false) {

        $this->db->select("*");
        $this->db->from('planes p');
        if ($id != false) {
            $this->db->where('p.id', $id);
            $query = $this->db->get();
            $result = $query->result_array();
            if ($query->num_rows() > 0) {
                return $result[0];
            } else {
                return NULL;
            }
        } else {
            $this->db->where('p.reference', "Like '%Plan%'");
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

