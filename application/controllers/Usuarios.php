<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Usuarios extends CI_Controller {

	public function index()
	{
		

	if($this->session->userdata('tipo')=='admin')
		{

		$listaUsuarios=$this->usuario_model->listaUsuarios();
		$data['usuario']=$listaUsuarios;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Usuarios/listaUsuarios',$data);
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
		$lista=$this->usuario_model->listaUsuarios();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaUsuarios.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre');
		$sheet->setCellValue('C1', 'Primer Apellido');
		$sheet->setCellValue('D1', 'Segundo Apellido ');
		$sheet->setCellValue('G1', 'Cédula de Identidad');
		$sheet->setCellValue('E1', 'Fecha nacimiento');
		$sheet->setCellValue('F1', 'Bautizado');
		$sheet->setCellValue('H1', 'Telefono');

		$sn=2;
			foreach ($lista as $row) {
			$sheet->setCellValue('A'.$sn,$row->idUsuario);
			$sheet->setCellValue('B'.$sn,$row->nombre);
			$sheet->setCellValue('C'.$sn,$row->primerApellido);
			$sheet->setCellValue('D'.$sn,$row->segundoApellido);
			$sheet->setCellValue('G'.$sn,$row->ci);
			$sheet->setCellValue('E'.$sn,$row->fechaNacimiento);
			$sheet->setCellValue('F'.$sn,$row->bautizado);
			$sheet->setCellValue('H'.$sn,$row->telefono);
			$sn++; 
			}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function agregar()
	{
		$listaUsuarios=$this->usuario_model->listaUsuarios();
		$data['usuario']=$listaUsuarios;
        $password=md5('password'); 
		$this->load->view('inc/headersbadmin');
		$this->load->view('Usuarios/formularioUsuario');
		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['login']=$_POST['login'];
		$data['password']=$_POST['password'];
		$data['tipo']=$_POST['tipo'];
   $idUsuario;
		$nombrearchivo=$idUsuario.".jpg";
		$config['upload_path']='./fotos/usuarios';
		$config['file_name']=$nombrearchivo;
		$direccion="./fotos/usuarios/".$nombrearchivo;
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


		
		$listaUsuarios=$this->usuario_model->agregarUsuario($data);
		redirect('Usuarios/index','refresh');
	}

	public function eliminarbd()
	{
		
		$idUsuario=$_POST['idUsuario'];
		$data['habilitado']='5';
		$data['estado']='5';
		$this->usuario_model->modificarusuario($idUsuario,$data);
		redirect('Usuarios/index','refresh');
	}

	public function modificar()
	{

		$idUsuario=$_POST['idUsuario'];
		$data['infousuario']=$this->usuario_model->recuperarusuario($idUsuario);
		
		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Usuarios/formularioModificarUsuario',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['acceso']=$_POST['acceso'];
		$data['password']=$_POST['password'];
		$data['tipo']=$_POST['tipo'];
		 


		$this->usuario_model->modificarusuario($idUsuario,$data);
		redirect('Usuarios/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['habilitado']='2';

		$this->usuario_model->modificarusuario($idUsuario,$data);
		redirect('Usuarios/index','refresh');
	
	}
	
	public function deshabilitados()
	{
		$listaUsuarios=$this->usuario_model->listaUsuariodeshabilitados();
		$data['usuario']=$listaUsuarios;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Usuarios/listaUsuariodeshabilitados',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function habilitarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['habilitado']='3';

		$this->usuario_model->modificarusuario($idUsuario,$data);
		redirect('Usuarios/index','refresh');
	
	}

	
}
