<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_roles extends CI_Model {

	public function __construct(){
		parent::__construct();
		
		$this->load->database();
	
	}


    public function roles($parameter){
		$sql="call sp_roles(?,?,?,?,?,?,?,?,?);";
		$query = $this->db->query($sql,$parameter);
		
		$result = $query->result_array();
		
		$query->next_result(); 
		$query->free_result(); 
	
		return $result;

    }

	public function listarRoles($parameter){
		
		$sql="call sp_L_roles(?,?,?,?,?,?,?,?);";
		$query = $this->db->query($sql,$parameter);
		$result = $query->result_array();
		$query->next_result(); 
		$query->free_result(); 
		return $result;
		
	}

	
}