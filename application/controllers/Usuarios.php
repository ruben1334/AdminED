<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	
	public function index()
	{
		$data['msg']=$this->uri->segment(3);

		if ($this->session->userdata('login')) 
		{
			redirect('Usuarios/panel','refresh');
		}
		else
		{
			$this->load->view('inc/headerLog');
			$this->load->view('login',$data);
			$this->load->view('inc/footerLog');
		}
	}
	public function validar()
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);

		$consulta=$this->usuario_model->validar($login,$password);

		if ($consulta->num_rows()>0) 
		{
			foreach ($consulta->result() as $row)
			{
				$this->session->set_userdata('idusuario',$row->idUsuario);
				$this->session->set_userdata('login',$row->login);
				$this->session->set_userdata('tipo',$row->tipo);
				redirect('Usuarios/panel','refresh');
			}
		}
		else 
		{
			redirect('Usuarios/index/2','refresh');
		}
		
	}
	public function panel()
	{

		if ($this->session->userdata('login')) 
		{
			if($this->session->userdata('tipo')=='admin')
			{
				redirect('Maestros/index','refresh');
			}
			else
			{
				redirect('Estudiante/index','refresh');
			}

		}
		else
		{
			redirect('Usuarios/index/3','refresh');
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Usuarios/index/1','refresh');
	}

}