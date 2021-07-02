<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model(array('Model_roles','Model_permisos'));
        $this->mis_librerias->validarSession();
        
    }   
	
    public function index()
	{	
		
		$ruta = $this->mis_librerias->buscarImagen("images/usuario/".$this->session->userdata('usuario')['codigoUsuario'].".jpeg","images/general/sinfoto.png");

		$data = array(
			'titulo' => 'Roles',
			'usuario'=> $this->session->userdata('usuario'),
			'nav_menu'=> $this->mis_librerias->nav_menu(),
			'imgUsuario'=> $ruta,
			'permisos'=> $this->mis_librerias->cargarPermisos('Roles')
		);
	

		$this->load->view('principal/view_headers', $data);
        $this->load->view('principal/view_nav', $data);
        $this->load->view('modulo/view_roles');
		$this->load->view('principal/view_footer');

	}

	public function insertRol(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
		$data['toast'] = true;
		$data['position']='bottom-end';

		$arrayDatos = array(
			'INSERTAR',
			'',
			$this->input->post('txtNombreRol'),
			$this->input->post('txtDescripcionRol'),
			date('Y-m-d H:i:s'),
			$this->session->userdata('usuario')['codigoUsuario'],
			'',
			'',
			'A'
		);

		if($this->input->post('txtNombreRol')!=null){
			$datos = $this->Model_roles->roles($arrayDatos);
			if(count($datos[0])>1){
				if($datos[0]['result'] == 1){
					$data['message'] ='Se registro correctamente.'; 
					$data['icon']='success';
					$data['toast'] =false;
					$data['position']='center';
					$data['result'] = 1;
				}else{
					$data['message'] ='Hubo un error.Intentalo luego.'; 
					$data['icon']='error';
					$data['toast'] =false;
					$data['position']='center';
					$data['result'] = 1;
				}
			}else{
		
				$data['message'] ='Este Rol ya se encuentra registrado.'; 
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

	public function updateRol(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
		$data['toast'] = true;
		$data['position']='bottom-end';

		$arrayDatos = array(
			'UPDATEROL',
			$this->input->post('txtCodigo'),
			$this->input->post('txtNombreRol'),
			$this->input->post('txtDescripcionRol'),
			'',
			'',
			date('Y-m-d H:i:s'),
			$this->session->userdata('usuario')['codigoUsuario'],
			''
		);

		if($this->input->post('txtNombreRol')!=null ){

			$datos = $this->Model_roles->roles($arrayDatos);
			if(count($datos[0])>1){

				if($datos[0]['result'] == 1){

					$data['message'] ='Se actualizo correctamente.'; 
					$data['icon']='success';
					$data['toast'] =false;
					$data['position']='center';
					$data['result'] = 1;
				}else{
					$data['message'] ='Hubo un error.Intentalo luego.'; 
					$data['icon']='error';
					$data['toast'] =false;
					$data['position']='center';
					$data['result'] = 1;
				}

				
			}else{

				$data['message'] ='Este Rol ya se encuentra registrado.'; 
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

	public function updateEstadoRol(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());

		$arrayDatos = array(
			'UPDATEESTADOROL',
			$this->input->post('id'),
			'',
			'',
			'',
			'',
			date('Y-m-d H:i:s'),
			$this->session->userdata('usuario')['codigoUsuario'],
			$this->input->post('estado')
		);

		$datos = $this->Model_roles->roles($arrayDatos);
	
			
			if($datos[0]['result'] == 1){
				$data['message'] = ($this->input->post('estado') =='A' ? 'Se activo el Rol.' : 'Se inactivo el Rol.');
				$data['icon']='success';
				$data['toast'] =false;
				$data['position']='center';
				$data['result'] = 1;


			}else{
				$data['message'] = ($this->input->post('estado') =='A' ? 'Se activo el Rol.' : 'Se inactivo el Rol.');
				$data['icon']='success';
				$data['toast'] =false;
				$data['position']='center';
				$data['result'] = 1;
			}

			echo json_encode($data);
	}
	public function permisos(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
	
		
		foreach($this->input->post('codigoModulo') as $modulo){
	
			$roles[] = array(
				'id_rol'=>$this->input->post('codigoRol'),
				'id_modulo'=>$modulo,
				'per_ver' => is_array($this->input->post('ver')) &&  array_key_exists($modulo ,$this->input->post('ver'))  ? 1 : 0 ,
				'per_crear' =>  is_array($this->input->post('crear')) &&  array_key_exists($modulo ,$this->input->post('crear')) ?  1 : 0,
				'per_editar' => is_array($this->input->post('editar')) &&  array_key_exists($modulo ,$this->input->post('editar')) ? 1 : 0,
				'per_eliminar' => is_array($this->input->post('eliminar')) && array_key_exists($modulo ,$this->input->post('eliminar')) ?  1: 0 

			);
			
			
			
		}


		
		$result = $this->Model_permisos->permisos(array('ELIMINARPERMISOSROL', $this->input->post('codigoRol')) );
		if($result[0]['result'] == 1 ){
			
			$this->Model_permisos->insertPermisos($roles);
			
			$data['message'] ='Se guardaron los permisos.';
			$data['icon']='success';
			$data['toast'] =false;
			$data['position']='center';
			$data['result'] = 1;

		}else{
			$data['message'] = 'Hubo problemas al realizar la accion.';
			$data['icon']='error';
			$data['toast'] =false;
			$data['position']='center';
			$data['result'] = 1;
		}
		
		echo json_encode($data);

	}

	public function cargarRoles(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
		$permisos = $this->mis_librerias->cargarPermisos($this->uri->segment(1))['permisos'][0];

		$data['tablaUsuario']="";
		$parameter = array(
			'LISTARROLES',
			'',
			'',
			'',
			'',
			'',
			'',
			''
		);

		$usuarios = $this->Model_roles->listarRoles($parameter);
		
		$arrayDatos = array();
		$i = 0;
		
		foreach($usuarios as $row){

			$i++;
			$disabled = ($permisos['per_eliminar']) == 1 ? '' : 'disabled';
			$checkIos='<label class="form-switch">
							<input type="checkbox" class="checkRol" id="checkRol'.$row['id_rol'].'" name="checkRol'.$row['id_rol'].'" '.($row['estado'] == 'A'  ? 'checked' : '' ).' value="'.$row['id_rol'].'" '.$disabled.' >
							<i></i>
		  				</label>';

			// $buttons = '<div class="content-center"><button type="button" class="btn btn-warning btn-sm btn-frm-modal" data-id ="'.$row['id_rol'].'"  data-tipo ="M"  data-form="roles"  data-toggle="modal" data-target=".bs-example-modal-lg">
			// 			<i class="fa fa-pencil-square-o fa-inverse" aria-hidden="true"></i>
			// 			</button></div>';
			$buttons = '
						<a id="drop4" href="#" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="true">
									<span class="fa fa-gear"></span>
								</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
									<a class="dropdown-item btn-frm-modal"  data-id ="'.$row['id_rol'].'"  data-tipo ="M"  data-form="roles"  data-toggle="modal" data-target=".bs-example-modal-lg"><span class="fa '. ($permisos['per_editar'] == 1 ? "fa-edit": "fa-eye").'"></span> '. ($permisos['per_editar'] == 1 ? "Editar": "Ver").'</a>
									<a class="dropdown-item btn-frm-modal-xl"  data-id ="'.$row['id_rol'].'"  data-tipo ="M"  data-form="permisos"  data-toggle="modal" data-target=".bs-example-modal-xl"><span class="fa fa-key"></span> Permisos</a>
									
								</div>
					';

			$arrayDatos[] = array(
				'orden'=>$i,
				'nombre' => $row['nombre_rol'],
				'descripcion' => $row['descripcion_rol'],
				'fechaCrea' => $row['fecha_crea'],
				'estado'=>$checkIos,
				'buttons'=> $buttons

			);
			
		}
		

		echo json_encode($arrayDatos);
	}

}