<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Clases extends CI_Controller {

	public function index()
	{
		

	if($this->session->userdata('tipo')=='admin'||'directorio')
		{
        $listaUsuarios=$this->usuario_model->listaUsuarios();
		$data['usuario']=$listaUsuarios;
		$listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Clases/listaClases',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
        }
else
		{
			redirect('Acceso/panel','refresh');
		}

	
	}


	public function listaxlsx()
	{
		$lista=$this->clase_model->listaClases();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaClases.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre de la Clase');
		
		$sn=2;
			foreach ($lista as $row) {
			$sheet->setCellValue('A'.$sn,$row->idClase);
			$sheet->setCellValue('B'.$sn,$row->nombreClase);
			
			$sn++; 
			}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function agregar()
	{
		$listaUsuarios=$this->usuario_model->listaUsuarios();
		$data['usuario']=$listaUsuarios;
		$listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Clases/formularioClases',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{
		$data['nombreClase']=$_POST['nombreClase'];
		
		
		$listaClases=$this->clase_model->agregarclases($data);
		redirect('Clases/index','refresh');
	}

	public function eliminarbd()
	{
		//$idClase=$_POST['idClase'];
		//$this->clase_model->eliminarclase($idClase);
		//redirect('Clases/index','refresh');

		$idClase=$_POST['idClase'];
		$data['habilitado']='5';
	    $data['estado']='5';
     
    
		$this->clase_model->modificarclases($idClase,$data);
		redirect('Clases/index','refresh');
	}

	public function modificar()
	{
		$idClase=$_POST['idClase'];
		$data['infoClase']=$this->clase_model->recuperarclases($idClase);
		
		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Clases/formularioClasesModificar',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{
		$idClase=$_POST['idClase'];
		$data['nombreClase']=$_POST['nombreClase'];
		

		$this->clase_model->modificarclases($idClase,$data);
		redirect('Clases/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idClase=$_POST['idClase'];
		$data['habilitado']='2';

     
    
		$this->clase_model->modificarclases($idClase,$data);
		redirect('Clases/index','refresh');
	
	}	public function deshabilitarClasebd()
	{
		$idClase=$_POST['idClase'];
		$data['habilitado']='2';

     
    
		$this->clase_model->modificarclases($idClase,$data);
		redirect('Clases/index','refresh');
	
	}


	
	public function deshabilitados()
	{
		$listaClases=$this->clase_model->ListaClasesdeshabilitados();
		$data['clase']=$listaClases;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Clases/listaClasesDeshabilitados',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}
	
	public function habilitarbd()
	{
		$idClase=$_POST['idClase'];
		$data['habilitado']='3';

		$this->clase_model->modificarclases($idClase,$data);
		redirect('Clases/deshabilitados','refresh');
	
	}

	public function habilitarClasebd()
	{
		$idClase=$_POST['idClase'];
		$data['habilitado']='3';

		$this->clase_model->modificarclase($idClase,$data);
		redirect('Clases/deshabilitados','refresh');
	
	}

}
