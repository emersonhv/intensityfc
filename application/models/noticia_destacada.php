<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: ehvas_000
 * Date: 15/08/2015
 * Time: 4:52 PM
 */
class Noticia_Destacada extends MY_Model{

	function _construct() {
		parent::_construct();
		$this->table = 'noticia_destacada';
	}

	function ultima_noticia() {

		$data = $this->db->query("SELECT nd.id, nd.titulo, nd.contenido, nd.fecha, nd.url_img FROM noticia_destacada as nd WHERE (SELECT MAX(id) FROM noticia_destacada) = nd.id LIMIT 1");
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
}