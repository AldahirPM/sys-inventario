<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('Model_usuario');
		$this->load->library('session');

	}
	public function index()
	{	
		$this->load->view('login/view_login');
		
	}

	public function logueo(){
		

		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());

		$parameterUsuario = array(
			'USUARIOLOGUEO',
			'',
			$this->input->post('usuario'),
			$this->input->post('password'),
			'',
			'',
			'',
			''

		);


		$data['result'] = 0;
		$data['message'] = 'Hubo un problema. Intentelo mas tarde';
		$data['color'] = 'red';

		if($this->input->post('usuario') != null  && $this->input->post('password') != null){

			
			$usuario = $this->Model_usuario->listarUsuario($parameterUsuario);
			if(count($usuario)>0){

				
				$parameterLogueo = array(
					'PASSLOGUEO',
					'',
					$this->input->post('usuario'),
					$this->input->post('password'),
					'',
					'',
					'',
					''
		
				);


				$usuarioPass = $this->Model_usuario->logueo($parameterLogueo);
			
				if(count($usuarioPass)>0){
					
					if($usuarioPass[0]['estado'] =='A' ){


						
						$datosUsuario = array(
							'codigoUsuario'=> $usuarioPass[0]['id_usuario'],
							'nombre'=> $usuarioPass[0]['nombre'],
							'primerNombre' => explode(" ",$usuarioPass[0]['nombre'])[0],
							'primerApellido' => explode(" ",$usuarioPass[0]['apellido'])[0],
							'apellido'=> $usuarioPass[0]['apellido'],
							'estado'=> $usuarioPass[0]['estado'],
							'usuario'=> $usuarioPass[0]['nom_usuario'],
							'sexo'=> $usuarioPass[0]['sexo'],
							'rol'=> $usuarioPass[0]['nombre_rol'],
							'codigoRol'=>$usuarioPass[0]['rol_usu']
							
						);
												
						$this->session->set_userdata('usuario',$datosUsuario);
				
						$data['result'] = 1;
						$data['message'] = ($usuario[0]['sexo'] == 'M' ? 'BIENVENIDO ':'BIENVENIDA ').mb_strtoupper($usuario[0]['nombre']).' '.mb_strtoupper($usuario[0]['apellido']);
						$data['color'] = 'yellow';

					}else{
						$data['result'] = 0;
						$data['message'] = 'El usuario esta inactivo.';
						$data['color'] = 'red';
					}
					
				}else{

					$data['result'] = 0;
					$data['message'] = 'La contraseña que insgresaste es incorrecta';
					$data['color'] = 'red';
				}

			}else{

				$data['result'] = 0;
				$data['message'] = 'El usuario no existe';
				$data['color'] = 'red';
				
			}

		}else{
		
			$data['result'] = 0;
			$data['message'] = 'Debes completar los campos';
			$data['color'] = 'yellow';
		
		}

		echo json_encode($data);
			
	}

	public function cerrarLogin(){

		$this->session->unset_userdata('usuario');
		redirect(base_url());

	}
}
