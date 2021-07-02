<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoadForm extends CI_Controller {

    public $form, $tipo, $id,$datos;

    function __construct() {
        parent::__construct();
        
            $this->mis_librerias->validaIsAjax($this->input->is_ajax_request());

            $this->form = $this->uri->segment(3);
            $this->tipo = $this->uri->segment(4);
            $this->id = $this->uri->segment(5);
    
            switch($this->form) {
                case 'usuario':
                    $this->permisosParaModal($this->tipo,'Usuario');

                    $this->load->Model(array('Model_usuario','Model_roles'));
                    $this->datos['url_image']=base_url().'images/general/sinfoto.png';

                    if($this->tipo =='M' || $this->tipo =='V'){

                        $parametroUsuario = array('BUSCARUSUARIO',$this->id,'','','','','','');
                        
                        $this->datos['usuario'] = $this->Model_usuario->listarUsuario($parametroUsuario);
    
                        $this->datos['url_image'] = $this->mis_librerias->buscarImagen("images/usuario/".$this->datos['usuario'][0]['id_usuario'].".jpeg","images/general/sinfoto.png");

                    }

                    if($this->tipo!='NN'){
                        $this->datos['roles'] = $this->Model_roles->listarRoles(array('LISTARROLES','','','','','','',''));
                    }
                    
                    break;

                case 'roles':
                    $this->permisosParaModal($this->tipo,'Roles');

                    if($this->tipo=='M' || $this->tipo == 'V' ){
                        $this->load->Model(array('Model_roles'));
                        $parametroRoles = array('BUSCARROL',$this->id,'','','','','','');
                        $this->datos['rol']= $this->Model_roles->listarRoles($parametroRoles);
                    }

                break;

                case 'permisos':

                    $this->permisosParaModal($this->tipo,'Roles');

                    $this->load->Model(array('Model_modulos','Model_roles','Model_permisos'));
                    
                    $parametroRoles = array('BUSCARROL',$this->id,'','','','','','');

                    $this->datos['rol']= $this->Model_roles->listarRoles($parametroRoles);
                    $this->datos['grupo'] = $this->Model_modulos->listarModulos(array('LISTARGRUPO','','','','','',''));
                    $this->datos['modulos'] = $this->Model_permisos->listarPermisos(array('LISTARPERMISOSROL',$this->id,'',''));

                    
                    break;
                case 'proveedores':
                    $this->permisosParaModal($this->tipo,'Proveedores');

                    $this->load->Model(array('Model_proveedores'));

                    if($this->tipo == 'M' ||  $this->tipo == 'V'){

                        $parametroProveedores = array('BUSCARPROVEEDOR',$this->id,'','','','','');
                        $this->datos['proveedores']= $this->Model_proveedores->listarProveedores($parametroProveedores);

                    }
                    



                    break;
            }		

	}   
    public function permisosParaModal($tipo,$modulo){

        $permisos = $this->mis_librerias->cargarPermisos($modulo)['permisos'][0];

        switch($tipo){
            case 'N':
                if( $permisos['per_crear']!=1){
                    $this->tipo='NN';
                    $this->form ='modalDefecto';
                }

                break;
            case 'M':
                
                if( $permisos['per_editar']!=1){
                    $this->tipo='V';
                }

                break;
            default:

                $this->tipo='NN';
                $this->form ='modalDefecto';

        }

    }
	function load_form() {

        $data = array(
            'form' => $this->form,
            'tipo' => $this->tipo,
            'datos' => $this->datos,

        );

        $this->load->view('modal/form', $data);
    }


}
