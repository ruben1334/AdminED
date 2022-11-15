<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once "conexion.php";
class infoclase_model extends CI_model
{

	public function listaInfoclases()
	{
		$this->db->select('c.*,u.nombre');         //select *
		$this->db->from('clase c');
		$this->db->join("usuario u","c.idUsuario = u.idUsuario"); 
		$this->db->where('c.estado ', '1');
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarInfoclases($data)
	{
		$this->db->insert('clase', $data);       //devolucion de resultado de la consulta
	}

	public function eliminarInfoclases($idClase)
	{
		$this->db->where('idClase', $idClase);
		$this->db->delete('clase');
	}

	public function recuperarInfoclases($idClase)
	{
		$this->db->select('*');         //select *
		$this->db->from('clase');    	//tabla
		$this->db->where('idClase', $idClase);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarInfoclases($idClase, $data)
	{
		$this->db->select('*');
		$this->db->where('idClase', $idClase);
		$this->db->update('clase', $data);
	}

	public function listaInfoClasesdeshabilitados()
	{
		$this->db->select('*');         //select *
		$this->db->from('clase');
		$this->db->where('estado', '0');
		return $this->db->get();        //devolucion de resultado de la consulta
	}
}
