<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	/**
	 *
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('citas');
		$this->load->model('cliente');
		$this->load->model('planes');
	}

	/**
	 *
	 */
	public function index($mensaje = null, $tipo = null){
			if($mensaje != null) {
				$paramts['mensaje'] = $mensaje;
				$paramts['tipo'] = $tipo;
				$this->load->view('pagina/index', $paramts);
			} else {
				$this->load->view('pagina/index');
			}
	}

	/**
	 *
	 */
	public function verplanes($mensaje = null){
		$paramts['CI'] = $this->CI;
		$paramts['leftmenu'] = 'pagina/left_menu';
		$paramts['menu_activo'] = 'Planes';
		$paramts['titulo'] = 'Planes';
		$paramts['contenido'] = 'admin/ver_planes';
		$paramts['desc_titulo'] = 'Vista general de planes';
		$paramts['javascript'] = $this->load->view('admin/js/planesjs','', TRUE);
		$this->load->view('layout/master',$paramts);
	}

	public function listar_planes($mensaje = null){
		$planes = $this->planes->get_planes();
		echo json_encode($planes);
	}

	public function nuevo_plan($mensaje = null){
		$paramts['CI'] = $this->CI;
		$paramts['leftmenu'] = 'pagina/left_menu';
		$paramts['menu_activo'] = 'Planes';
		$paramts['titulo'] = 'Nuevo Plan';
		$paramts['contenido'] = 'admin/planes';
		$paramts['desc_titulo'] = 'Vista general de planes';
		$paramts['javascript'] = $this->load->view('admin/js/planesjs','', TRUE);
		$this->load->view('layout/master',$paramts);
	}

	public function crear_plan($mensaje = null){
		$prog = json_decode(file_get_contents('php://input'), true);
		
		$this->db->trans_start();
		$this->db->trans_begin();
		$insert = "INSERT INTO planes (name, reference, description, price, cantidad_citas, clasesxsemana) ";
		$values = "VALUES ('".$prog['name']."','".$prog['reference']."','".$prog['description']."', '".$prog['price'] ."', '".$prog['cantidad_citas']."','".$prog['clasesxsemana']."')";

		print_r($insert . ' '. $values);
		$this->db->query($insert . ' '. $values);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array('msg' =>  'No fue posible crear plan, intente nuevamente si persiste comuniquese con el proveedor.', 'tipo' => 'callout-danger'));
		} else {
			$this->db->trans_commit();
			echo json_encode(array('msg' =>  'Plan creado con éxito.', 'tipo'=>'callout-success'));
		}
	}

	public function wizard($mensaje = null){
		$paramts['CI'] = $this->CI;
		$paramts['leftmenu'] = 'pagina/left_menu';
		$paramts['menu_activo'] = 'Asignar';
		$paramts['titulo'] = 'Asignar';
		$paramts['contenido'] = 'admin/wizard';
		$paramts['mensaje'] = $mensaje;
		$paramts['desc_titulo'] = 'Asignar plan a cliente';
		$paramts['javascript'] = $this->load->view('admin/js/wizardjs','', TRUE);
		$this->load->view('layout/master',$paramts);
	}

	public function citas_aprogramadas(){
		$prog = json_decode(file_get_contents('php://input'), true);

		$this->db->trans_start();
		$this->db->trans_begin();

		$this->db->query("INSERT INTO citas (id_cliente, nombre_cliente, id_plan, nombre_plan, fecha, hora, aplazada) ".
			"VALUES(".$prog['idClie']['id'].",'".$prog['idClie']['name']."',".$prog['idPlan']['id'].",'".$prog['idPlan']['name']."','".$prog['fecha']."','".$prog['hora']."',0)"
		);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array('msg' =>  'No fue posible crear cita, intente nuevamente si persiste comuniquese con el proveedor.', 'tipo' => 'callout-danger'));
		} else {
			$this->db->trans_commit();
			echo json_encode(array('msg' =>  'Cita creada con éxito.', 'tipo'=>'callout-success'));
		}
		//$this->load->view('layout/master',$paramts);
	}

	public function agenda($mensaje = null){
		$paramts['CI'] = $this->CI;
		$paramts['leftmenu'] = 'pagina/left_menu';
		$paramts['menu_activo'] = 'Agenda';
		$paramts['titulo'] = 'Agenda';
		$paramts['contenido'] = 'admin/agenda';
		$paramts['mensaje'] = $mensaje;
		$paramts['desc_titulo'] = 'Agenda de citas';
		$paramts['javascript'] = $this->load->view('admin/js/agendajs','', TRUE);
		$this->load->view('layout/master',$paramts);
	}

	public function nueva_agenda($mensaje = null){
		$paramts['CI'] = $this->CI;
		$paramts['leftmenu'] = 'pagina/left_menu';
		$paramts['menu_activo'] = 'Nueva Agenda';
		$paramts['titulo'] = 'Nueva Agenda';
		$paramts['contenido'] = 'admin/nueva_agenda';
		$paramts['mensaje'] = $mensaje;
		$paramts['desc_titulo'] = 'Agenda de citas';
		$paramts['javascript'] = $this->load->view('admin/js/nueva_agendajs','', TRUE);
		$this->load->view('layout/master',$paramts);
	}

	public function get_citas($mensaje=null)
	{
		$citas = $this->citas->get_citas();
		echo json_encode($citas);
	}

	public function ver_cita($id){
		$citas = $this->citas->get_citas($id);
		$paramts['CI'] = $this->CI;
		$paramts['leftmenu'] = 'pagina/left_menu';
		$paramts['menu_activo'] = 'Cita';
		$paramts['titulo'] = 'Cita';
		$paramts['contenido'] = 'admin/ver_cita';
		$paramts['cita'] = $citas;
		$paramts['desc_titulo'] = 'Atualizar cita agendada';
		$paramts['javascript'] = $this->load->view('admin/js/citasjs','', TRUE);
		$this->load->view('layout/master',$paramts);
	}

	public function editar_cita(){
		$cita = json_decode(file_get_contents('php://input'), true);

		$this->db->trans_start();
		$this->db->trans_begin();

		$this->db->query("UPDATE citas SET fecha = '".$cita['fecha']."', hora = '".$cita['hora']."' ".
			"WHERE id = ".$cita['id']
		);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array('msg' =>  'No fue posible actualizar cita, intente nuevamente si persiste comuniquese con el proveedor.', 'tipo' => 'callout-danger'));
		} else {
			$this->db->trans_commit();
			echo json_encode(array('msg' =>  'Cita actualizada con éxito.', 'tipo'=>'callout-success'));
		}
		//$this->load->view('layout/master',$paramts);
	}
	
	public function crear($mensaje = null){
		$paramts['CI'] = $this->CI;
		$paramts['leftmenu'] = 'pagina/left_menu';
		$paramts['menu_activo'] = 'Nuevo Cliente';
		$paramts['titulo'] = 'Cliente';
		$paramts['contenido'] = 'admin/clientes';
		$paramts['mensaje'] = $mensaje;
		$paramts['desc_titulo'] = 'Crear nuevo cliente';
		$paramts['javascript'] = $this->load->view('admin/js/clientesjs','', TRUE);
		$this->load->view('layout/master',$paramts);
    }
	
	public function crear_cliente(){
		$cliente = json_decode(file_get_contents('php://input'), true);
		
		$this->db->trans_start();
		$this->db->trans_begin();
		$insert = "INSERT INTO clientes (name,identification,phonePrimary,phoneSecondary,fax,mobile,observations,email,address,type)";
		$values = " VALUES (
			'".$cliente['nombre']."',
			'".(isset($cliente['nit'])?$cliente['nit']:null)."',
			'".(isset($cliente['tel1'])?$cliente['tel1']:null)."',
			'".(isset($cliente['tel2'])?$cliente['tel2']:null)."',
			'".(isset($cliente['fax'])?$cliente['fax']:null)."',
			'".(isset($cliente['celular'])?$cliente['celular']:null)."',
			'".(isset($cliente['observaciones'])?$cliente['observaciones']:null)."',
			'".(isset($cliente['email'])?$cliente['email']:null)."',
			'".(isset($cliente['direccion'])?$cliente['direccion']:null)."',
			'client')";
		
		$this->db->query($insert.''.$values);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array('msg' =>  'No fue posible guardar cliente, intente nuevamente si persiste comuniquese con el proveedor.', 'tipo' => 'alert-danger'));
		} else {
			$this->db->trans_commit();
			echo json_encode(array('msg' =>  'Cliente guardado con éxito.', 'tipo'=>'alert-success'));
		}
	}
	
	public function listar_clientes($mensaje=null)
	{
		$clientes = $this->cliente->get_clientes();
		echo json_encode($clientes);
	}
	
	public function citas_cliente($id = null, $mensaje = null)
	{
		$citas = $this->citas->get_citas_order($id);
		$cliente = $this->cliente->get_clientes($id);
		$paramts['cliente'] = $cliente;
		$paramts['citas'] = $citas;
		$paramts['CI'] = $this->CI;
		$paramts['leftmenu'] = 'pagina/left_menu';
		$paramts['menu_activo'] = '';
		$paramts['mensaje'] = $mensaje;
		$paramts['titulo'] = 'Citas de cliente';
		$paramts['contenido'] = 'admin/citas_por_cliente';
		$paramts['desc_titulo'] = 'Linea de tiempo de citas del cliente y sus planes'; 
		$paramts['javascript'] = $this->load->view('admin/js/citasClientesjs','', TRUE);
		$this->load->view('layout/master',$paramts);
	}
	
	public function terminarcita($idCita, $idCliente){	

		$this->db->trans_start();
		$this->db->trans_begin();

		$this->db->query("UPDATE citas SET estado = '1' ".
			"WHERE id = ".$idCita
		);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->citas_cliente($idCliente, array('msg' =>  'No se pudo terminar la cita.', 'tipo'=>'callout-danger'));
		} else {
			$this->db->trans_commit();
			$this->citas_cliente($idCliente, array('msg' =>  'Cita terminada con éxito.', 'tipo'=>'callout-success'));
		}
	}
	
	///Estado Cita 0 => Es Cancelado
	public function cancelar_cita(){
		$cita = json_decode(file_get_contents('php://input'), true);

		$this->db->trans_start();
		$this->db->trans_begin();

		$this->db->query("UPDATE citas SET estado= '0', cancelada = '1'".
			"WHERE id = ".$cita['id']
		);
		
		$this->db->query("INSERT INTO citas_canceladas (id_cita) 
		VALUES (".$cita['id'] .");"
		);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array('msg' =>  'No fue posible Cancelar cita, intente nuevamente si persiste comuniquese con el proveedor.', 'tipo' => 'callout-danger'));
			
		} else {
			$this->db->trans_commit();
			echo json_encode(array('msg' =>  'Cita Cancelada con éxito.', 'tipo'=>'callout-success'));
			
		}
		
		//$this->load->view('layout/master',$paramts);
	}

	///Estado Cita 2 => Es Asistida
	public function completar_cita(){
		$cita = json_decode(file_get_contents('php://input'), true);

		$this->db->trans_start();
		$this->db->trans_begin();

		$this->db->query("UPDATE citas SET estado= '0', completada = '1' ".
			"WHERE id = ".$cita['id']
		);
		
		$this->db->query("INSERT INTO  citas_completas (id_cita) 
		VALUES (".$cita['id'] .");"
		);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array('msg' =>  'No fue posible Cancelar cita, intente nuevamente si persiste comuniquese con el proveedor.', 'tipo' => 'callout-danger'));
		} else {
			$this->db->trans_commit();
			echo json_encode(array('msg' =>  'Cita Cancelada con éxito.', 'tipo'=>'callout-success'));
		}
		//$this->load->view('layout/master',$paramts);
	}
	
	public function gestion_clientes($mensaje = null){
		$paramts['CI'] = $this->CI;
		$paramts['leftmenu'] = 'pagina/left_menu';
		$paramts['menu_activo'] = 'Clientes';
		$paramts['titulo'] = 'Clientes';
		$paramts['contenido'] = 'admin/clientes_lista';
		$paramts['desc_titulo'] = 'Gestione el registro de los clientes';
		$paramts['javascript'] = $this->load->view('admin/js/cliente_listajs','', TRUE);
		$this->load->view('layout/master',$paramts);
	}
	
	public function get_cliente($id)
	{
		$cliente = $this->cliente->get_clientes($id);
		echo json_encode($cliente);
	}
}

/* End of file index.php */
/* Location: ./application/controllers/admin.php */
