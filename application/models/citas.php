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

    function get_cita($id = false) {

        $this->db->select("*");
        $this->db->from('citas c');
        if ($id != false) {
            $this->db->where('c.id', $id);
            $query = $this->db->get();
            $result = $query->result_array();
            if ($query->num_rows() > 0) {
                return $result[0];
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

    function get_citas_x_planes_x_cliente($id_cliente = false) {

        $this->db->select("*");
        $this->db->from('citas c');
        if ($id_cliente != false) {
            $this->db->where('c.id_cliente', $id_cliente);
			      $this->db->group_by('nombre_plan');
            $this->db->order_by('id', 'desc');
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

    function get_cantidad_citas_x_estado($id_cliente, $id_plan = false, $estado=0, $cancelada=0, $aplazada=0, $temp=0){
      $this->db->select("count(*) as cantidad");
      $this->db->from('citas c');
      if ($id_cliente != false) {
          $this->db->where('c.id_cliente', $id_cliente);
          $this->db->where('c.id_plan', $id_plan);
          if($estado == 1){
            $this->db->where('c.estado', '1');
          }else if($estado == 0){
            $this->db->where('c.estado', '0');
          }

          if($cancelada == 1){
            $this->db->where('c.cancelada', '1');
          }

          if($aplazada == 1){
            $this->db->where('c.aplazada', '1');
          }

          if($temp == 1){
            $this->db->where('c.temp', '1');
          }

          $query = $this->db->get();
          $result = $query->result_array();
          //echo "<pre>";print_r($this->db);echo "</pre>";die;
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
