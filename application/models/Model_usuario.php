<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuario extends CI_Model {

	public function __construct(){
		parent::__construct();
		
		$this->load->database();
	
	}


    public function insertUsuario($parameter){
		$sql="call sp_usuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
		$query = $this->db->query($sql,$parameter);
		
		$result = $query->result_array();
		$query->next_result(); 
		$query->free_result(); 
	
		return $result;

    }

	public function listarUsuario($parameter){
		
		$sql="call sp_L_usuario(?,?,?,?,?,?,?,?);";
		$query = $this->db->query($sql,$parameter);
		$result = $query->result_array();
		$query->next_result(); 
		$query->free_result(); 
		return $result;
		
	}

	public function logueo($parameter){
		
		$sql="call sp_L_usuario(?,?,?,?,?,?,?,?);";
		$query = $this->db->query($sql,$parameter);
		$result = $query->result_array();
		$query->next_result(); 
		$query->free_result(); 
		return $result;
		
	}
}