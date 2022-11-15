<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    require_once APPPATH."/third_party/fpdf/fpdf.php";
    class Pdf extends FPDF {		
		
        public function Header(){
            //si se requiere agregar una imagen
           //$ruta=base_url().'uploads/logo1.png';
            //$this->Image($ruta,0,0,150,300);

          $ruta=base_url().'uploads/marco2.jpg';
          $this->Image($ruta,0,0,210,300);
            $this->SetFont('Arial','B',10);
            $this->Cell(30);
            //$this->Cell(120,10,'TITULO CABECERA',0,0,'C');

            $this->Ln('5');
       }

	   public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',7);
           $this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
      }
}
?>