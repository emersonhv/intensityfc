<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class noticias extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('noticia');
    }

    public function editar($id){
        $noticia = $this->noticia->get_noticias($id);
        $parametros['noticia'] = $noticia;
        $parametros['titulo'] = 'Editar noticia';
        $parametros['contenido'] = 'admin/editar_noticia';
        $parametros['CI'] = $this->CI;
        $this->load->view('admin/layout/master',$parametros);
    }

    public function actualizar(){
        $noticia = $this->input->post();

        $config =  array(
            'upload_path'     => "assets/images/noticias/",
            'upload_url'      => base_url()."assets/images/noticias/",
            'allowed_types'   => "gif|jpg|png|jpeg|JPG",
            'overwrite'       => TRUE,
            'max_size'        => "20000KB",
            'max_height'      => "0",
            'max_width'       => "0",
            'remove_spaces'   => TRUE
        );
        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        $this->db->trans_start();
        $this->db->trans_begin();

        if ($this->upload->do_upload('url_img')) {

            $data_img = $this->upload->data();

            $this->db->query("UPDATE noticias SET ".
                " titulo = '".$noticia['titulo']."',".
                " fecha = '".$noticia['fecha']."',".
                " n_interes = '".$noticia['n_interes']."',".
                " contenido = '".$noticia['contenido']."',".
                " url_img = '/assets/images/noticias/".$data_img['file_name']."'".
                " WHERE id = '".$noticia['id']."'"
            );

        }else{

            $this->db->query("UPDATE noticias SET ".
                " titulo = '".$noticia['titulo']."',".
                " fecha = '".$noticia['fecha']."',".
                " n_interes = '".$noticia['n_interes']."',".
                " contenido = '".$noticia['contenido']."'".
                " WHERE id = '".$noticia['id']."'"
            );
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->db->trans_complete();
            $this->listado_noticias('No se pudo actualizar noticia.',"danger");
        } else {
            $this->db->trans_commit();
            $this->db->trans_complete();
            if($noticia['n_interes'] == 1){
                $this->change_interes($noticia['id']);
            }
            $this->listado_noticias('Noticia actualizada con &eacute;xito.',"success");
        }
    }

    public function change_interes($id){
        $this->db->trans_start();
        $this->db->trans_begin();

        $this->db->query("UPDATE noticias SET n_interes = "."0"." WHERE id <> ".$id."");

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->db->trans_complete();
            return TRUE;
        }else{
            $this->db->trans_commit();
            $this->db->trans_complete();
            return FALSE;
        }
    }

    public function crear(){
        $parametros['titulo'] = 'Crear noticia';
        $parametros['contenido'] = 'admin/crear_noticia';
        $parametros['CI'] = $this->CI;
        $this->load->view('admin/layout/master',$parametros);
    }

    public function insertar(){
        $noticia = $this->input->post();

        $config =  array(
            'upload_path'     => "assets/images/noticias/",
            'upload_url'      => base_url()."assets/images/noticias/",
            'allowed_types'   => "gif|jpg|png|jpeg|JPG",
            'overwrite'       => TRUE,
            'max_size'        => "20000KB",
            'max_height'      => "0",
            'max_width'       => "0",
            'remove_spaces'   => TRUE
        );
        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        $this->db->trans_start();
        $this->db->trans_begin();

        if ($this->upload->do_upload('url_img')) {

            $data_img = $this->upload->data();

            $this->db->query("INSERT INTO noticias (titulo,fecha,n_interes,contenido,url_img) ".
                "VALUES ('".$noticia['titulo']."',
                '".$noticia['fecha']."',
                '".$noticia['n_interes']."',
                '".$noticia['contenido']."',
                '"."/assets/images/noticias/".$data_img['file_name']."' )");

        } else {

            $this->db->query("INSERT INTO noticias (titulo,fecha,n_interes,contenido) ".
                "VALUES ('".$noticia['titulo']."',
                '".$noticia['fecha']."',
                '".$noticia['n_interes']."',
                '".$noticia['contenido']."' )");
        }
		$id = $this->db->insert_id();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->db->trans_complete();
            $this->listado_noticias('No se pudo crear noticia.',"danger");
        } else {
            $this->db->trans_commit();
            $this->db->trans_complete();
            if($noticia['n_interes'] == 1){
                $this->change_interes($id);
            }
            $this->listado_noticias('Noticia creada con &eacute;xito.',"success");
        }
    }

    public function eliminar($id){

        $this->db->trans_start();
        $this->db->trans_begin();

        $this->db->query("DELETE FROM noticias WHERE id = $id");

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->db->trans_complete();
            $this->listado_noticias('No se pudo eliminar noticia.',"danger");
        } else {
            $this->db->trans_commit();
            $this->db->trans_complete();
            $this->listado_noticias('Noticia eliminada con &eacute;xito.',"success");
        }
    }

    public function listado_noticias($mensaje = null, $tipo = null){
        $this->load->model('noticia');
        $noticias = $this->noticia->get_noticias();
        $parametros['noticias'] = $noticias;
        $parametros['titulo'] = 'Lista de noticias';
        if($mensaje != null){
            $parametros['mensaje'] = $mensaje;
            $parametros['tipo'] = $tipo;
        }
        $parametros['contenido'] = 'admin/lista_noticias';
        $parametros['CI'] = $this->CI;
        $this->load->view('admin/layout/master',$parametros);
    }
}

/* End of file index.php */
/* Location: ./application/controllers/noticias.php */