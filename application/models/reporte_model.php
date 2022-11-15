<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

    function obtenerTodosPedidosPorFecha($startDate, $endDate) {
        $this->db->select('p.idPedido, p.nroComprobante, p.fecha, p.total, CONCAT(m.nombres, " ", m.primerApellido, " ", m.segundoApellido) AS nombreMaestro, CONCAT(u.nombres," ",u.primerApellido," ",u.segundoApellido) AS nombreUsuario');
        $this->db->from('pedido p');
        $this->db->join('usuario m','m.idUsuario = p.idUsuario');
        if ($startDate != null && $endDate != null) {
            $this->db->where('DATE(fecha) >=', date('Y-m-d',strtotime($startDate)));
            $this->db->where('DATE(fecha) <=', date('Y-m-d',strtotime($endDate)));
        }
        return $this->db->get()->result_array();
    }
}
