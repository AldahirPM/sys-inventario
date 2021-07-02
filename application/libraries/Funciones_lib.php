<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Funciones_lib {

    private $CI;

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library('session');
        // $this->CI->load->model('Model_backend');
    }

    public function subirImagen($ruta,$nombre,$arrayimagen){
        return "gola";
        
        // $imagen = $arrayimagen;
        // $config['upload_path'] = $ruta;
        // $config['file_name'] = $nombre;
        // $config['allowed_types'] = "gif|jpg|jpeg|png";
        // $config['max_size'] = "0";
        // $config['max_width'] = "0";
        // $config['max_height'] = "0";
        
        // $this->CI->load->library('upload', $config);

        // if (!$this->CI->upload->do_upload($imagen)) {
        //     //*** ocurrio un error
        //     $data['uploadError'] = $this->CI->upload->display_errors();
        //     return   $this->CI->upload->display_errors();
            
        // }else{
        //      $data['uploadSuccess'] =$this->CI->upload->data();
        // }

       
    }


}