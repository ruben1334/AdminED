<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Material extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('rol')=='admin')
		{
		$listaMaterial=$this->material_model->listaMaterial();
		$data['material']=$listaMaterial;

		$this->load->view('inc/headerMaterial');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('listaMaterial',$data);
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
		$lista=$this->material_model->listaMaterial();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaMaterial.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre del Material');
		$sheet->setCellValue('C1', 'Stock');
		$sheet->setCellValue('D1', 'Unidad de Medida ');
		$sheet->setCellValue('E1', 'Descripción');
		$sn=2;
			foreach ($lista as $row) {
			$sheet->setCellValue('A'.$sn,$row->idMaterial);
			$sheet->setCellValue('B'.$sn,$row->nombreMaterial);
			$sheet->setCellValue('C'.$sn,$row->stock);
			$sheet->setCellValue('D'.$sn,$row->unidadMedida);
			$sheet->setCellValue('E'.$sn,$row->descripcion);
		$sn++; 
			}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function agregar()
	{
		$listaMaterial=$this->material_model->listaMaterial();
		$data['material']=$listaMaterial;


		$this->load->view('inc/headersbadmin');
		$this->load->view('formularioMaterial');
		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{
		$data['nombreMaterial']=$_POST['nombreMaterial'];
		$data['stock']=$_POST['stock'];
		$data['unidadMedida']=$_POST['unidadMedida'];
		$data['descripcion']=$_POST['descripcion'];
		$formularioMaterial=$this->material_model->agregarmaterial($data);
		redirect('Material/index','refresh');
	}

	public function eliminarbd()
	{
		$idMaterial=$_POST['idMaterial'];
		$this->material_model->eliminarmaterial($idMaterial);
		redirect('Material/index','refresh');
	}

public function modificar()
	{
		$idMaterial=$_POST['idMaterial'];
		$data['infomaterial']=$this->material_model->recuperarmaterial($idMaterial);
		$listaMaterial=$this->material_model->listaMaterial();
		$data['material']=$listaMaterial;


		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('formularioModificarMaterial',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{
		$idMaterial=$_POST['idMaterial'];
		$data['nombreMaterial']=$_POST['nombreMaterial'];
		$data['stock']=$_POST['stock'];
		$data['unidadMedida']=$_POST['unidadMedida'];
		$data['descripcion']=$_POST['descripcion'];    
	


		$this->material_model->modificarmaterial($idMaterial,$data);
		redirect('Material/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idMaterial=$_POST['idMaterial'];
		$data['estado']='0';

		$this->material_model->modificarmaterial($idMaterial,$data);
		redirect('Material/index','refresh');
	
	}
	
	public function deshabilitados()
	{
		$listaMaterial=$this->material_model->listaMaterialdeshabilitados();
		$data['material']=$listaMaterial;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('formularioMaterial',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function habilitarbd()
	{
		$idMaterial=$_POST['idMaterial'];
		$data['estado']='1';

		$this->material_model->modificarmaterial($idMaterial,$data);
		redirect('Material/deshabilitados','refresh');
	
	}
	
  }
