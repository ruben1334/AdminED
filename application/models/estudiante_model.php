<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class estudiante_model extends CI_model {

	public function listaEstudiantes()
	{
		$this->db->select('*');         //select *
        $this->db->from('estudiante'); 
	    $this->db->where('estado','1');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarestudiante($data)
	{
		$this->db->insert('estudiante',$data);       //devolucion de resultado de la consulta
	}

	public function eliminarestudiante($idEstudiante)
	{
		$this->db->where('idEstudiante',$idEstudiante);
		$this->db->delete('estudiante');
	}
	
	public function recuperarestudiante($idEstudiante)
	{
		$this->db->select('*');         //select *
        $this->db->from('estudiante');    	//tabla
        $this->db->where('idEstudiante',$idEstudiante);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarestudiante($idEstudiante,$data)
	{
		$this->db->select('*');
		$this->db->where('idEstudiante',$idEstudiante);
		$this->db->update('estudiante',$data); 
		     
	}

	public function listaEstudiantesdeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('estudiante'); 
	    $this->db->where('estado','0');
        return $this->db->get();        //devolucion de resultado de la consulta
	}


}
