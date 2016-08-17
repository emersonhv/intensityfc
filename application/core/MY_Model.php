<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @Extends CI_Mode -> modelo predeterminado de CODEIGNITER
 */
class MY_Model extends CI_Model {

    public $table = "";

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 
     * @param type $data datos de insercion
     * @return type id del ingreso
     */
    function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * 
     * @param type $usuario, $evento, $ip
     * @return null
     */
    function insert_log($id_usuario, $evento, $fecha_hora, $ip) {
        $this->db->trans_begin();
        $this->db->query("INSERT INTO log_sistema (usuario, evento, fecha_hora, ip) VALUES ('$id_usuario','$evento','$fecha_hora','$ip')");
        $this->db->trans_commit();
    }

    /**
     * 
     * @param type $id busqueda por id de tabla
     * @return null
     */
    function find_id($id) {
        if ($id == NULL) {
            return NULL;
        }

        $this->db->where('id', $id);
        $query = $this->db->get($this->table);

        $result = $query->result_array();
        return (count($result) > 0 ? $result[0] : NULL);
    }

    /**
     * 
     * @param type $id busqueda por id de tabla
     * @return null
     */
    function find_id_field($field_id, $id) {
        if ($id == NULL) {
            return NULL;
        }

        $this->db->where($field_id, $id);
        $query = $this->db->get($this->table);

        $result = $query->result_array();
        return (count($result) > 0 ? $result[0] : NULL);
    }
    
    /**
     * 
     * @param type $id busqueda por id de tabla y nombre de tabla
     * @return null
     */
    function find_id_field_table($tabla, $field_id, $id) {
        if ($id == NULL) {
            return NULL;
        }

        $this->db->where($field_id, $id);
        $query = $this->db->get($tabla);

        $result = $query->result_array();
        return (count($result) > 0 ? $result[0] : NULL);
    }

    /**
     * 
     * @param type $sort 
     * @param type $order
     * @return type
     */
    function find_all($sort = 'id', $order = 'asc') {
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 
     * @return type Array ? true : null
     */
    function find_all_where($nombre_campo, $valor) {
        if ($valor == NULL) {
            return NULL;
        }

        $this->db->where($nombre_campo, $valor);
        $query = $this->db->get($this->table);

        return $result = $query->result_array();
    }

    /**
     * 
     * @return type Array ? true : null
     */
    function find_all_like($nombre_campo, $valor) {
        if ($valor == NULL) {
            return NULL;
        }

        $this->db->like($nombre_campo, $valor);
        $query = $this->db->get($this->table);

        return $result = $query->result_array();
    }

    /**
     * 
     * @param type $id id del registro
     * @param type $data datos a actualizar
     */
    function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    /**
     * 
     * @param type $id id del registro
     * @param type $field campo del cual buscar
     * @param type $data array con datos a actualizar Ejemplo Array( ['nombre_campo'] => 'valor_campo' );
     */
    function update_fiedl($field, $id, $data) {
        $this->db->where($field, $id);
        $this->db->update($this->table, $data);
    }

    /**
     * 
     * @param type $id id del miembro a eliminar
     */
    function delete($id) {
        if ($id != NULL) {
            $this->db->where('id', $id);
            $this->db->delete($this->table);
        }
    }

    /**
     * 
     * @param type $id del registro a eliminar
     * @param type $campo nombre del campo del registro a eliminar
     */
    function delete_to_field($campo, $id) {
        if ($id != NULL) {
            $this->db->where($campo, $id);
            $this->db->delete($this->table);
        }
    }
    
    function convert_string_real($numero) {
        $numero = str_replace(".","",$numero);
        return trim(str_replace(",",".",$numero));
    }
    
    function convert_real_string($numero) {
        return number_format($numero, 2, ",", ".");
    }
}

/* End of file MY_Model.php */
/* Location: ./system/application/libraries/MY_Model.php */