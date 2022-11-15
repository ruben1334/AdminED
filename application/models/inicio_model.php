<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "conexion.php";
class inicio_model extends CI_model {

	public function lista()
	{
		$this->db->select('*');         //select *
        $this->db->from('usuario'); 
		$this->db->where('estado','1');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	}