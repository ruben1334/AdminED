<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Material extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('tipo')=='admin'||'directorio')
		{
	    $listaMaterial=$this->material_model->listaMaterial(2,0);
		$data['material']=$listaMaterial;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Materiales/listaMaterial',$data);
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
		$listaMaterial=$this->material_model->listaMaterial();
		$data['material']=$listaMaterial;

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
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Materiales/formularioMaterial');
	    $this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
		
	
	}

	public function agregarbd()
	{
		$idMaterial=$_POST['idMaterial'];
		$data['nombreMaterial']=$_POST['nombreMaterial'];
		$data['stock']=$_POST['stock'];
		$data['unidadMedida']=$_POST['unidadMedida'];
		$data['descripcion']=$_POST['descripcion'];

		$nombrearchivo=$idMaterial.".jpg";
		$config['upload_path']='./uploads/materiales';
		$config['file_name']=$nombrearchivo;
		$direccion="./uploads/materiales".$nombrearchivo;
		if (file_exists($direccion)) {
			unlink($direccion);
		}
		

		$config['allowed_types']='jpg|png|gif';
		$this->load->library('upload',$config);

		if (!$this->upload->do_upload()) {
			$data['error']=$this->upload->display_errors();
		}
		else {
			$data['imagen']=$nombrearchivo;
			$this->upload->data();
		}


		$formularioMaterial=$this->material_model->agregarmaterial($data);
		redirect('Material/index','refresh');
	
	}

	public function eliminarbd()
	{
		$idMaterial=$_POST['idMaterial'];
		$data['estado']='5';

		$this->material_model->modificarmaterial($idMaterial,$data);
		redirect('Material/index','refresh');
	}

	public function modificar()
	{
		$listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;
		$idMaterial=$_POST['idMaterial'];
		$data['infomaterial']=$this->material_model->recuperarmaterial($idMaterial);
		
		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Estudiantes/formulariomodificarEstudiante',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{   
	
			$data['nombreMaterial']=$_POST['nombreMaterial'];
		$data['stock']=$_POST['stock'];
		$data['unidadMedida']=$_POST['unidadMedida'];
		$data['descripcion']=$_POST['descripcion'];    
	
        $nombrearchivo=$idMaterial.".jpg";
		$config['upload_path']='./uploads/materiales';
		$config['file_name']=$nombrearchivo;
		$direccion="./uploads/materiales".$nombrearchivo;
		if (file_exists($direccion)) {
			unlink($direccion);
		}
		

		$config['allowed_types']='jpg|png|gif';
		$this->load->library('upload',$config);

		if (!$this->upload->do_upload()) {
			
			$data['error']=$this->upload->display_errors();

			
		}
		else {
			$data['imagen']=$nombrearchivo;
			$this->upload->data();
		}

		$this->material_model->modificarmaterial($idMaterial,$data);
		redirect('Material/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idEstudiante=$_POST['idEstudiante'];
		$data['estado']='0';

		$this->estudiante_model->modificarestudiante($idEstudiante,$data);
		redirect('Estudiante/index','refresh');
	
	}
	
	public function deshabilitados()
	{
		$listaEstudiantes=$this->estudiante_model->listaEstudiantesdeshabilitados();
		$data['estudiante']=$listaEstudiantes;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Estudiantes/listaEstudiantesdeshabilitados',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function habilitarbd()
	{
		$idEstudiante=$_POST['idEstudiante'];
		$data['estado']='1';

		$this->estudiante_model->modificarestudiante($idEstudiante,$data);
		redirect('Estudiante/deshabilitados','refresh');
	
	}
}
