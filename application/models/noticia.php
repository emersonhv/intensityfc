<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: ehvas_000
 * Date: 15/08/2015
 * Time: 4:52 PM
 */
class Noticia extends MY_Model{

	function _construct() {
		parent::_construct();
		$this->table = 'noticias';
	}

    function count_noticias() {
        $data = $this->db->query("SELECT count(id) as cuenta FROM noticias WHERE n_interes <> 1");
        $data_result = $data->result_array();

        if (count($data_result) > 0) {
            return $data_result;
        } else {
            return FALSE;
        }
    }

	function get_noticias_list($limit, $start)
	{
		$sql = 'SELECT id, titulo, fecha, n_interes, contenido, url_img FROM noticias WHERE n_interes <> 1 ORDER BY id DESC LIMIT ' . $start . ', ' . $limit;
		$query = $this->db->query($sql);
        $data_result = $query->result_array();
        if (count($data_result) > 0) {
            return $data_result;
        } else {
            return FALSE;
        }
	}

	function noticia_destacada() {
		$data = $this->db->query("SELECT id, titulo, fecha, n_interes, contenido, url_img FROM noticias WHERE n_interes = 1 LIMIT 1");
		$data_result = $data->result_array();

		if (count($data_result) > 0) {
			return $data_result;
		} else {
			return FALSE;
		}
	}

	function noticias() {

		$data = $this->db->query("SELECT n.id, n.titulo, n.contenido, n.fecha, n.n_interes, n.url_img FROM noticias as n WHERE n.n_interes <> 1 ORDER BY n.id DESC LIMIT 5");
		//$this->db->select('id, titulo, contenido, fecha, url_img');
		//$this->db->limit(1);
		$data_result = $data->result_array();
		// si el resultado de la query es positivo
		if (count($data_result) > 0) {
			// devolvemos Array;
			return $data_result;
		} else {
			// si el resultado de la query no es positivo
			// devolvemos FALSE
			return FALSE;
		}
	}

	function get_noticias($id = false) {

		$this->db->select("n.id, n.titulo, n.fecha, n.n_interes, n.contenido, n.url_img");
		$this->db->from('noticias n');
        if ($id != false) {
			$this->db->where('n.id', $id);
			$query = $this->db->get();
			$result = $query->result_array();
			if ($query->num_rows() > 0) {
				return $result[0];
			} else {
				return NULL;
			}
		} else {
            $this->db->order_by("id", "desc");
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