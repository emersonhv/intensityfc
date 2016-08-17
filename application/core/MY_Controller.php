<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $layout;
    public $CI;

    public function __construct() {
        parent::__construct();
        $this->layout = 'layout/master';
        $this->CI = &get_instance();
    }

    public function delete_history() {
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
    }
    
    public function message_event($TYPE = "INFO", $MESSAGE = ""){
        log_message($TYPE, $MESSAGE . $this->session->userdata('ip_address'));
    }
    
    function convert_string_real($numero) {
        $numero = str_replace(".","",$numero);
        return str_replace(",",".",$numero);
    }
    
    function convert_real_string($numero) {
        return number_format($numero, 2, ",", ".");
    }
}
