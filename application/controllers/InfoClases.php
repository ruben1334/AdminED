<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class InfoClases extends CI_Controller {

	public function index()
	{
		

	if($this->session->userdata('tipo')=='maestro'||'admin'||'directorio')
		{
        $listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;
		$listaInfoClases=$this->infoclase_model->listaInfoclases();
		$data['infoClase']=$listaInfoClases;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Clases/listaInfoClases',$data);
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
		$lista=$this->infoclase_model->listaInfoClases();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaClases.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Clase');
		$sheet->setCellValue('C1', 'Cantidad de Asistencia');
		$sheet->setCellValue('D1', 'Cantidad de Biblias');
		$sheet->setCellValue('E1', 'Cantidad de Nuevos');
		$sheet->setCellValue('F1', 'Cantidad de Ofrenda');

		
		$sn=2;
			foreach ($lista as $row) {
			$sheet->setCellValue('A'.$sn,$row->idClase);
			$sheet->setCellValue('B'.$sn,$row->nombreClase);
			$sheet->setCellValue('C'.$sn,$row->cantAsistencia);
			$sheet->setCellValue('D'.$sn,$row->cantBiblia);
			$sheet->setCellValue('E'.$sn,$row->cantNuevos);
			$sheet->setCellValue('F'.$sn,$row->cantOfrenda);
			
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
		$listaInfoClases=$this->infoclase_model->listaInfoClases();
		$data['infoClase']=$listaInfoClases;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Clases/formularioInfoClases',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{
		$data['nombreClase']=$_POST['nombreClase'];
		$data['cantAsistencia']=$_POST['cantAsistencia'];
		$data['cantBiblia']=$_POST['cantBiblia'];
		$data['cantNuevos']=$_POST['cantNuevos'];
		$data['cantOfrenda']=$_POST['cantOfrenda'];
		$data['gestion']=$_POST['gestion'];
		$data['idUsuario']=$_POST['idUsuario'];
		
		$listaInfoClases=$this->infoclase_model->agregarInfoclases($data);
		redirect('InfoClases/index','refresh');
	}

	public function eliminarbd()
	{
		$idClase=$_POST['idClase'];
		$this->infoclase_model->eliminarclase($idClase);
		redirect('InfoClases/index','refresh');
	}

	public function modificar()
	{
		$idClase=$_POST['idClase'];
		$data['infoClased']=$this->infoclase_model->recuperarInfoclases($idClase);
		
		$this->load->view('inc/headersbadmin');
		$this->load->view('Clases/formularioInfoClasesModificar',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{
		$idClase=$_POST['idClase'];
		$data['nombreClase']=$_POST['nombreClase'];
		$data['cantAsistencia']=$_POST['cantAsistencia'];
		$data['cantBiblia']=$_POST['cantBiblia'];
		$data['cantNuevos']=$_POST['cantNuevos'];
		$data['cantOfrenda']=$_POST['cantOfrenda'];
		$data['gestion']=$_POST['gestion'];

		

		$this->infoclase_model->modificarInfoclases($idClase,$data);
		redirect('InfoClases/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idClase=$_POST['idClase'];
		$data['estado']='0';

     
		$this->infoclase_model->modificarInfoclases($idClase,$data);
		redirect('InfoClases/index','refresh');
	
	}


	
	public function deshabilitados()
	{
		$listaClases=$this->infoclase_model->listaInfoClasesdeshabilitados();
		$data['infoClased']=$listaClases;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Clases/listaInfoClasesDeshabilitados',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function habilitarbd()
	{
		$idClase=$_POST['idClase'];
		$data['estado']='1';

		$this->infoclase_model->modificarInfoclases($idClase,$data);
		redirect('InfoClases/deshabilitados','refresh');
	
	}

}
