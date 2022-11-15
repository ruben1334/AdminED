<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {
	
	public function index()
	{
		
			$this->load->view('inc/headerRegistro');
			$this->load->view('registro',);
			$this->load->view('inc/footerLog');
		
	}

	public function registrar()
	{
		$listaEstudiantes=$this->estudiante_model->listaEstudiantes();
		$data['estudiante']=$listaEstudiantes;

		$this->load->view('inc/headerRegistro');
		$this->load->view('formularioEstudiante');
		$this->load->view('inc/footersbadmin');
	}
	
	public function resgitrarbd()
	{

		$data['nombres']=$_POST['nombres'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['bautizado']=$_POST['bautizado'];
        $data['padres']=$_POST['padres'];
        $data['NumeroReferencia']=$_POST['NumeroReferencia'];

		$listaEstudiantes=$this->estudiante_model->agregarestudiante($data);
		redirect('Estudiante/index','refresh');
	}


}