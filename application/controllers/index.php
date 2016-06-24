<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {
        
    /**
     * 
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('usuario');
    }

    /**
     * 
     */
    public function index(){
        $this->load->view('pagina/index');
    }
    
    /*
	 *
	 */
	public function inicio($mensaje = null){
		$parametros['mensaje'] = $mensaje;
        $parametros['CI'] = $this->CI;
        $parametros['leftmenu'] = 'pagina/left_menu';
        $parametros['titulo'] = 'Agenda';
        $parametros['desc_titulo'] = 'Vista general de citas';
		$this->load->view('layout/master', $parametros);
	}

	/**
	 * @param  [type]
	 * @return [type]
	 */
	public function editar($id){
		$usuario = $this->usuario->get_usuarios($id);
		$parametros['usuario'] = $usuario;
		$parametros['titulo'] = 'Editar usuario';
		$parametros['contenido'] = 'admin/editar_usuario';
		$parametros['CI'] = $this->CI;
        $parametros['leftmenu'] = 'pagina/left_menu';
		$this->load->view('layout/master',$parametros);
	}

	/*
	 *
	 */
	public function actualizar(){
		$usuario = $this->input->post();

		$this->db->trans_start();
		$this->db->trans_begin();

		$this->db->query("UPDATE usuarios SET ".
			" nombre = '".$usuario['nombre']."',".
			" correo = '".$usuario['correo']."',".
			" contrasena = SHA('".$usuario['contrasena']."')".
			" WHERE id = '".$usuario['id']."'"
		);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->listado_usuarios('No se pudo actualizar usuario.',"danger");
		} else {
			$this->db->trans_commit();
			$this->listado_usuarios('Usuario actualizado con &eacute;xito.',"success");
		}
	}

	/*
	 *
	 */
	public function crear(){
		$parametros['titulo'] = 'Crear usuario';
		$parametros['contenido'] = 'admin/crear_usuario';
		$parametros['CI'] = $this->CI;
        $parametros['leftmenu'] = 'pagina/left_menu';
		$this->load->view('layout/master',$parametros);
	}

	/*
	 *
	 */
	public function insertar(){
		$usuario = $this->input->post();

		$this->db->trans_start();
		$this->db->trans_begin();

		$this->db->query("INSERT INTO usuarios (nombre,correo,contrasena) ".
			"VALUES ('".$usuario['nombre']."','".$usuario['correo']."', SHA('".$usuario['contrasena']."'))"
		);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->listado_usuarios('No se pudo crear usuario.',"danger");
		} else {
			$this->db->trans_commit();
			$this->listado_usuarios('Usuario creado con &eacute;xito.',"success");
		}
	}

	/*
	 *
	 */
	public function eliminar($id){

		$this->db->trans_start();
		$this->db->trans_begin();

		$this->db->query("DELETE FROM usuarios WHERE id = $id");

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->listado_usuarios('No se pudo eliminar usuario.',"danger");
		} else {
			$this->db->trans_commit();
			$this->listado_usuarios('Usuario eliminado con &eacute;xito.',"success");
		}
	}

	/*
	 *
	 */
	public function listado_usuarios($mensaje = null, $tipo = null){
		$usuarios = $this->usuario->get_usuarios();
		$parametros['usuarios'] = $usuarios;
		$parametros['titulo'] = 'Lista de usuarios';
		if($mensaje != null){
			$parametros['mensaje'] = $mensaje;
			$parametros['tipo'] = $tipo;
		}
		$parametros['contenido'] = 'admin/lista_usuarios';
		$parametros['CI'] = $this->CI;
        $parametros['leftmenu'] = 'pagina/left_menu';
		$this->load->view('layout/master',$parametros);
	}

	/**
	 * Inicia una sesion en la aplicacion
	 *
	 * @access public
	 * @param void
	 * @return string mensajes
	 */
	public function iniciar_sesion() {
        $R['CI'] = $this->CI;
        $R['contenido'] = 'pagina/dashboard';
        $R['leftmenu'] = 'pagina/left_menu';
		$R['menu_activo'] = 'Dashboard';
		$R['titulo'] = 'Agenda';
        $R['desc_titulo'] = 'Vista general de citas';
        $this->load->view('layout/master',$R);
		/*$inputs = $this->input->post();

		if ($inputs['correo']!="" AND $inputs['contrasena']!="") {

			$data = $this->usuario->verificar_usuario($inputs['correo'], $inputs['contrasena']);

			$R['CI'] = $this->CI;

			if ($data != FALSE) {

				$datasession = array(
					'nombre' => $data['nombre'],
					'correo' => $data['correo'],
					'id_usuario' => $data['id'],
					'logged_in' => TRUE
				);

				$this->session->set_userdata($datasession);

				log_message("INFO", "El usuario ".$data['nombre']." ha iniciado sesion. IP: " . $this->session->userdata('ip_address'));

				$R['titulo'] = 'Bienvenido';
				$R['contenido'] = 'admin/dashboard';
				$this->load->view('layout/master',$R);

			} else {
				$R['mensaje']='Correo o contase&ntilde;a incorrecta';
				$this->load->view('pagina/index',$R);
			}
		} else {
			$R['mensaje']='Diligencie todos los campos';
			$this->load->view('pagina/index',$R);
		}*/
	}

	public function logout() {
		$CI = & get_instance();
		log_message("INFO", "El usuario " . $CI->session->userdata('nombre').
			" ha cerrado sesion. IP: " . $CI->session->userdata('ip_address'));
		$CI->session->unset_userdata('logged_in');
		$CI->session->sess_destroy();
		delete_cookie('fitness');
		$this->index();
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */