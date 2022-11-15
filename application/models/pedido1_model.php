<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "conexion.php";
class pedido1_model extends CI_model {


	public function listaPedido()
	{
		$this->db->select('p.*,CONCAT(u.nombre," ",IFNULL(u.primerApellido,"")," ",IFNULL(u.segundoApellido,"")) As nombreUsuario, pd.nombreMaestro,GROUP_CONCAT(mt.nombreMaterial SEPARATOR  "<br>") as nombreMaterial, GROUP_CONCAT(pd.cantidad SEPARATOR  "<br>") as cantidad');
        $this->db->from('pedido p'); 
        $this->db->join("usuario u","p.idUsuario = u.idUsuario");        
        
        $this->db->join("pdetalle pd","p.idPedido = pd.idPedido"); 
        $this->db->join("material mt","mt.idMaterial = pd.idMaterial"); 
        $this->db->where('p.estado', 1);      
        $this->db->group_by('p.idPedido');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

   public function agregarpedido($data)
	{
		//$listaMaestros=$this->maestro_model->listaMaestros();
		//$data['maestro']=$listaMaestros;
       // return
         $this->db->insert('pdetalle',$data);
         $this->db->insert('pedido',$data);      
	}

    public function eliminarpedido($idPedido)
	  {
		$this->db->where('idPedido',$idPedido);
		$this->db->delete('pedido');
		$this->db->where('idPedido',$idPedido);
		$this->db->delete('pdetalle');
	  }
	
	

	public function recuperarpedido($idPedido)
	{
		$this->db->select('*');         //select *
        $this->db->from('pedido');    	//tabla
        $this->db->where('idPedido',$idPedido);

        $this->db->select('*');         //select *
        $this->db->from('pdetalle');    	//tabla
        $this->db->where('idPedido',$idPedido);
		return $this->db->get();        //devolucion de resultado de la consulta
	}
	
	public function modificarpedido($idPedido,$data)
	{
		$this->db->where('idPedido',$idPedido);
		$this->db->update('pedido',$data); 

		$this->db->where('idPedido',$idPedido);
		$this->db->update('pedido',$data);     
	}

	public function listaPedidosElegidos()
	{
		$this->db->select('pm.idPedido,
		                   u.nombre,
		                  
		                   pm.fecha,
		                   pd.cantidad,
		                   pd.razonSocial,
		                   m.nombreMaterial,
		                   pm.estado,
		                   pm.fechaActualizacion');         //select *
        $this->db->from('pedido pm');
        $this->db->join('pdetalle pd','pm.idPedido = pd.idPedido');
        $this->db->join('usuario u','pm.idUsuario = u.idUsuario');
        $this->db->join('material m','pd.idMaterial = m.idMaterial');
	    $this->db->where('pm.estado','2');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

		public function listamaterialpedido()
	{
		$this->db->select('*');         //select *
        $this->db->from('material'); 
	    $this->db->where('estado','2');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

 function contarPedidos()
    {
        $this->db->select('idPedido');
        $this->db->FROM('pedido');
        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) {
            $r = $resultado->row();
            return 1000 + $resultado->num_rows();
        }else{
            return 1000;
        }
    }
	

}
