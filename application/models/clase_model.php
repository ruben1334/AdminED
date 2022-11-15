<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "conexion.php";
class clase_model extends CI_model {

	public function listaclases()
	{
		$this->db->select('c.*,u.*');         //select *
        $this->db->from('clase c');
        $this->db->join("usuario u","c.idUsuario = u.idUsuario");  
	    $this->db->where('c.habilitado ','3');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarclases($data)
	{
		$this->db->insert('clase',$data);       //devolucion de resultado de la consulta
	}

	public function eliminarclases($idClase)
	{
		$this->db->where('idClase',$idClase);
		$this->db->delete('clase');
	}
	
	public function recuperarclases($idClase)
	{
		$this->db->select('*');         //select *
        $this->db->from('clase');    	//tabla
        $this->db->where('idClase',$idClase);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarclases($idClase,$data)
	{
	    $this->db->select('c.*,u.*');         //select *
        $this->db->from('clase c');
        $this->db->join("usuario u","c.idUsuario = u.idUsuario");  
		$this->db->where('idClase',$idClase);
		$this->db->update('clase',$data); 
		     
	}

	public function ListaClasesdeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('clase'); 
	    $this->db->where('habilitado','2');
        return $this->db->get();        //devolucion de resultado de la consulta
	}


}
