<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pedidodetalle_model extends CI_Model {

    public $estado;
    public $fechaRegistro;
    public $fechaActualizacion;
        
    public function __construct(){
        $this->estado = true;
        $this->fechaRegistro = date("Y-m-d H:i:s");
        $this->fechaActualizacion = date("Y-m-d H:i:s");
    }

    public function listapedido(){
$this->db->select('pm.*,CONCAT(u.nombre," ",IFNULL(u.primerApellido,"")," ",IFNULL(u.segundoApellido,"")) As nombreUsuario, pd.nombreMaestro,GROUP_CONCAT(mt.nombreMaterial SEPARATOR  "<br>") as nombreMaterial, GROUP_CONCAT(pd.cantidad SEPARATOR  "<br>") as cantidad');
        $this->db->from('pedido pm'); 
        $this->db->join("usuario u","pm.idUsuario = u.idUsuario");        
        
        $this->db->join("pdetalle pd","pm.idPedido = pd.idPedido"); 
        $this->db->join("material mt","mt.idMaterial = pd.idMaterial"); 
        $this->db->where('pm.estado', 1);      
        $this->db->group_by('pm.idPedido');
      
       
        return $this->db->get();
    }

    public function recuperarPedidoDetalle($idPedido) {

      


      $this->db->select("pd.*,p.nroComprobante,p.fecha,m.nombreMaterial");
       $this->db->from("pdetalle pd"); 
       $this->db->join("pedido p ","pd.idPedido = p.idPedido");
       $this->db->join("material m ","pd.idMaterial = m.idMaterial"); 
       $this->db->join("usuario u ","p.idUsuario = u.idUsuario");
       $this->db->where("pd.idPedido",$idPedido);      
      //  $this->db->group_by('p.idPedido');





        return $this->db->get();

        
    }

public function recuperarTodoPedidoDetalle() {

      


      $this->db->select("pd.*,p.nroComprobante,p.fecha,m.nombreMaterial");
       $this->db->from("pdetalle pd"); 
       $this->db->join("pedido p ","pd.idPedido = p.idPedido");
       $this->db->join("material m ","pd.idMaterial = m.idMaterial"); 
       $this->db->join("usuario u ","p.idUsuario = u.idUsuario");
           
      //  $this->db->group_by('p.idPedido');





        return $this->db->get();

        
    }

    public function crearDetallePedido($data)
    {
   
        $this->db->insert('pdetalle', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
}
