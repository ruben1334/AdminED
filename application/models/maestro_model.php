<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "conexion.php";
class maestro_model extends CI_model {

	public $estado;
    public $fechaRegistro;
    public $fechaActualizacion;

    public function __construct(){
        $this->estado = true;
        $this->fechaRegistro = date("Y-m-d H:i:s");
        $this->fechaActualizacion = date("Y-m-d H:i:s");
    }

	public function listaMaestros()
	{
		$this->db->select('m.*');         //select *
        $this->db->from('usuario m'); 
		$this->db->where('m.estado','1');
		$this->db->where('m.tipo','maestro');
		 $this->db->order_by('1', 'desc');
		
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function recuperarmaestro($idUsuario)
	{

		$this->db->select('m.*,m.aula');         //select *
        $this->db->from('usuario m');    	//tabla
        $this->db->where('m.idUsuario',$idUsuario);
		return $this->db->get();        //devolucion de resultado de la consulta
	}
     
 public function recuperarMaestroRecibo($idUsuario){
        $this->db->select('*');
        $this->db->where('tipo','maestro');
        return $this->db->get_where('usuario',array('idUsuario'=>$idUsuario))->row_array();
    }

  public function recuperarMaestroPedido($clase){
        return $this->db->get_where('usuario',array('aula'=>$aula))->row_array();
    }
    

   public function recuperarMaestroPorID($idUsusario){
        return $this->db->get_where('usuario',array('idUsuario'=>$idUsuario))->row_array();
    }    
	public function MaestrosSelect()
	{
		$this->db->select('u.*,CONCAT(u.nombre," ",IFNULL(u.primerApellido,"")," ",IFNULL(u.segundoApellido,"")) As nombres');         //select *
        $this->db->from('usuario u'); 
		$this->db->where('u.estado','1');
		$this->db->where('u.tipo','maestro');

        return $this->db->get();        //devolucion de resultado de la consulta
	}

	 public function crearMaestro($data) {
        $data['fechaRegistro'] =  $this->fechaRegistro;
        $data['estado'] = $this->estado;
        $this->db->insert('usuario', $data); 
    }

	public function agregarmaestro($data)
	{
		 $data['fechaRegistro'] =  $this->fechaRegistro;
        $data['estado'] = $this->estado;
		$this->db->insert('usuario',$data);       //devolucion de resultado de la consulta
	}

	public function modificarmaestro($idUsuario,$data)
	{
	    $data['fechaActualizacion'] = $this->fechaActualizacion;
		$this->db->where('idUsuario',$idUsuario);
		$this->db->update('usuario',$data);
	
      
	}

	public function eliminarmaestro($idUsuario)
	{
		$this->db->where('idUsuario',$idUsuario);
		$this->db->delete('usuario');
	}


	public function listaMaestrosdeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('usuario'); 
		$this->db->where('estado','0');
		$this->db->where('tipo', 'maestro');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

public function getMaestro(){
		$this->db->select("u.*");
		$this->db->from("usuario u");
		$this->db->where("u.estado","1");
		$this->db->where('u.tipo', 'maestro');
		$resultados = $this->db->get();
		return $resultados->result();
	}

public function listarTodosMaestros()
    {
        $this->db->where('estado', 1);
        $this->db->where('tipo', 'maestro');
        $this->db->order_by('idUsuario', 'desc');
        return $this->db->get('usuario'); //->result_array();
    }


     

 
  

}
