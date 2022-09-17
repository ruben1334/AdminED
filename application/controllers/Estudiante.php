<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Estudiante extends CI_Controller {

	public function index()
	{
		$listaEstudiantes=$this->estudiante_model->listaEstudiantes();
		$data['estudiante']=$listaEstudiantes;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('listaEstudiantes',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function listaxlsx()
	{
		$lista=$this->estudiante_model->listaEstudiantes();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaEstudiantes.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre');
		$sheet->setCellValue('C1', 'Primer Apellido');
		$sheet->setCellValue('D1', 'Segundo Apellido');
		$sheet->setCellValue('E1', 'Fecha nacimiento');
		$sheet->setCellValue('F1', 'Bautizado');
		$sheet->setCellValue('G1', 'Padres');
		$sheet->setCellValue('H1', 'Numero referencia');
		$sn=2;
			foreach ($lista as $row) {
			$sheet->setCellValue('A'.$sn,$row->idEstudiante); 
			$sheet->setCellValue('B'.$sn,$row->nombre);
			$sheet->setCellValue('C'.$sn,$row->primerApellido);
			$sheet->setCellValue('D'.$sn,$row->segundoApellido);
			$sheet->setCellValue('E'.$sn,$row->fechaNacimiento);
			$sheet->setCellValue('F'.$sn,$row->bautizado);
			$sheet->setCellValue('G'.$sn,$row->padres);
			$sheet->setCellValue('H'.$sn,$row->NumeroReferencia);
			$sn++; 
			}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function agregar()
	{
		$listaEstudiantes=$this->estudiante_model->listaEstudiantes();
		$data['estudiante']=$listaEstudiantes;

		$this->load->view('inc/headersbadmin');
		$this->load->view('formularioEstudiante');
		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{

		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['bautizado']=$_POST['bautizado'];
        $data['padres']=$_POST['padres'];
        $data['NumeroReferencia']=$_POST['NumeroReferencia'];

		$listaEstudiantes=$this->estudiante_model->agregarestudiante($data);
		redirect('Estudiante/index','refresh');
	}

	public function eliminarbd()
	{
		$idEstudiante=$_POST['idEstudiante'];
		$this->estudiante_model->eliminarestudiante($idEstudiante);
		redirect('Estudiante/index','refresh');
	}

	public function modificar()
	{
		$idEstudiante=$_POST['idEstudiante'];
		$data['infoestudiante']=$this->estudiante_model->recuperarestudiante($idEstudiante);
		
		$this->load->view('inc/headersbadmin');
		$this->load->view('formulariomodificarEstudiante',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{
		$idEstudiante=$_POST['idEstudiante'];
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['bautizado']=$_POST['bautizado'];
        $data['padres']=$_POST['padres'];
        $data['NumeroReferencia']=$_POST['NumeroReferencia'];

		$nombrearchivo=$idEstudiante.".jpg";
		$config['upload_path']='./uploads2';
		$config['file_name']=$nombrearchivo;
		$direccion="./uploads2/".$nombrearchivo;
		if (file_exists($direccion)) {
			unlink($direccion);
		}
		

		$config['allowed_types']='jpg';
		$this->load->library('upload',$config);

		if (!$this->upload->do_upload()) {
			$data['error']=$this->upload->display_errors();
		}
		else {
			$data['foto']=$nombrearchivo;
			$this->upload->data();
		}


		$this->estudiante_model->modificarestudiante($idEstudiante,$data);
		redirect('Estudiante/index','refresh');
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
		$this->load->view('listaEstudiantesdeshabilitados',$data);
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
