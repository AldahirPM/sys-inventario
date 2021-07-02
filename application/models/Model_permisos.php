<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_permisos extends CI_Model {

	public function __construct(){
		parent::__construct();
		
		$this->load->database();
	
	}



	public function permisos($parameter){
		$sql="call sp_permisos(?,?);";
		$query = $this->db->query($sql,$parameter);
		$result = $query->result_array();
		$query->next_result(); 
		$query->free_result(); 
		return $result;
	}

    
    public function listarPermisos($parameter){
        $sql = "call sp_L_permisos(?,?,?,?)";
        $query = $this->db->query($sql,$parameter);
        $result = $query->result_array($query);
        $query->next_result(); 
		$query->free_result(); 
		return $result;
    }


    public function insertPermisos($parameter){
        
		$result = $this->db->insert_batch('conf_permisos_modulo', $parameter);
	
		return $result;
    }

	
}