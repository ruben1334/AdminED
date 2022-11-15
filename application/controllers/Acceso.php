<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso extends CI_Controller {
	
	public function index()
	{
		$data['msg']=$this->uri->segment(3);

		if ($this->session->userdata('acceso')) 
		{
           //Usuario  ya esta logueado
			redirect('Acceso/panel','refresh');
		}
		else
		{
			//Usuario no logueado
			$this->load->view('inc/headerLog');
			$this->load->view('login',$data);
			$this->load->view('inc/footerLog');
		}
	}
	public function validar()
	{
		$acceso=$_POST['acceso'];
		$password=md5($_POST['password']);

		$consulta=$this->login_model->validar($acceso,$password);

		if ($consulta->num_rows()>0) 
		{
			//tenemos una validacion efectiva
			foreach ($consulta->result() as $row)
			{
			$this->session->set_userdata('idusuario',$row->idUsuario);
			$this->session->set_userdata('acceso',$row->acceso);
			$this->session->set_userdata('tipo',$row->tipo);
			$this->session->set_userdata('nombre',$row->nombre);
			$this->session->set_userdata('primerApellido',$row->primerApellido);
		    $this->session->set_userdata('password',$row->password);
		    $this->session->set_userdata('foto',$row->foto);

			redirect('Acceso/panel','refresh');
			}
		}
		else 
		{
			//no hay validacion efectiva y se redirige a login
			redirect('Acceso/index/2','refresh');
		}
		
	}
	public function panel()
	{

		if ($this->session->userdata('acceso')) 
		{
			if($this->session->userdata('tipo')=='admin')
			{

				redirect('Inicio/index','refresh');
			}
			else
			{
				redirect('Estudiante/index','refresh');
			}

		}
		else
		{
			redirect('Acceso/index/3','refresh');
		}

	}




	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Acceso/index/1','refresh');
	}

	public function pedidos()
	{
		
		$data['infomaterial']=$this->login_model->listaMaterial();

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('formularioPedido',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

}