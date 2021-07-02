<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model(array('Model_usuario'));
		$this->mis_librerias->validarSession();
		
	}
	public function index()
	{	

		$ruta = $this->mis_librerias->buscarImagen("images/usuario/".$this->session->userdata('usuario')['codigoUsuario'].".jpeg","images/general/sinfoto.png");

		$data = array(
			'titulo' => 'Usuarios',
			'usuario'=> $this->session->userdata('usuario'),
			'nav_menu'=> $this->mis_librerias->nav_menu(),
			'imgUsuario'=> $ruta,
			'permisos'=> $this->mis_librerias->cargarPermisos('Usuario')
		);
	

		$this->load->view('principal/view_headers', $data);
        $this->load->view('principal/view_nav', $data);
        $this->load->view('modulo/view_usuarios',$data);
		$this->load->view('principal/view_footer');

	}
	function insertUsuario(){
		
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
		
		$datosUsuario=array(
			'INSERTAR',
			'',
			$this->input->post('txtNombre'),
			$this->input->post('txtApellido'),
			$this->input->post('txtUsuario'),
			$this->input->post('txtPass'),
			$this->input->post('txtNac'),
			
			$this->input->post('txtTipoDocumento'),
			$this->input->post('txtNumDocumento'),


			$this->input->post('txtCelular'),
			$this->input->post('txtCorreo'),
			$this->input->post('txtDomicilio'), 	
			$this->input->post('txtSexo'),
			date('Y-m-d H:i:s'),
			$this->session->userdata('usuario')['codigoUsuario'],
			'',
			'',
			$this->input->post('txtRol'), 	
			'A'

		);
		
		$data['toast'] = true;
		$data['position']='bottom-end';



		if($this->input->post('txtNombre') != null && $this->input->post('txtApellido') != null &&  $this->input->post('txtUsuario') != null && $this->input->post('txtPass') !=  null &&  $this->input->post('txtNac') != null &&  $this->input->post('txtNumDocumento') !=  null && $this->input->post('txtTipoDocumento') !=  null &&  $this->input->post('txtCelular') != null && $this->input->post('txtSexo') !=  null && $this->input->post('txtRol') != null ){
			
			if($this->input->post('txtPass') == $this->input->post('txtPassConfirm')){
				$datos = $this->Model_usuario->insertUsuario($datosUsuario);
			

				if(count($datos[0])>1){
			
					if($datos[0]['result'] == 1){

						$data['message'] ='Se registro correctamente.'; 
						$data['nombre']  = 'Nombre del Usuario: '.mb_strtoupper($this->input->post('txtNombre')).' '.mb_strtoupper($this->input->post('txtApellido'));

						$data['icon']='success';
						$data['toast'] =false;
						$data['position']='center';
						$data['result'] = 1;

			
						if (isset($_FILES['imagen']) && $_FILES['imagen']['type'] != "") {
							
							$ruta ="images/Usuario/";
							$nombre = $datos[0]['idUsuario'];
							$img = $_FILES['imagen'];
							$resultImg = $this->mis_librerias->subirImagenPerfil($ruta,$nombre,$img);
							
							if($resultImg['result'] !== true){
							 
								$data['message'] ='Hubo un error.Intentalo luego.'; 
								$data['icon']='error';
								$data['toast'] =false;
								$data['position']='center';
								$data['result'] = 1;
							}
						}

					}else{
						
						$data['message'] ='Hubo un error.Intentalo luego.'; 
						$data['icon']='error';
						$data['toast'] =false;
						$data['position']='center';
						$data['result'] = 1;
					}
		
				}else{
					$data['message'] = 'El usuario ya existe.';
					$data['icon']='error';
					$data['result'] = 0;
				}

			}else{
				$data['message'] = 'Las contraseñas deben ser las mismas.';
				$data['icon']='warning';
				$data['result'] = 0;

			}
			

		}else{
			$data['message'] ='Debes completar los campos(*)'; 
			$data['icon']='warning';
			$data['result'] = 0;

		}
		

		echo json_encode($data);
		
	}


	public function updateUsuario(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
		
		$datosUsuario=array(
			'UPDATEUSUARIO',
			$this->input->post('txtCodigo'),
			$this->input->post('txtNombre'),
			$this->input->post('txtApellido'),
			$this->input->post('txtUsuario'),
			$this->input->post('txtPass'),
			// password_hash($this->input->post('txtPass'),PASSWORD_DEFAULT),
			$this->input->post('txtNac'),
			$this->input->post('txtTipoDocumento'),
			$this->input->post('txtNumDocumento'),
			$this->input->post('txtCelular'),
			$this->input->post('txtCorreo'),
			$this->input->post('txtDomicilio'), 	
			$this->input->post('txtSexo'),
			'',
			'',
			date('Y-m-d H:i:s'),
			$this->session->userdata('usuario')['codigoUsuario'],
			$this->input->post('txtRol'),
			''
		);

		
		$data['toast'] = true;
		$data['position']='bottom-end';

		if($this->input->post('txtNombre') != null && $this->input->post('txtApellido') != null &&  $this->input->post('txtUsuario') != null && $this->input->post('txtPass') !=  null &&  $this->input->post('txtNac') != null && $this->input->post('txtNumDocumento') !=  null && $this->input->post('txtTipoDocumento') !=  null &&   $this->input->post('txtCelular') != null && $this->input->post('txtSexo') !=  null && $this->input->post('txtRol') != null ){
			
			
				$datos = $this->Model_usuario->insertUsuario($datosUsuario);
			
				
				if(count($datos[0])>1){
			
					if($datos[0]['result'] == 1){
						$data['message'] = 'Se actualizo los datos.';
						$data['nombre'] = 'Nombre del Usuario: '.mb_strtoupper($this->input->post('txtNombre')).' '.mb_strtoupper($this->input->post('txtApellido'));
						$data['icon']='success';
						$data['toast'] =false;
						$data['position']='center';
						$data['result'] = 1;

						if (isset($_FILES['imagen']) && $_FILES['imagen']['type'] != "") {
							
							$ruta ="images/Usuario/";
							$nombre =$this->input->post('txtCodigo');
							$img = $_FILES['imagen'];
							
							$resultImg = $this->mis_librerias->subirImagenPerfil($ruta,$nombre,$img);
							
							if($resultImg['result'] !== true){
							 	$data['message'] = 'Hubo problemas para insertar la imagen,intertarlo mas tarde.';
							 	$data['color']   ='yellow';
								
							 	$data['resultImagen'] = 0;
							}
						}

					}else{
						$data['message'] ='Hubo un error.Intentalo luego.'; 
						$data['icon']='error';
						$data['toast'] =false;
						$data['position']='center';
						$data['result'] = 1;
					}
		
				}else{
					$data['message'] = 'El usuario ya existe.';
					$data['icon']='error';
					$data['result'] = 0;
				}

		
			

		}else{
			$data['message'] ='Debes completar los campos(*)'; 
			$data['icon']='warning';
			$data['result'] = 0;
		}
		

		echo json_encode($data);
		
	}

	public function updateEstado(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
		$datosUsuario=array(
			'UPDATEUSUARIOESTADO',
			$this->input->post('id'),
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			date('Y-m-d H:i:s'),
			$this->session->userdata('usuario')['codigoUsuario'],
			'',
			$this->input->post('estado')
		);
	

		$datos = $this->Model_usuario->insertUsuario($datosUsuario);
	
			
			if($datos[0]['result'] == 1){
				$data['message'] = ($this->input->post('estado') =='A' ? 'Se activo el usuario.' : 'Se inactivo el usuario.');
				
				// $data['nombre'] = 'Nombre del Usuario: '.mb_strtoupper($this->input->post('txtNombre')).' '.mb_strtoupper($this->input->post('txtApellido'));
				$data['icon']='success';
				$data['toast'] =false;
				$data['position']='center';
				$data['result'] = 1;

				


			}else{
				$data['message'] = 'Hubo problemas para actualizar.';
				$data['color']   ='yellow';
				$data['result']  =0;
			}

			echo json_encode($data);


	}

	function cargarDatos(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
		$permisos = $this->mis_librerias->cargarPermisos($this->uri->segment(1))['permisos'][0];

		$data['tablaUsuario']="";
		$parameter = array(
			'LISTARUTODOUSUARIO',
			'',
			'',
			'',
			'',
			'',
			'',
			''
		);

		$usuarios = $this->Model_usuario->listarUsuario($parameter);
		
		$arrayDatos = array();

		
		foreach($usuarios as $row){
			
			$disabled = ($permisos['per_eliminar']) == 1 ? '' : 'disabled';
			$checkIos='<label class="form-switch">
							<input type="checkbox" class="checkUsuario" id="checkUsuario'.$row['id_usuario'].'" name="checkUsuario'.$row['id_usuario'].'" '.($row['estado'] == 'A'  ? 'checked' : '' ).' value="'.$row['id_usuario'].'" '.$disabled.'>
							<i></i>
		  				</label>';

			$buttons = '<div class="content-center"><button type="button" class="btn btn-warning btn-sm btn-frm-modal" data-id ="'.$row['id_usuario'].'"  data-tipo ="M"  data-form="usuario"  data-toggle="modal" data-target=".bs-example-modal-lg">
						<i class="fa '. ($permisos['per_editar'] == 1 ? "fa-pencil-square-o": "fa-eye").'  fa-inverse" aria-hidden="true"></i>
						</button></div>';

			$arrayDatos[] = array(
				'nombre' => $row['nombre'],
				'apellido' => $row['apellido'],
				'cel' => $row['cel'],
				'correo' => $row['correo'],
				'direccion' => $row['direccion'],
				'nom_usuario'=> $row['nom_usuario'],
				'rol_usu'=> $row['nombre_rol'],
				'estado'=>$checkIos,
				'buttons'=> $buttons

			);

		}
		

		echo json_encode($arrayDatos);
	}
	

}

