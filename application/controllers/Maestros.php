<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//PDF

//EXCEL
require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Maestros extends CI_Controller {

	public function index()
	{
		

	if($this->session->userdata('tipo')=='admin'||'directorio')
		{
        $listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;
		$listaMaestros=$this->maestro_model->listaMaestros();
		$data['maestro']=$listaMaestros;
		$listaMaestross=$this->maestro_model-> MaestrosSelect();
		$data['maestros']=$listaMaestross;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Maestros/listaMaestros',$data);
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
		$lista=$this->maestro_model->listaMaestros();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaMaestros.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre');
		$sheet->setCellValue('C1', 'Primer Apellido');
		$sheet->setCellValue('D1', 'Segundo Apellido ');
		$sheet->setCellValue('G1', 'Cédula de Identidad');
		$sheet->setCellValue('E1', 'Fecha nacimiento');
		$sheet->setCellValue('F1', 'Bautizado');
		$sheet->setCellValue('H1', 'Teléfono');
		$sheet->setCellValue('I1', 'Encargado de Clase');

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
			$sheet->setCellValue('I'.$sn,$row->clase);
			$sn++; 
			}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}


        

public function listapdf()
{




    $this->pdf=new Pdf();
    $this->pdf->AddPage();
    $this->pdf->AliasNbPages();
    $this->pdf->SetTitle("Lista de Maestros");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(210,210,210);
        $this->pdf->SetFont('Arial','B,11');
        $this->pdf->Cell(30);
        $this->pdf->Cell(120,10,'LISTA MAESTROS',0,0,'C',1);
        $this->pdf->Ln(20);


         
        $this->pdf->Cell("10,5,#,'TBLR',0,'L',0");
        $this->pdf->Cell("50,5,NOMBRE,'TBLR',0,'l',0");
        $this->pdf->Cell("30,5,PRIMER APELLIDO,'TBLR',0,'l',0");
        $this->pdf->Cell("30,5,SEGUNDO APELLIDO,'TBLR',0,'l',0");
        $this->pdf->Cell("30,5,CARNET DE IDENTIDAD,'TBLR',0,'l',0");
      $this->pdf->Cell("30,5,FECHA DE NACIMIENTO,'TBLR',0,'l',0");
        $this->pdf->Cell("30,5,ES BAUTIZADO...,'TBLR',0,'l',0");
       $this->pdf->Cell("30,5,TELEFONO,'TBLR',0,'l',0");
        
        //$num=1
        // foreach($lista as $row){
         	//$nombre=$row->nombre;
       
    // $primerApellido=$row->primerApellido;
    // $segundoApellido=$row->segundoApellido;
    // $ci=$row->ci;
     // $fechaNacimiento=$row->fechaNacimiento;
      //$bautizado=$row->bautizado
      //$telefono=$row->telefono

       //$this->pdf->Cell("10,5,$num,'TBLR',0,'L',0");
       //$this->pdf->Cell("50,5,$nombre,'TBLR',0,'l',0");
       //$this->pdf->Cell("30,5,$primerApellido,'TBLR',0,'l',0");
       //$this->pdf->Cell("30,5,$segundoApellido,'TBLR',0,'l',0");
        //$this->pdf->Cell("30,5,$ci,'TBLR',0,'l',0");
        //$this->pdf->Cell("30,5,$fechaNacimiento,'TBLR',0,'l',0");
        //$this->pdf->Cell("30,5,$bautizado,'TBLR',0,'l',0");
        //$this->pdf->Cell("30,5,$telefono,'TBLR',0,'l',0");
        //$this->pdf->Ln(5);
        //$num++; 	
         //}
          
        $this->pdf->Output("listaMaestros.pdf",'I');

   



    }













	public function agregar()
	{
		$listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;
		$listaMaestros=$this->maestro_model->listaMaestros();
		$data['maestro']=$listaMaestros;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Maestros/formularioMaestro',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
	    $data['ci']=$_POST['ci'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['bautizado']=$_POST['bautizado'];
		$data['telefono']=$_POST['telefono'];
		$data['tipo']=$_POST['tipo'];
		$data['aula']=$_POST['aula'];
		
 
      
		$nombrearchivo=$idUsuario.".jpg";
		$config['upload_path']='./fotos/usuarios/';
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


		
		$listaMaestros=$this->maestro_model->agregarmaestro($data);
		redirect('Maestros/index','refresh');
	}


		public function agregarmodalbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
	    $data['ci']=$_POST['ci'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['bautizado']=$_POST['bautizado'];
		$data['telefono']=$_POST['telefono'];
        $data['tipo']=$_POST['tipo'];
	    $data['aula']=$_POST['aula'];
      
		$nombrearchivo=$idUsuario.".jpg";
		$config['upload_path']='./fotos/usuarios/';
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


		
		$listaMaestros=$this->maestro_model->agregarmaestro($data);
		redirect('Pedido/agregar','refresh');
	}

	public function eliminarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['habilitado']='5';
		$data['estado']='5';
		$this->maestro_model->modificarmaestro($idUsuario,$data);
		redirect('Maestros/index','refresh');
	}

	public function modificar()
	{
		$listaClases=$this->clase_model->listaClases();
		$data['clase']=$listaClases;
		$idUsuario=$_POST['idUsuario'];
		$data['infomaestro']=$this->maestro_model->recuperarmaestro($idUsuario);
		
		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Maestros/formulariomodificarMaestro',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['ci']=$_POST['ci'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['bautizado']=$_POST['bautizado'];  
		$data['telefono']=$_POST['telefono'];
		$data['tipo']=$_POST['tipo'];
	    $data['aula']=$_POST['aula'];



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


		$this->maestro_model->modificarmaestro($idUsuario,$data);
		
		redirect('Maestros/index','refresh');
	}




	public function deshabilitarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['estado']='0';

		$this->maestro_model->modificarmaestro($idUsuario,$data);
		redirect('Maestros/index','refresh');
	
	}
	
	public function deshabilitados()
	{
		$listaMaestros=$this->maestro_model->listaMaestrosdeshabilitados();
		$data['maestro']=$listaMaestros;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('Maestros/listaMaestrosdeshabilitados',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function habilitarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['estado']='1';

		$this->maestro_model->modificarmaestro($idUsuario,$data);
		redirect('Maestros/deshabilitados','refresh');
	
	}

 public function recuperarMaestroRecibo($idMaestro){
        $this->db->select('*');
        return $this->db->get_where('maestro',array('idMaestro'=>$idMaestro))->row_array();
    }
	
}
