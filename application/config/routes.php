<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
//-----PAGINA PRINCIPAL
$route["default_controller"] = "index";
$route["inicio"] = "index";
//-----ADMINISTRACION
$route["login"] = "index/inicio";
$route["iniciar_sesion"] = "index/iniciar_sesion";
$route["salir"] = "index/logout";
//-----PLANES
$route["nuevo_plan"] = "admin/nuevo_plan";
$route["ver_planes"] = "admin/verplanes";
$route["asignar_plan"] = "admin/wizard";
$route["insertar_citas"] = "admin/citas_aprogramadas";
$route["ver_agenda"] = "admin/agenda";
$route["obt_citas"] = "admin/get_citas";
$route["cita/(:num)"] = "admin/ver_cita/$1";
$route["editar_cita"] = "admin/editar_cita";
$route["cancelar_cita"] = "admin/cancelar_cita";
$route["completar_cita"] = "admin/completar_cita";
//-----CLIENTE
$route["cliente"] = "admin/crear";
$route["crear_cliente"] = "admin/crear_cliente";
$route["clientes"] = "admin/listar_clientes";
$route["citas/cliente/(:num)"] = "admin/citas_cliente/$1";
$route["cita/(:num)/cliente/(:num)"] = "admin/terminarcita/$1/$2";
$route["gestion_clientes"] = "admin/gestion_clientes";
//-----USUARIOS
/*$route["listado_usuarios"] = "index/listado_usuarios";
$route["editar_usuario/(:num)"] = "index/editar/$1";
$route["actualizar_usuario"] = "index/actualizar";
$route["crear_usuario"] = "index/crear";
$route["insertar_usuario"] = "index/insertar";
$route["eliminar_usuario/(:num)"] = "index/eliminar/$1";
//-----PAGINAS
$route["plantilla"] = "index/plantilla";
$route["nosotros"] = "index/nosotros";
$route["mision_vision"] = "index/mision";
$route["servicios"] = "index/servicios";
$route["noticias/(:num)"] = "index/show_noticia/$1";
$route["contactenos"] = "index/contactenos";
$route["mensaje"] = "index/enviar_mensaje";
//-----NOTICIAS
$route["listado_noticias"] = "noticias/listado_noticias";
$route["editar_noticia/(:num)"] = "noticias/editar/$1";
$route["actualizar_noticia"] = "noticias/actualizar";
$route["crear_noticia"] = "noticias/crear";
$route["insertar_noticia"] = "noticias/insertar";
$route["eliminar_noticia/(:num)"] = "noticias/eliminar/$1";

$route["404_override"] = "";*/


/* End of file routes.php */
/* Location: ./application/config/routes.php */
