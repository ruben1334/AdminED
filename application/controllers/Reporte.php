<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reporte extends CI_Controller
{
 
  function __construct()
  {
      parent::__construct();

      require_once  APPPATH.'controllers/PDF_MC_Table.php';
  }
  
  public function index() {
  }

  public function pedidos() {
    $startDate = null; 
    $endDate = null;
    //$lista = $this->pedido_model->obtenerTodosPedidosPorFecha($startDate, $endDate);
   // $data['pedido'] = $lista;
    $lista = $this->pedidodetalle_model->listapedido();
    $data['pedido'] = $lista;
    $listaClases=$this->clase_model->listaClases();
    $data['clase']=$listaClases;

    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('Reportes/reporte_pedidoss', $data); 
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');
    
   
  }
  public function pedidosAnulados() {
    $startDate = null; 
    $endDate = null;
    $lista = $this->pedido_model->obtenerPedidosAnuladosPorFecha($startDate, $endDate);

    $data['pedido'] = $lista;
   
    
    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('reporte/reporte_ventasAnuladas', $data); 
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');
  }
  public function MaterialesMasSalidos() {
    $startDate = null; 
    $endDate = null;
    $lista = $this->pedido_model->obtenerMaterialesMasPedidosPorFecha($startDate, $endDate);

    $data['pedido'] = $lista;

    
    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('Reportes/reporte_MasSalidas', $data); 
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');
  }
  
public function Stock() {
    $startDate = null; 
    $endDate = null;
    $lista = $this->pedido_model->obtenerStock($startDate, $endDate);

    $data['pedido'] = $lista;

    
    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('reportes/reporte_Stock', $data); 
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');
  }

  public function MaestroSolicitantes() {
    $startDate = null; 
    $endDate = null;
    $lista = $this->pedido_model->obtenerMaestrosSolicitantes($startDate, $endDate);

    $data['pedido'] = $lista;

    
    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('reportes/reporte_Stock', $data); 
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');
  }

  public function buscarpedidoporfecha() {
    if ($_POST['startDate']!= null )
    {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $lista = $this->pedido_model->obtenerTodosPedidosPorFecha($startDate, $endDate);
        //Agregar lista de productos $this->detalleVenta_model->recuperarDetalleVentaProducto($idVenta);
        echo (json_encode($lista));
    } 
  }
  public function buscarpedidosanuladoporfecha() {
    if ($_POST['startDate']!= null )
    {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $lista = $this->pedido_model->obtenerPedidosAnuladosPorFecha($startDate, $endDate);
        //Agregar lista de productos $this->detalleVenta_model->recuperarDetalleVentaProducto($idVenta);
        echo (json_encode($lista));
    } 
  }

  public function buscarproductomaspedidoporfecha() {
    if ($_POST['startDate']!= null )
    {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $lista = $this->pedido_model->obtenerProductosMasVendidosPorFecha($startDate, $endDate);
        //Agregar lista de productos $this->detalleVenta_model->recuperarDetalleVentaProducto($idVenta);
        echo (json_encode($lista));
    } 
  }



   public function listaPdf()
  {
    //$data = $this->pedidodetalle_model-> recuperarTodoPedidoDetalle();
   
    $data = $this->pedido_model->getAllPedido();
    $this->pdf = new pdf();
    $this->pdf->AddPage();
    $this->pdf->AliasNbPages();
    $this->pdf->SetTitle("Lista General de Pedidos");
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(245, 245, 245);
    $this->pdf->SetXY(31, 11);
    $logo = base_url() . "uploads/logo1.png";
    $logo1 = base_url() . "uploads/logo3.png";
    $this->pdf->Image($logo, 40, 45, 25, 23);
    $this->pdf->Image($logo1, 148, 50, 25, 23);  
    $titulo   = ('Reporte General de Pedidos');
    $area = utf8_decode('Ministerio: Educación cristiana');
    $mensaje = utf8_decode('Director: Israel Condori');
    $direccion = utf8_decode("Iglesia: Nueva Vida");
    $x1        = 35;
    $y1        = 10;
    $this->pdf->SetXY($x1, $y1 +10);
    $this->pdf->SetFont('Arial', 'B', 20);
    $length = $this->pdf->GetStringWidth($titulo);
    $this->pdf->Cell($length, 20, $titulo);
    ///////
    $this->pdf->SetXY($x1, $y1 + 15);
    $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($area);
    $this->pdf->Cell($length, 20, $area);
    ///////
    $this->pdf->SetXY($x1, $y1 + 19);
    $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($mensaje);
    $this->pdf->Cell($length, 20, $mensaje);
    ///////

    $this->pdf->SetXY($x1, $y1 + 23);
    $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($direccion);
    $this->pdf->Cell($length, 20, $direccion);


    
    $this->pdf->SetFont('Arial', 'B', 8);
    $this->pdf->Cell(10);
    $this->pdf->Ln(5);
    $this->pdf->Cell(148, 3, utf8_decode('Fecha'), 0, 0, 'R');
    $this->pdf->Ln(5);
    $this->pdf->Cell(150, 3, date('d-m-Y'), 0, 0, 'R');
    $this->pdf->SetFont('Arial', 'B', 12);
    $this->pdf->Ln(15);
    $this->pdf->Cell(30);

    $this->pdf->Cell(120, 10, utf8_decode('REPORTE GENERAL DE PEDIDOS'), 0, 0, 'C');

    $this->pdf->Ln(20);

    $this->pdf->Cell(10, 5, utf8_decode("No."), 'TBLR', 0, 'L', 1);
    $this->pdf->Cell(50, 5, utf8_decode("NRO. COMPROBANTE"), 'TBLR', 0, 'L', 1);
   // $this->pdf->Cell(50, 5, utf8_decode("MATERIAL"), 'TBLR', 0, 'L', 1);
    $this->pdf->Cell(25, 5, utf8_decode("FECHA"), 'TBLR', 0, 'L', 1);
    $this->pdf->Cell(50, 5, utf8_decode("CANTIDAD (BS)"), 'TBLR', 0, 'C', 1);
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 12);
    $indice = 1;
    $totalPedido = 0;

    foreach ($data as $row) {
    
      $this->pdf->Cell(10, 5, utf8_decode($indice), 'TBLR', 0, 'L', 1);
      $this->pdf->Cell(50, 5, utf8_decode($row['nroComprobante']), 'TBLR', 0, 'L', 1);
     //$this->pdf->Cell(50, 5, utf8_decode($row['nombreMaterial']), 'TBLR', 0, 'L', 0);
      $this->pdf->Cell(25, 5, utf8_decode($row['fecha']), 'TBLR', 0, 'L', 1);
     $this->pdf->Cell(50, 5, utf8_decode($row['total']), 'TBLR', 0, 'C', 1);
      $this->pdf->Ln(5);
   $totalPedido += $row['total'];
      $indice++;
    }
    $this->pdf->Ln(5);
    $this->pdf->Cell(10, 5, utf8_decode(''), '', 0, 'L', 1);
    $this->pdf->Cell(40, 5, utf8_decode(''), '', 0, 'L', 1);
    $this->pdf->Cell(40, 5, utf8_decode(''), '', 0, 'L', 1);
    $this->pdf->Cell(50, 5, utf8_decode('Total General'), 'TBLR', 0, 'L', 1);
    $this->pdf->Cell(40, 5, utf8_decode($totalPedido . ' Bs.'), 'TBLR', 0, 'C', 1);

    $this->pdf->Output("listapedidos.pdf", "I");
  }

public function listaSalidasPdf()
  {
    //$data = $this->pedidodetalle_model-> recuperarTodoPedidoDetalle();
      
  $lista = $this->pedido_model->obtenerMaterialesMasPedidos();
 // echo (json_encode($lista));
    $this->pdf = new pdf();
    $this->pdf->AddPage();
    $this->pdf->AliasNbPages();
    $this->pdf->SetTitle("Lista de materiales mas pedidos");
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(245, 245, 245);
    $this->pdf->SetXY(31, 11);
    $logo = base_url() . "uploads/logo1.png";
    $logo1 = base_url() . "uploads/logo3.png";
    $this->pdf->Image($logo, 40, 45, 25, 23);
    $this->pdf->Image($logo1, 148, 50, 25, 23);  
    $titulo   = ('Reporte de materiales mas pedidos');
    $area = utf8_decode('Ministerio: Educación cristiana');
    $mensaje = utf8_decode('Director: Israel Condori');
    $direccion = utf8_decode("Iglesia: Nueva Vida");
    $x1        = 35;
    $y1        = 10;
    $this->pdf->SetXY($x1, $y1 +10);
    $this->pdf->SetFont('Arial', 'B', 20);
    $length = $this->pdf->GetStringWidth($titulo);
    $this->pdf->Cell($length, 20, $titulo);
    ///////
    $this->pdf->SetXY($x1, $y1 + 15);
    $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($area);
    $this->pdf->Cell($length, 20, $area);
    ///////
    $this->pdf->SetXY($x1, $y1 + 19);
    $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($mensaje);
    $this->pdf->Cell($length, 20, $mensaje);
    ///////

    $this->pdf->SetXY($x1, $y1 + 23);
    $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($direccion);
    $this->pdf->Cell($length, 20, $direccion);



 $this->pdf->Ln(50);
    $this->pdf->Cell(120, 5, utf8_decode('REPORTE DE MATERIALES MAS PEDIDOS'), 0, 0, 'C');

   
 $this->pdf->Ln(5);
    $this->pdf->Cell(10, 5, utf8_decode("No."), 'TBLR', 0, 'C', 1);
    $this->pdf->Cell(50, 5, utf8_decode("MATERIAL"), 'TBLR', 0, 'C', 1);
    $this->pdf->Cell(50, 5, utf8_decode("CANTIDAD  "), 'TBLR', 0, 'C', 1);
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 12);
    $indice = 1;
  

    foreach ($lista as $row) {
    
      $this->pdf->Cell(10, 5, utf8_decode($indice), 'TBLR', 0, 'L', 1);
      $this->pdf->Cell(50, 5, utf8_decode($row['nombreMaterial']), 'TBLR', 0, 'L', 1);
      $this->pdf->Cell(50, 5, utf8_decode($row['cantidad']), 'TBLR', 0, 'L', 1);
     
      $this->pdf->Ln(5);
  
      $indice++;
    }


    $this->pdf->Output("listaMaterialesMasPedidos.pdf", "I");
  }


 public function listaStockPdf()
  {
    //$data = $this->pedidodetalle_model-> recuperarTodoPedidoDetalle();
      
  $lista = $this->pedido_model->obtenerStock();
 // echo (json_encode($lista));
    $this->pdf = new pdf();
    $this->pdf->AddPage();
    $this->pdf->AliasNbPages();
    $this->pdf->SetTitle("Lista de stock  ");
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(245, 245, 245);
    $this->pdf->SetXY(31, 11);
    $logo = base_url() . "uploads/logo1.png";
    $logo1 = base_url() . "uploads/logo3.png";
    $this->pdf->Image($logo, 40, 45, 25, 23);
    $this->pdf->Image($logo1, 148, 50, 25, 23);  
    $titulo   = ('Reporte de stock');
    $area = utf8_decode('Ministerio: Educación cristiana');
    $mensaje = utf8_decode('Director: Israel Condori');
    $direccion = utf8_decode("Iglesia: Nueva Vida");
    $x1        = 35;
    $y1        = 10;
    $this->pdf->SetXY($x1, $y1 +10);
    $this->pdf->SetFont('Arial', 'B', 20);
    $length = $this->pdf->GetStringWidth($titulo);
    $this->pdf->Cell($length, 20, $titulo);
    ///////
    $this->pdf->SetXY($x1, $y1 + 15);
    $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($area);
    $this->pdf->Cell($length, 20, $area);
    ///////
    $this->pdf->SetXY($x1, $y1 + 19);
    $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($mensaje);
    $this->pdf->Cell($length, 20, $mensaje);
    ///////

    $this->pdf->SetXY($x1, $y1 + 23);
    $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($direccion);
    $this->pdf->Cell($length, 20, $direccion);



 $this->pdf->Ln(50);
    $this->pdf->Cell(120, 5, utf8_decode('REPORTE DE STOCK'), 0, 0, 'C');

   
 $this->pdf->Ln(5);
    $this->pdf->Cell(10, 5, utf8_decode("No."), 'TBLR', 0, 'C', 1);
    $this->pdf->Cell(50, 5, utf8_decode("MATERIAL"), 'TBLR', 0, 'C', 1);
    $this->pdf->Cell(50, 5, utf8_decode("CANTIDAD  "), 'TBLR', 0, 'C', 1);
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 12);
    $indice = 1;
  

    foreach ($lista as $row) {
    
      $this->pdf->Cell(10, 5, utf8_decode($indice), 'TBLR', 0, 'L', 1);
      $this->pdf->Cell(50, 5, utf8_decode($row['nombreMaterial']), 'TBLR', 0, 'L', 1);
      $this->pdf->Cell(50, 5, utf8_decode($row['stock']), 'TBLR', 0, 'L', 1);
     
      $this->pdf->Ln(5);
  
      $indice++;
    }


    $this->pdf->Output("listaStock.pdf", "I");
  }

}
