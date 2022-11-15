<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pedido_model extends CI_Model {

    public $estado;
    public $fechaRegistro;
    public $fechaActualizacion;
        
    public function __construct(){
        $this->estado = true;
        $this->fechaRegistro = date("Y-m-d H:i:s");
        $this->fechaActualizacion = date("Y-m-d H:i:s");
    }

	public function listapedido()
	{
		$this->db->select('p.*,CONCAT(u.nombre," ",IFNULL(u.primerApellido,"")," ",IFNULL(u.segundoApellido,"")) As nombreUsuario, pd.nombreMaestro,GROUP_CONCAT(mt.nombreMaterial SEPARATOR  "<br>") as nombreMaterial, GROUP_CONCAT(pd.cantidad SEPARATOR  "<br>") as cantidad');
        $this->db->from('pedido p'); 
        $this->db->join("usuario u","p.idUsuario = u.idUsuario");        
        
        $this->db->join("pdetalle pd","p.idPedido = pd.idPedido"); 
        $this->db->join("material mt","mt.idMaterial = pd.idMaterial"); 
        $this->db->where('p.estado', 1);      
        $this->db->group_by('p.idPedido');
        return $this->db->get();
	}

    public function recuperarPedido($idPedido){
        $this->db->select('*');
        $this->db->from('pedido'); 
        $this->db->where('idPedido', $idPedido);
        return $this->db->get();
	}

    public function crearPedidos($data) {

        $this->db->insert('pedido', $data); 
        $insert_id = $this->db->insert_id();
        return  $insert_id;
        
    }

    public function modificarPedido($idPedido, $data)
    {
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idPedido', $idPedido);
        $this->db->update('pedido', $data); 
    }

    public function eliminarPedido($idPedido, $estado)
    {
        $data['estado'] = !$this->estado;
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idPedido', $idPedido);
        $this->db->update('pedido', $data);
    }

    public function eliminarDetallePedido($idPedido, $estado)
    {
        $data['estado'] = 0;
        $this->db->where('idPedido', $idPedido);
        $this->db->update('pdetalle', $data);
    }

    public function listaAnulados()
	{
         $this->db->select('p.*,CONCAT(u.nombre," ",IFNULL(u.primerApellido,"")," ",IFNULL(u.segundoApellido,"")) As nombreUsuario, pd.nombreMaestro,GROUP_CONCAT(mt.nombreMaterial SEPARATOR  "<br>") as nombreMaterial, GROUP_CONCAT(pd.cantidad SEPARATOR  "<br>") as cantidad');
        $this->db->from('pedido p'); 
        $this->db->join("usuario u","p.idUsuario = u.idUsuario");        
        
        $this->db->join("pdetalle pd","p.idPedido = pd.idPedido"); 
        $this->db->join("material mt","mt.idMaterial = pd.idMaterial"); 
        $this->db->where('p.estado', 0);      
        $this->db->group_by('p.idPedido');
        return $this->db->get();

	}

    function precioPedido($idMaterial)
    {
        $this->db->select('idMaterial, precio');
        $this->db->FROM('material');
        $this->db->WHERE('idMaterial', $idMaterial);
        //$this->db->limit(1);
        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) {
            $r = $resultado->row();
            return $r->precio;
        }else{
            return 0;
        }
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

    function getNotaDepedido($idPedido)
    {
        return $this->db->get_where('pedido',array('idPedido'=>$idPedido))->row_array();
    }

    function getPedidos($idPedido)
    {
        return $this->db->get_where('pedido',array('idPedido'=>$idPedido))->row_array();
    }

    function getDetallePedido($idPedido)
    {
        $this->db->select('pd.idPedido, pd.idMaterial,pd.cantidad, mt.nombreMaterial, m.descripcion');
        $this->db->from('pdetalle pd');
        $this->db->join('material mt','mt.idMaterial = pd.idMaterial');
        $this->db->Where('pd.idPedido',$idPedido);
        return $this->db->get()->result_array();
    }

    function addDetallePedido($datosDetallePedido)
    {
        $this->db->insert('pdetalle',$datosDetallePedido);
        return $this->db->insert_id();
    }

    function getAllPedido()
    {
        
        $this->db->order_by('idPedido', 'desc');
        //$this->db->where('estado', 1);
        return $this->db->get('pedido')->result_array();
    }

    function obtenerTodosPedidosPorFecha($startDate, $endDate) {
        $this->db->select('p.*, CONCAT(m.nombre," ",IFNULL(m.primerApellido,"")," ",IFNULL(m.segundoApellido,"")) AS nombreMaestro, GROUP_CONCAT(mt.nombreMaterial SEPARATOR  "<br>") as nombreMaterial, GROUP_CONCAT(pd.cantidad SEPARATOR  "<br>") as cantidad, CONCAT(u.nombre," ",u.primerApellido," ",u.segundoApellido) AS nombreUsuario');
        $this->db->from('pedido p');
        $this->db->join('usuario m','m.idUsuario = p.idUsuario');
        $this->db->join('usuario u', 'u.idUsuario = p.idUsuario');
        $this->db->join("pdetalle pd","p.idPedido = pd.idPedido"); 
        $this->db->join("material mt","mt.idMaterial = p.idMaterial");
        
        $this->db->where('p.estado', 1);
        $this->db->where('m.tipo', 'maestro');  
        if ($startDate != null && $endDate != null) {
            $this->db->where('DATE(fecha) >=', date('Y-m-d',strtotime($startDate)));
            $this->db->where('DATE(fecha) <=', date('Y-m-d',strtotime($endDate)));
        }
        $this->db->group_by('p.idPedido');
        return $this->db->get()->result_array();
    }

    function obtenerPedidosAnuladosPorFecha($startDate, $endDate) {
        $this->db->select('p.*, CONCAT(m.nombres," ",IFNULL(m.primerApellido,"")," ",IFNULL(m.segundoApellido,"")) AS nombreMaestro, GROUP_CONCAT(mt.nombreM SEPARATOR  "<br>") as nombreMaterial,GROUP_CONCAT(pd.cantidad SEPARATOR  "<br>") as cantidad, CONCAT(u.nombres," ",u.primerApellido," ",u.segundoApellido) AS nombreUsuario');
        $this->db->from('pedido p');
        $this->db->join('usuario m','m.idUsuario = p.idUsuario');
        $this->db->join('usuario u', 'u.idUsuario = p.idUsuario');
        $this->db->join("pdetalle pd","p.idPedido = pd.idPedido"); 
        $this->db->join("material mt","mt.idMaterial = pd.idMaterial");
        
        $this->db->where('p.estado', 0); 
        $this->db->where('m.tipo', 'maestro'); 
        if ($startDate != null && $endDate != null) {
            $this->db->where('DATE(fecha) >=', date('Y-m-d',strtotime($startDate)));
            $this->db->where('DATE(fecha) <=', date('Y-m-d',strtotime($endDate)));
        }
        $this->db->group_by('p.idPedido');
        return $this->db->get()->result_array();
    }

    function obtenerMaterialesMasPedidosPorFecha($startDate, $endDate) {
        $this->db->select('mt.*, SUM(pd.cantidad) as cantidad');
        $this->db->from('material mt');                
        $this->db->join('pdetalle pd','pd.idMaterial = mt.idMaterial');
        $this->db->join("pedido p","pd.idPedido = p.idPedido"); 
        $this->db->where('mt.estado', 1);  
        /* $this->db->order_by('-SUM(d.cantidad)'); */
        if ($startDate != null && $endDate != null) {
            $this->db->where('DATE(fecha) >=', date('Y-m-d',strtotime($startDate)));
            $this->db->where('DATE(fecha) <=', date('Y-m-d',strtotime($endDate)));
        }
        $this->db->group_by('mt.idMaterial');
        $this->db->order_by('SUM(pd.cantidad)', 'desc');
        return $this->db->get()->result_array();
    }   
}
