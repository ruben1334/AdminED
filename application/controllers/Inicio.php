<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Inicio extends CI_Controller {

	public function index()
	{
		

	if($this->session->userdata('tipo')=='admin'||'directorio')
		{

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('inicio');
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
        }
else
		{
			redirect('Acceso/panel','refresh');
		}

	
	}

}
	
