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
		$listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;
		$listaUsuarios=$this->usuario_model->listaUsuarios();
		$data['usuario']=$listaUsuarios;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Estudiantes/listaEstudiantes',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}


		public function index2()
	{
		$listaEstudiantes=$this->estudiante_model->listaEstudiantesClase();
		$data['estudiante']=$listaEstudiantes;
        //$listaEstudiantes = $listaEstudiantes->result();
		$data['estudiante']=$listaEstudiantes;
		$listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;
		$listaUsuarios=$this->usuario_model->listaUsuarios();
		$data['usuario']=$listaUsuarios;



		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Estudiantes/listaEstudiantesClase',$data);
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
		$sheet->setCellValue('B1', 'Nombres');
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
	    $listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;
		$listaEstudiantes=$this->estudiante_model->listaEstudiantes();
		$data['estudiante']=$listaEstudiantes;
		$listaUsuarios=$this->usuario_model->listaUsuarios();
		$data['usuario']=$listaUsuarios;
      

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Estudiantes/formularioEstudiante',$data);
        $this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
		
	
	}

	public function agregarbd()
	{
		$idUsuario=$_POST['idUsuario'];
        
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['bautizado']=$_POST['bautizado'];
        $data['padres']=$_POST['padres'];
        $data['NumeroReferencia']=$_POST['NumeroReferencia'];
        $data['idUsuario']=$_POST['idUsuario'];
        $data['idClase']=$_POST['idClase'];

      
        $nombrearchivo=$idUsuario.".jpg";
		$config['upload_path']='./fotos/estudiantes';
		$config['file_name']=$nombrearchivo;
		$direccion="./fotos/estudiantes".$nombrearchivo;
		if (file_exists($direccion)) {
			unlink($direccion);
		}
		

		$config['allowed_types']='jpg|png|gif';
		$this->load->library('upload',$config);

		if (!$this->upload->do_upload()) {
			$data['error']=$this->upload->display_errors();
			
		}
		else {
			$data['foto']=$nombrearchivo;
			$this->upload->data();
		}


		

		$listaEstudiantes=$this->estudiante_model->agregarestudiante($data);
		redirect('Estudiante/index','refresh');
	}

	public function eliminarbd()
	{
		$idEstudiante=$_POST['idEstudiante'];
		$data['estado']='5';

		$this->estudiante_model->modificarestudiante($idEstudiante,$data);
		redirect('Estudiante/index','refresh');
	}

	public function modificar()
	{
		$listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;
		$idEstudiante=$_POST['idEstudiante'];
		$data['infoestudiante']=$this->estudiante_model->recuperarestudiante($idEstudiante);
		
		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Estudiantes/formulariomodificarEstudiante',$data);
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
		$config['upload_path']='./fotos/estudiantes';
		$config['file_name']=$nombrearchivo;
		$direccion="./fotos/estudiantes/".$nombrearchivo;
		if (file_exists($direccion)) {
			unlink($direccion);
		}
		

		$config['allowed_types']='jpg|png|gif';
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
