<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class maestro_model extends CI_model {

	public function listaMaestros()
	{
		$this->db->select('*');         //select *
        $this->db->from('maestro'); 
		$this->db->where('estado','1');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarmaestro($data)
	{
		$this->db->insert('maestro',$data);       //devolucion de resultado de la consulta
	}

	public function eliminarmaestro($idMaestro)
	{
		$this->db->where('idMaestro',$idMaestro);
		$this->db->delete('maestro');
	}
	
	public function recuperarmaestro($idMaestro)
	{
		$this->db->select('*');         //select *
        $this->db->from('maestro');    	//tabla
        $this->db->where('idMaestro',$idMaestro);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarmaestro($idMaestro,$data)
	{
	
		$this->db->where('idMaestro',$idMaestro);
		$this->db->update('maestro',$data);
	
      
	}

	public function listaMaestrosdeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('maestro'); 
		$this->db->where('estado','0');
        return $this->db->get();        //devolucion de resultado de la consulta
	}


}
