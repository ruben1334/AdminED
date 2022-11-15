<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "conexion.php";
class estudiante_model extends CI_model {

	public $estado;
    public $fechaRegistro;
    public $fechaActualizacion;

    public function __construct(){
        $this->estado = true;
        $this->fechaRegistro = date("Y-m-d H:i:s");
        $this->fechaActualizacion = date("Y-m-d H:i:s");
    }

	public function listaEstudiantes()
	{
		$this->db->select('e.*,c.nombreClase,u.nombre AS nombreUsuario');         //select *
        $this->db->from('estudiante e'); 
        $this->db->join("clase c","e.idClase = c.idClase");
        $this->db->join("usuario u","e.idUsuario = u.idUsuario");
	    $this->db->where('e.estado','1');
	    $this->db->order_by('idEstudiante', 'desc');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

		public function listaEstudiantesClase()
	{
		$this->db->select('e.*,c.nombreClase,u.nombre as nombreMaestro');         //select *
        $this->db->from('estudiante e'); 
        $this->db->join("clase c","e.idClase = c.idClase");
        $this->db->join("usuario u","e.idUsuario = u.idUsuario");
	    $this->db->where('e.estado','1');
	    //$this->db->where('e.idClase',$idClase);
	    $this->db->order_by('idEstudiante', 'desc');
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
		$data['fechaActualizacion'] = $this->fechaActualizacion;
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
