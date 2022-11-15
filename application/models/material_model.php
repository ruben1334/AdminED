<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "conexion.php";
class material_model extends CI_model {

	public $estado;
    public $fechaRegistro;
    public $fechaActualizacion;
        
    public function __construct(){
        $this->estado = true;
        $this->fechaRegistro = date("Y-m-d H:i:s");
        $this->fechaActualizacion = date("Y-m-d H:i:s");
    }

	public function listaMaterial()
	{
		
		$this->db->select('*');         //select *
        $this->db->from('material '); 
		$this->db->where('estado ',1);
	
        return $this->db->get();        //devolucion de resultado de la consulta
	}
	 public function recuperarmaterial($idMaterial){
        $this->db->select('*');
        $this->db->from('material'); 
        $this->db->where('idMaterial', $idMaterial);
        return $this->db->get();
	}

    public function crearMaterial($data) {
        $data['fechaRegistro'] =  $this->fechaRegistro;
        $data['estado'] = $this->estado;
        $this->db->insert('material', $data); 
        
    }

	public function agregarmaterial($data)
	{
		$this->db->insert('material',$data);       //devolucion de resultado de la consulta
	}

	public function modificarmaterial($idMaterial,$data)
	{
	     $data['fechaActualizacion'] = $this->fechaActualizacion;
		$this->db->where('idMaterial',$idMaterial);
		$this->db->update('material',$data);
	
      
	}
		

	public function eliminarmaterial($idMaterial)
	{
		//$this->db->where('idMaterial',$idMaterial);
	//	$this->db->delete('material');

		$this->db->select('*');         //select *
        $this->db->from('material'); 
		$this->db->where('estado','2');
        return $this->db->get(); 
	}

	public function listaMaterialdeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('material'); 
		$this->db->where('estado','0');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	

public function listarTodosMateriales()
    {
        $this->db->where('estado', 1);
        $this->db->order_by('idMaterial', 'desc');
        return $this->db->get('material')->result_array();
    }

}