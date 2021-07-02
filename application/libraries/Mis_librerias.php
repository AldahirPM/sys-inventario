<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mis_librerias {

    private $CI;

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library('session');

    }

    public function subirImagen($ruta,$nombre,$nameFile){

        // var_dump($arrayimagen['name']);
        $imagen = $nameFile;
        $config['upload_path'] = $ruta;
        $config['file_name'] = $nombre;
        
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";
        
        $this->CI->load->library('upload', $config);

        if (!$this->CI->upload->do_upload($imagen)){
            //*** ocurrio un error
            $data['uploadError'] = $this->CI->upload->display_errors();

            $arrayResult = array(
                'result'=>false,
                'respuesta'=>  $this->CI->upload->display_errors()
            );

            return  $arrayResult;
            
        }else{

            $arrayResult = array(
                'result'=>true,
                'respuesta'=>  $data['uploadSuccess'] =$this->CI->upload->data()
            );
            return $arrayResult;
        }

       
    }

    public function buscarImagen($rutaImg,$rutaImgDef){
        if(file_exists($rutaImg)){
            $imagen =base_url().$rutaImg."?".$this->generarString();
        }else{
            $imagen =base_url().$rutaImgDef;
        }

        return $imagen;
    }
    public function subirImagenPerfil($ruta,$nombre,$nameFile){
     

        
        $extenionesPermitidas = array('image/jpeg','image/jpg','image/png');
        if(in_array($nameFile['type'],$extenionesPermitidas))
        {
            if(file_exists($ruta)){
                if(move_uploaded_file($nameFile['tmp_name'] , $ruta.$nombre.".jpeg")){

                    $arrayResult = array(
                        'result'=>true,
                        'respuesta'=> 'Se subio la imagen.'
                    );

                    return $arrayResult;

                }else{

                    $arrayResult = array(
                        'result'=>false,
                        'respuesta'=> 'No se pudo subir la imagen, intententar mas tarde.'
                    );
                    return $arrayResult;
                }
    
            }else{
    
                $arrayResult = array(
                    'result'=>false,
                    'respuesta'=> 'El directorio no fue encontrado.'
                );
                return $arrayResult;
            }
        }else{
            $arrayResult = array(
                'result'=>false,
                'respuesta'=> 'Solo se permite imagenes jpeg,jpg o png'
            );
            return $arrayResult;
        }

    }

    public function nav_menu(){

        $this->CI->load->model(array('Model_modulos'));
        
        $data = array(
            'grupos' => $this->CI->Model_modulos->listarModulos(array('LISTARGRUPOROL','',$this->CI->session->userdata('usuario')['codigoUsuario'],'','','','')),
            'modulos'=> $this->CI->Model_modulos->listarModulos(array('LISTARMODULOSROL','',$this->CI->session->userdata('usuario')['codigoUsuario'],'','','',''))
        );
        
        return $data;

    }

    public function cargarPermisos($url){
        $this->CI->load->model(array('Model_permisos'));
        
        $data =  array(
            'permisos'=>$this->CI->Model_permisos->listarPermisos(array('LISTARPERMISOROLMODULO',$this->CI->session->userdata('usuario')['codigoUsuario'],$url,''))
        );

        return $data;
    }

    public function validaIsAjax($bol){
        
        if ($bol !== true) {
            redirect(show_404());
            exit();
        }
    }

    public function validarSession(){

        if($this->CI->session->has_userdata('usuario') !== true){

            redirect(base_url());
            exit();
        }
        
        if($this->CI->session->has_userdata('usuario') === true ){

            $this->CI->load->model(array('Model_modulos'));
            $modulos  =$this->CI->Model_modulos->listarModulos(array('LISTARMODULOSROL','',$this->CI->session->userdata('usuario')['codigoUsuario'],'','','',''));
            
            $error404 = true;
            foreach ($modulos as $modulo) 
            {
                
                if($this->CI->uri->segment(1) == $modulo['url_modulo']){

                    $error404=false;
                    break;

                }
            }

            if($error404){
                redirect(show_404());
                exit();
            }

        }

    }

    
    public function generarString(){

        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5); 
    }

}