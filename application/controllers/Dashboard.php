<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        // $this->load->model(array('Model_roles','Model_permisos'));
        $this->mis_librerias->validarSession();
        
    }   
	
    public function index()
	{	
		
		$ruta = $this->mis_librerias->buscarImagen("images/usuario/".$this->session->userdata('usuario')['codigoUsuario'].".jpeg","images/general/sinfoto.png");

		$data = array(
			'titulo' => 'Dashboard',
			'usuario'=> $this->session->userdata('usuario'),
			'nav_menu'=> $this->mis_librerias->nav_menu(),
			'imgUsuario'=> $ruta
		);
	

		$this->load->view('principal/view_headers', $data);
        $this->load->view('principal/view_nav', $data);
        $this->load->view('modulo/view_dashboard');
		$this->load->view('principal/view_footer');

	}


}