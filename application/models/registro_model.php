<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registro_model extends CI_model {
    
    public function regitroUsuario()
	{
       $this->db->insert('usuario',$data);
    }
}