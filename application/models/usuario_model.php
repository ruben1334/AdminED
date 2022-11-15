<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "conexion.php";
class usuario_model extends CI_model {

	public function listaUsuarios()
	{
		$this->db->select('*');         //select *
        $this->db->from('usuario'); 

		$this->db->where('habilitado <=','3');
	
		
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarUsuario($data)
	{
		$this->db->insert('usuario',$data);       //devolucion de resultado de la consulta
	}

	public function eliminarUsuario($idUsuario)
	{
		//$this->db->where('idUsuario',$idUsuario);
		//$this->db->delete('usuario');
		$this->db->where('idUsuario',$idUsuario);
		$this->db->update('usuario',$data);

	}
	
	public function recuperarUsuario($idUsuario)
	{
		$this->db->select('*');         //select *
        $this->db->from('usuario');    	//tabla
        $this->db->where('idUsuario',$idUsuario);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarUsuario($idUsuario,$data)
	{
	
		$this->db->where('idUsuario',$idUsuario);
		$this->db->update('usuario',$data);
	
      
	}

	public function listaUsuariodeshabilitados()
	{
		$this->db->select('*');         //select *
    $this->db->from('usuario'); 
		$this->db->where('habilitado','2');
     return $this->db->get();        //devolucion de resultado de la consulta
	}
 
 

}
