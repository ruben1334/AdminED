<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "conexion.php";
class login_model extends CI_model {
    
    public function validar($acceso,$password)
	{
        $this->db->select('*');         //select *
        $this->db->from('usuario'); 
		$this->db->where('acceso',$acceso);
        $this->db->where('password',$password);
        
        return $this->db->get();
    }
    
}