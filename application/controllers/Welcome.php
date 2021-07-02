<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{	
		redirect(show_404());
		
		$this->load->view('principal/view_headers');
		$this->load->view('principal/view_nav');
	
		$this->load->view('principal/view_footer');
	}
}
