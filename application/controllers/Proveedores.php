<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model(array('Model_proveedores'));
        $this->mis_librerias->validarSession();

        
    }   
    public function index()
	{	
		
		$ruta = $this->mis_librerias->buscarImagen("images/usuario/".$this->session->userdata('usuario')['codigoUsuario'].".jpeg","images/general/sinfoto.png");

		$data = array(
			'titulo' => 'Proveedores',
			'usuario'=> $this->session->userdata('usuario'),
			'nav_menu'=> $this->mis_librerias->nav_menu(),
			'imgUsuario'=> $ruta,
			'permisos'=> $this->mis_librerias->cargarPermisos('Proveedores')
		);
	

		$this->load->view('principal/view_headers', $data);
        $this->load->view('principal/view_nav', $data);
        $this->load->view('modulo/view_proveedores');
		$this->load->view('principal/view_footer');

	}

	public function insertarProveedor(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
		
		$data['toast'] = true;
		$data['position']='bottom-end';

		$arrayData = array(
			'INSERTAR',
			'',
			$this->input->post('txtRuc'),
			$this->input->post('txtRazonSocial'),
			$this->input->post('txtTipoPersona'),
			$this->input->post('txtNombreEncargado'),
			$this->input->post('txtApellidoEncargado'),
			$this->input->post('txtTelefonoEncargado'),
			$this->input->post('txtDireccion'),
			$this->input->post('txtCorreoPro'),
			$this->input->post('txtTelefonoPro'),
			date('Y-m-d H:i:s'),
			$this->session->userdata('usuario')['codigoUsuario'],
			'',
			'',
			'A'
		);

		if($this->input->post('txtRuc') != null && $this->input->post('txtRazonSocial') != null && $this->input->post('txtTelefonoPro') != null && $this->input->post('txtTipoPersona') != null){
			$datos = $this->Model_proveedores->proveedores($arrayData);

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
		
				$data['message'] ='Este RUC ya se encuentra registrado.'; 
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

	public function updateProveedor(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
		
		$data['toast'] = true;
		$data['position']='bottom-end';

		$arrayData = array(
			'UPDATEPROVEEDOR',
			$this->input->post('txtCodigoProveedor'),
			$this->input->post('txtRuc'),
			$this->input->post('txtRazonSocial'),
			$this->input->post('txtTipoPersona'),
			$this->input->post('txtNombreEncargado'),
			$this->input->post('txtApellidoEncargado'),
			$this->input->post('txtTelefonoEncargado'),
			$this->input->post('txtDireccion'),
			$this->input->post('txtCorreoPro'),
			$this->input->post('txtTelefonoPro'),
			'',
			'',
			date('Y-m-d H:i:s'),
			$this->session->userdata('usuario')['codigoUsuario'],
			''
		);

		if($this->input->post('txtRuc') != null && $this->input->post('txtRazonSocial') != null && $this->input->post('txtTelefonoPro') != null && $this->input->post('txtTipoPersona') != null){
			$datos = $this->Model_proveedores->proveedores($arrayData);

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
		
				$data['message'] ='Este RUC ya se encuentra registrado.'; 
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

	
	public function updateProveedorEstado(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());

		$arrayDatos = array(
			'UPDATEPROVEEDORESTADO',
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
			date('Y-m-d H:i:s'),
			$this->session->userdata('usuario')['codigoUsuario'],
			$this->input->post('estado')
		);

		$datos = $this->Model_proveedores->proveedores($arrayDatos);
	
			
			if($datos[0]['result'] == 1){
				$data['message'] = ($this->input->post('estado') =='A' ? 'Se activo el Proveedor.' : 'Se inactivo el Proveedor.');
				$data['icon']='success';
				$data['toast'] =false;
				$data['position']='center';
				$data['result'] = 1;


			}else{
				$data['message'] = "Hubo un error.Intentalo luego.";
				$data['icon']='success';
				$data['toast'] =false;
				$data['position']='center';
				$data['result'] = 1;
			}

			echo json_encode($data);
	}


	public function cargarProveedores(){
		$this->mis_librerias->validaIsAjax($this->input->is_ajax_request());
		$permisos = $this->mis_librerias->cargarPermisos($this->uri->segment(1))['permisos'][0];

		$data['tablaUsuario']="";
		$parameter = array(
			'LISTARPROVEDORES',
			'',
			'',
			'',
			'',
			'',
			''
		);

		$usuarios = $this->Model_proveedores->listarProveedores($parameter);
		
		$arrayDatos = array();
		$i = 0;
		
		foreach($usuarios as $row){

			$i++;
			$disabled = ($permisos['per_eliminar']) == 1 ? '' : 'disabled';
			$checkIos='<label class="form-switch">
							<input type="checkbox" class="checkPro" id="checkPro'.$row['id_proveedor'].'" name="checkPro'.$row['id_proveedor'].'" '.($row['estado'] == 'A'  ? 'checked' : '' ).' value="'.$row['id_proveedor'].'" '.$disabled.' >
							<i></i>
		  				</label>';

			$buttons = '<div class="content-center"><button type="button" class="btn btn-warning btn-sm btn-frm-modal" data-id ="'.$row['id_proveedor'].'"  data-tipo ="M"  data-form="proveedores"  data-toggle="modal" data-target=".bs-example-modal-lg">
						<i class="fa '. ($permisos['per_editar'] == 1 ? "fa-edit": "fa-eye").' fa-inverse" aria-hidden="true"></i>
						</button></div>';
			// $buttons = '
			// 			<a id="drop4" href="#" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="true">
			// 						<span class="fa fa-gear"></span>
			// 					</a>
			// 					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
			// 						<a class="dropdown-item btn-frm-modal"  data-id ="'.$row['id_rol'].'"  data-tipo ="M"  data-form="roles"  data-toggle="modal" data-target=".bs-example-modal-lg"><span class="fa '. ($permisos['per_editar'] == 1 ? "fa-edit": "fa-eye").'"></span> '. ($permisos['per_editar'] == 1 ? "Editar": "Ver").'</a>
			// 						<a class="dropdown-item btn-frm-modal-xl"  data-id ="'.$row['id_rol'].'"  data-tipo ="M"  data-form="permisos"  data-toggle="modal" data-target=".bs-example-modal-xl"><span class="fa fa-key"></span> Permisos</a>
									
			// 					</div>
			// 		';

			$arrayDatos[] = array(
			
				'ruc' => $row['ruc'],
				'rSocial' => $row['razon_social'],
				'encargado' => $row['nombre_encargado'].' '.$row['apellido_encargado'],
				'direccion' => $row['direccion'],
				'tipoPersona' => $row['tipo_persona'],
				'check'=>$checkIos,
				'buttons'=> $buttons

			);
			
		}
		

		echo json_encode($arrayDatos);
	}


}