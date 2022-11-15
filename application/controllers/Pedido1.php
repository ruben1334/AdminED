<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pedido1 extends CI_Controller
{
 function __construct()
  {
    parent::__construct();

    require_once  APPPATH . 'controllers/PDF_MC_Table.php';
  }

  public function index()
  {

if($this->session->userdata('tipo')=='admin'||'directorio')
 {
  $lista = $this->pedidodetalle_model->listapedido();
    $data['pedido'] = $lista;
    $listaClases=$this->clase_model->listaClases();
    $data['clase']=$listaClases;

    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('Pedidos/pedido_lista', $data);
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');
 }
else
    {
      redirect('Acceso/panel','refresh');
    }


  
  }



   public function agregar()
  {
    $listaMaterial = $this->material_model->listaMaterial();
		$data['materiales'] = $listaMaterial;
    $data['maestro'] = $this->maestro_model->listarTodosMaestros();
    $data['material'] = $this->material_model->listarTodosMateriales();
    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('formularioPedido', $data);
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');
  }

  public function crearPedido()
  {

    if ($_POST['idMaestro'] != null) {
      
      $parametros = $this->datos();
      $idPedido = $this->pedido_model->crearPedidos($parametros);
      //Actualizar detalle de la pedido
      foreach ($_POST['idarticulo'] as $key => $id) {
        $cantidad = $_POST['cantidad'][$key];
         $nombreMaestro = $_POST['nombreMaestro'][$key];
        $precio_pedido = $_POST['precio_pedido'][$key];
        if ($cantidad > 0) {

          $paramsDetalle = array(
            'idPedido' => $idPedido,
            'idMaterial' => $id,
            'cantidad' => $cantidad,
            'precioUnitario' => $precio_pedido,
            'nombreMaestro' => $nombreMaestro
          );
          $this->pedidodetalle_model->crearDetallePedido($paramsDetalle);
          //Actualizar stock producto
          $infoMaterial = $this->material_model->recuperarmaterial($id);
          foreach ($infoMaterial->result() as $row) {
            $nuevoStock = $row->stock - $cantidad;
            $idMaterial = $row->idMaterial;
            $data['stock'] = $nuevoStock;
            $this->material_model->modificarmaterial($idMaterial, $data);
          }
        }
      }
      $this->notaDePedido($idPedido);
      //redirect('pedido/index', 'refresh');
    } 
    else {
      $this->agregar();
    }
    

  }


public function buscarMaestro()
  {

    $nombre = $this->input->post('nombre');
    $data['maestro'] = $this->maestro_model->recuperarMaestroPedido($nombre);
    $data['material'] = $this->material_model->listarTodosMateriales();
    $data['infoClase']=$this->clase_model->recuperarclase($idClase);

    print_r($data['maestro']);
    ///*
    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('Pedidos/pedido_agregar', $data);
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');



    //*/
  }

 function datos()
  {
    $params = array(
      'fecha' => $this->input->post('fecha'),
      'total' => $this->input->post('montoTotal'),
      'idUsuario' => $this->session->userdata("idusuario"),
      'idMaestro' => $this->input->post('idMaestro'),
      'nroComprobante' => $this->input->post('nroComprobante'),
    );
    return $params;
  }


  public function modificar()
  {
    $idPedido = $_POST['idPedido'];
    $data['infoPedido'] = $this->pedido_model->recuperarPedido($idPedido);

    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('pedido/pedido_modificar', $data);
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');
  }

  public function modificarPedido()
  {
    $idPedido = $_POST['idPedido'];
    $data['nombre'] = $_POST['nombre'];
    $data['descripcion'] = $_POST['descripcion'];
    $data['imagen'] = $_POST['imagen'];
    $data['idTipoPedido'] = $_POST['idTipoPedido'];

    $this->pedido_model->modificarPedido($idPedido, $data);
    redirect('pedido/index', 'refresh');
  }

  public function eliminarPedidoBd($idPedido, $estado)
  {
      /* $idPedido = $_POST['idPedido'] */;
    $this->pedido_model->eliminarPedido($idPedido, $estado);
    $this->pedido_model->eliminarDetallePedido($idPedido, $estado);

    redirect('pedido/index', 'refresh');
  }

  public function deshabilitarPedidoBd()
  {
    $idPedido = $_POST['idPedido'];
    $data['estado'] = '0';

    $this->pedido_model->modificarPedido($idPedido, $data);
    redirect('pedido/index', 'refresh');
  }
  public function habilitarPedidoBd()
  {
    $idPedido = $_POST['idPedido'];
    $data['estado'] = '1';

    $this->pedido_model->modificarPedido($idPedido, $data);
    redirect('pedido/deshabilitados', 'refresh');
  }

  public function Anulados()
  {
    $lista = $this->pedido_model->listaAnulados();
    $data['pedido'] = $lista;

    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('Pedidos/pedido_anulados', $data);
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');
  }

  public function generarRecibo()
  {
    $idPedido = $_POST['idPedido'];
    $data['infoPedido'] = $this->pedido_model->recuperarPedido($idPedido);

    $this->load->view('inc/headersbadmin');
    $this->load->view('inc/Sidebarsbadmin');
    $this->load->view('pedido/pedido_recibo', $data);
    $this->load->view('inc/creditos');
    $this->load->view('inc/footersbadmin');
  }

  public function notaDePedido($idPedido)
  {
  //  $data = $this->pedido_model->getNotaDePedido($idPedido);
  //  $maestro = $this->maestro_model->recuperarMaestroRecibo($data['idUsuario']);
  //  $pedidos = $this->pedido_model->getPedidos($data['idPedido']);
   //   $this->pdf = new PDF_MC_Table();
 $lista = $this->pedidodetalle_model-> recuperarPedidoDetalle($idPedido);
    $lista = $lista->result();

    $this->pdf = new Pdf();
    $this->pdf->AddPage();
    $this->pdf->AliasNbPages();
    $this->pdf->SetTitle("Lista pedidos");
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
   // $this->pdf->SetFont('Arial','B',11);
  //  $this->pdf->Cell(30);
   // $this->pdf->Cell(120,10,'LISTA PEDIDOS',0,0,'C',0);
 //   $this->pdf->Ln(50);
    //$this->pdf->Image(base_url().'uploads/logo1.png',20,20,30,20);
  //  $this->pdf->SetFillColor(210, 210, 210);
  // $this->pdf->SetMargins(8, 8, 8, 8);
   //$this->pdf->SetFont("Arial", "B", 10);
    //$this->pdf->Cell(15, 5, "#", 'TBLR', 0, "L", 0);
    //$this->pdf->Cell(50, 5, "NOMBRE DEL USUARIO", 'TBLR', 0, "C", 0);
    //$this->pdf->Cell(50, 5, "NOMBRE DEL MAESTRO", 'TBLR', 0, "C", 0);
   // $this->pdf->Cell(30, 5, "FECHA", 'TBLR', 0, "C", 0);
   // $this->pdf->Cell(50, 5, "NOMBRE DEL MATERIAL", 'TBLR', 0, "L", 0);
   // $this->pdf->Cell(30, 5, " CANTIDAD", 'TBLR', 1, "L", 0);
     

     $num=1;
     foreach ($lista as $row) {

             
    //   $nroComprobante=$row->nroComprobante;
      //$nombreUsuario=$row->nombreUsuario;
       $nombreMaestro=$row->nombreMaestro;
         $razonSocial=$row->razonSocial;
        $fecha=$row->fecha;
    //   $nombreMaterial=$row->nombreMaterial;
     //  $cantidad=$row->cantidad;

      
     //   $this->pdf->Cell(15, 5, $nroComprobante, 'TBLR', 0, "L", 0);
       //$this->pdf->Cell(50, 5, $nombreUsuario, 'TBLR', 0, "L", 0);
     //   $this->pdf->Cell(50, 5, $nombreMaestro, 'TBLR', 0, "L", 0);
       //$this->pdf->Cell(30, 5, $fecha, 'TBLR', 0, "L", 0);
     //   $this->pdf->Cell(50, 5, $nombreMaterial, 'TBLR', 0, "L", 0);
     //   $this->pdf->Cell(30, 5, $cantidad, 'TBLR', 1, "L", 0);
       
       $num++;
    
    }

    $this->pdf->Ln(90);
   // $this->pdf->SetFont("Arial", "B", 10);
   // $this->pdf->Cell(2, -8, ".............................................................................................", "C", 0);

   // $this->pdf->Cell(5, -0, "firma del maestro" , "C",0);

    $logo      = base_url() . "uploads/logo1.png";
    $logo1      = base_url() . "uploads/logo2.jpeg";
  //  $anulado   = base_url() . "fotos/anulado.png";
   $titulo   = ('Reporte de Pedidos');
    $area = utf8_decode('Ministerio: Educación cristiana');
    $mensaje = utf8_decode('Direcctor: Israel Condori');
    $direccion = utf8_decode("Iglesia: Nueva Vida");


    $x1        = 35;
    $y1        = 10;
    $this->pdf->Image($logo, 10, 55, 25, 23);
    $this->pdf->Image($logo1,146, 40, 40, 40);
    //if ($data['estado'] == 0) {
     // $this->pdf->Image($anulado, 60, 35, 90, 90);
    //}
    ///////////////////////// datos de la empresa ////////////////////////////////
    $this->pdf->SetXY($x1, $y1 +40);
    $this->pdf->SetFont('Arial', 'B', 20);
    $length = $this->pdf->GetStringWidth($titulo);
    $this->pdf->Cell($length, 20, $titulo);
    ///////
    $this->pdf->SetXY($x1, $y1 + 45);
   $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($area);
    $this->pdf->Cell($length, 20, $area);
    ///////
    $this->pdf->SetXY($x1, $y1 + 49);
   $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($mensaje);
    $this->pdf->Cell($length, 20, $mensaje);
    ///////

    $this->pdf->SetXY($x1, $y1 + 53);
    $this->pdf->SetFont('Arial', '', 10);
    $length = $this->pdf->GetStringWidth($direccion);
   $this->pdf->Cell($length, 20, $direccion);
    ///////////////////////// fin datos de la empresa //////////////////////////////
    ///////////////////////// datos del cliente //////////////////////////////////
    //Obtenemos los datos de la cabecera del pedido actual
   $r1   = 10;
    $r2   = $r1 + 68;
    $y1   = 40;
    $this->pdf->SetXY($r1, $y1+45);
    $this->pdf->SetFont("Arial", "B", 10);
    $this->pdf->MultiCell(60, 4, "Maestro:");
    $this->pdf->SetXY($r1, $y1 + 50);
    $this->pdf->SetFont("Arial", "", 10);
     $this->pdf->MultiCell(150, 4,utf8_decode($nombreMaestro=$row->nombreMaestro));
    //$this->pdf->MultiCell(150, 4, utf8_decode($maestro['nombreMaestro'] . ' ' . $maestro['primerApellido'] . ' ' . $maestro['segundoApellido']));
    $this->pdf->SetXY($r1, $y1 + 60);


    ///////////////////////// fin datos del maestro//////////////////////////////
    ///////////////////////// Inicio recibo y fecha  //////////////////////////////
    $r1 = 220 - 90;
   $r2 = $r1 + 68;
    $y1 = 6;
    $y2 = $y1 + 2;
    $this->pdf->SetFillColor(72, 209, 204);
    $this->pdf->SetXY($r1 + 1, $y1 + 20);
    $this->pdf->SetFont("Arial", "B", 10);
    $this->pdf->Cell($r2 - $r1 - 1, 5, 'NRO. RECIBO DE PEDIDO', 1, 3, "C");
    $this->pdf->Cell($r2 - $r1 - 1, 5, 'No. ' . $nroComprobante=$row->nroComprobante, 1, 2, "C");

    $this->pdf->Cell($r2 - $r1 - 1, 5, 'Fecha. ' . $fecha=$row->fecha, 0, 2, "C");
   // $this->pdf->Cell($r2 - $r1 - 1, 5, 'No. ' . $pedido['nroComprobante'], 1, 2, "C");
    $this->pdf->Ln(5);
    $this->pdf->SetXY($r1 + 1, $y1 + 50);
 //   $originalDate = $pedido['fecha'];
  //  $newDate = date("d/m/Y", strtotime($originalDate));
   // $this->pdf->Cell($r2 - $r1 - 1, 5, 'Fecha: ' . $newDate, 0, 0, "C");
    ///////////////////////// Fin recibo y fecha //////////////////////////////
    $this->pdf->Ln(55);

    //Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
    $this->pdf->SetFillColor(232, 232, 232);
    $this->pdf->SetFont('Arial', 'B', 10);
    $this->pdf->Cell(10, 6, utf8_decode('Nº'), 1, 0, 'L', 1);
     $this->pdf->Cell(40, 6, utf8_decode('DESTINADO AL AULA'), 1, 0, 'L', 1);
    $this->pdf->Cell(50, 6, utf8_decode('NOMBRE DEL MATERIAL'), 1, 0, 'L', 1);
    $this->pdf->Cell(20, 6, utf8_decode('CANTIDAD'), 1, 0, 'L', 1);
   

    $this->pdf->Ln(6);
    //Comenzamos a crear las filas de los registros según la consulta mysql
  //$detalle = $this->pedidodetalle_model->recuperarPedidoDetalle($idPedido);
               
    //Table with rows and columns
    //$this->pdf->SetWidths(array(10, 30, 85, 20, 20, 20));
    //Obtenemos todos los detalles de la pedido actual
   // $numero = 1;
   // $total  = 0;
    //foreach ($detalle as $row) {

      //$nombreMaterial      = $row['nombreMaterial'];
   //$cantidad      = $row['cantidad'];


     //$this->pdf->SetFont('Arial', '', 10);
    //}


    $num=1;
    foreach ($lista as $row) {
      
$nombreMaestro=$row->nombreMaestro;
//$nroComprobante=$row->nroComprobante;
$nombreMaterial=$row->nombreMaterial;
 $razonSocial=$row->razonSocial;
      $cantidad=$row->cantidad;
 $this->pdf->Cell(10, 6, $num,1,0,'L', 1);
 $this->pdf->Cell(40, 6, $razonSocial,1,0,'L', 1);
 $this->pdf->Cell(50, 6, $nombreMaterial,1,0,'L', 1);
$this->pdf->Cell(20, 6, $cantidad,1,1,'L', 1);
$num++;
 }

     $this->pdf->Ln(100);


     $this->pdf->SetFont("Arial", "B", 10);
     $this->pdf->Cell(42, -10, "", "C", -1);
     $this->pdf->Cell(32, -9, ".............................................................................................", "C", -1);

     $this->pdf->Cell(0, -0, "firma del maestro", "R",-1);



    $this->pdf->Output("NotaPedido.pdf", "I");
  }


  public function notaDePe()
  {
    $lista = $this->maestro_model->listaMaestros();
    $lista = $lista->result();

    $this->load->library('fpdf');


    $pdf = new FPDF("L", "mm", "A4");
    $this->fpdf->setAuthor('Ruben');
    $this->fpdf->SetTitle('Lista de Pedidos');
    $this->fpdf->AliasNbPages('(np)');
    $this->fpdf->SetAutoPageBreak(false);
    $this->fpdf->SetMargins(8, 8, 8, 8);
    $this->fpdf->SetFont('Arial', 'B', '15');
    $this->fpdf->Ln(4);
    $this->fpdf->Cell(95, 10, '', 0, 0, "L");
    //$this->fpdf->SetTextColor (0,0,255);






    $this->fpdf->Cell(2, -6, "LISTA DE PEDIDOS", 0, 0, "C");
    $this->fpdf->Ln(20);
    $this->fpdf->SetFillColor(210, 210, 210);
    $this->fpdf->SetMargins(100, 8, 8, 8);
    $this->fpdf->SetFont("Arial", "B", 10);
    $this->fpdf->Cell(5, 5, "#", 'TBLR', 0, "C", 0);
    $this->fpdf->Cell(50, 5, "NOMBRE DEL MATERIAL", 'TBLR', 0, "C", 0);
    $this->fpdf->Cell(50, 5, " CANTIDAD", 'TBLR', 0, "C", 0);




    $this->fpdf->Ln(100);


    $this->fpdf->SetFont("Arial", "B", 10);
    $this->fpdf->Cell(2, -8, ".............................................................................................", 0, 0, "C", 0);

    $this->fpdf->Cell(5, -0, "firma del maestros", 0, 0, "C");

    //   $num=1
    //   foreach ($lista as $row) {
    //    $nombre=$row->nombre;
    //     $primerApellido=$row->primerApellido;
    //    $segundoApellido=$row->segundoApellido;
    //     $ci=$row->ci;
    //     $fechaNacimiento=$row->fechaNacimiento;
    //    $bautizado=$row->bautizado
    //     $telefono=$row->telefono

    //   $this->fpdf->Cell(5,5,"$num",'TBLR',0,'L',0);
    //   $this->fpdf->Cell(35,5,"$nombre",'TBLR',0,'L',0);
    //  $this->fpdf->Cell(28,5,"$primerApellido",'TBLR',0,'L',0);
    //  $this->fpdf->Cell(30,5,"$segundoApellido",'TBLR',0,'L',0);
    //  $this->fpdf->Cell(30,5,"$ci",'TBLR',0,'l',0);
    // $this->fpdf->Cell(30,5,"$fechaNacimiento",'TBLR',0,'L',0);
    //  $this->fpdf->Cell(22,5,"$bautizado",'TBLR',0,'L',0);
    //$this->fpdf->Cell(15,5,"$telefono",'TBLR',0,'L',0);
    // $this->fpdf->Ln(5);
    // // }





    echo $this->fpdf->Output('Maestros.pdf', 'I');
  }




  public function reportePedidos()
  {
    $data = $this->pedido_model->getAllPedido();
    $this->pdf = new \FPDF();
    $this->pdf->AddPage();
    $this->pdf->AliasNbPages();
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(300, 300, 300);
    $this->pdf->SetXY(31, 11);
    $logo = base_url() . "uploads/logo1.png";
    $this->pdf->Image($logo, 15, 5, 25, 23);
    $this->pdf->SetFont('Arial', 'B', 8);
    $this->pdf->Cell(5);
    $this->pdf->Cell(160, 3, utf8_decode('MACETAS PACHA'), 0, 0, 'R');
    $this->pdf->Ln(5);
    $this->pdf->Cell(182, 3, date('d-m-Y'), 0, 0, 'R');
    $this->pdf->SetFont('Arial', 'B', 12);
    $this->pdf->Ln(15);
    $this->pdf->Cell(30);
    $this->pdf->Cell(120, 10, utf8_decode('LISTA DE PEDIDOS'), 0, 0, 'C');

    $this->pdf->Ln(10);

    $this->pdf->Cell(10, 5, utf8_decode("No."), 'TBLR', 0, 'L', 1);
    $this->pdf->Cell(40, 5, utf8_decode("NÚMERO"), 'TBLR', 0, 'L', 1);
    $this->pdf->Cell(50, 5, utf8_decode("FECHA"), 'TBLR', 0, 'L', 1);
    $this->pdf->Cell(40, 5, utf8_decode("CANTIDAD DE PEDIDOS"), 'TBLR', 0, 'C', 1);
    $this->pdf->Ln(5);
    $this->pdf->SetFont('Arial', '', 12);
    $indice = 1;
    $totalPedido = 0;
    foreach ($data as $row) {
      $this->pdf->Cell(10, 5, utf8_decode($indice), 'TBLR', 0, 'L', 0);
      $this->pdf->Cell(40, 5, utf8_decode($row['num_comprobante']), 'TBLR', 0, 'L', 0);
      $this->pdf->Cell(50, 5, utf8_decode($row['fecha_hora']), 'TBLR', 0, 'L', 1);
      $this->pdf->Cell(40, 5, utf8_decode($row['cantidad_pedido']), 'TBLR', 0, 'C', 1);
      $this->pdf->Ln(5);
      $totalPedido += $row['cantidad_pedido'];
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

  public function generarReporte()
  {
    $de = $this->input->post('de');
    $hasta = $this->input->post('hasta');
    if ($de > $hasta) {
      $data['mensaje'] = "La fecha de no puede ser mayor a la fecha hasta";
      $this->load->view('layout/header');
      $this->load->view('pedidos/reporte', $data);
      $this->load->view('layout/footer');
    } else {
      $data = $this->pedidomaterial_model->generarReporte($de, $hasta);

      $this->pdf = new \FPDF();
      $this->pdf->AddPage();
      $this->pdf->AliasNbPages();
      $this->pdf->SetLeftMargin(15);
      $this->pdf->SetRightMargin(15);
      $this->pdf->SetFillColor(300, 300, 300);
      $this->pdf->SetXY(31, 11);
      $logo = base_url() . "uploads/logo1.png";
      $this->pdf->Image($logo, 15, 5, 25, 23);
      $this->pdf->SetFont('Arial', 'B', 8);
      $this->pdf->Cell(5);
      $this->pdf->Cell(160, 3, utf8_decode('MACETAS PACHA'), 0, 0, 'R');
      $this->pdf->Ln(5);
      $this->pdf->Cell(182, 3, date('d-m-Y'), 0, 0, 'R');
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->Ln(15);
      $this->pdf->Cell(30);
      $this->pdf->Cell(120, 10, utf8_decode('LISTA DE PEDIDOS DEL ' . $de . ' AL ' . $hasta), 0, 0, 'C');

      $this->pdf->Ln(10);

      $this->pdf->Cell(10, 5, utf8_decode("No."), 'TBLR', 0, 'L', 1);
      $this->pdf->Cell(80, 5, utf8_decode("NOTA DE pedido"), 'TBLR', 0, 'L', 1);
      $this->pdf->Cell(50, 5, utf8_decode("FECHA"), 'TBLR', 0, 'L', 1);
      $this->pdf->Cell(40, 5, utf8_decode("CANTIDAD"), 'TBLR', 0, 'C', 1);
      $this->pdf->Ln(5);
      $this->pdf->SetFont('Arial', '', 12);
      $indice = 1;
      $totalPedido = 0;
      foreach ($data as $row) {
        $this->pdf->Cell(10, 5, utf8_decode($indice), 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(80, 5, utf8_decode($row['serie_comprobante'] . '-' . $row['num_comprobante']), 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(50, 5, utf8_decode($row['fecha_hora']), 'TBLR', 0, 'L', 1);
        $this->pdf->Cell(40, 5, utf8_decode($row['cantidad_pedido']), 'TBLR', 0, 'C', 1);
        $this->pdf->Ln(5);
        $totalPedido += $row['cantidad_pedido'];
        $indice++;
      }
      $this->pdf->Ln(5);
      $this->pdf->Cell(10, 5, utf8_decode(''), '', 0, 'L', 1);
      $this->pdf->Cell(40, 5, utf8_decode(''), '', 0, 'L', 1);
      $this->pdf->Cell(40, 5, utf8_decode(''), '', 0, 'L', 1);
      $this->pdf->Cell(50, 5, utf8_decode('Total General'), 'TBLR', 0, 'L', 1);
      $this->pdf->Cell(40, 5, utf8_decode($totalPedido . ' Bs.'), 'TBLR', 0, 'C', 1);

      $this->pdf->Output("PedidosPorfechas.pdf", "I");
    }
  }






	public function listaxlsx()
	{
		$lista = $this->pedido1_model->listaPedidos();
		$lista = $lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaPedidos.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre Del Material');
		$sheet->setCellValue('C1', 'Cantidad');
		$sheet->setCellValue('D1', 'Razon Social');
		$sheet->setCellValue('E1', 'Fecha');

		$sn = 2;
		foreach ($lista as $row) {
			$sheet->setCellValue('A' . $sn, $row->idPedidoMaterial);
			$sheet->setCellValue('B' . $sn, $row->nombreMaterial);
			$sheet->setCellValue('C' . $sn, $row->cantidad);
			$sheet->setCellValue('D' . $sn, $row->razonSocial);
			$sheet->setCellValue('E' . $sn, $row->fecha);

			$sn++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}




	public function listapdf()
	{
		$lista = $this->maestro_model->listaMaestros();
		$lista = $lista->result();

		$this->load->library('fpdf');


		$pdf = new FPDF("L", "mm", "A4");
		$this->fpdf->setAuthor('Ruben');
		$this->fpdf->SetTitle('Lista de Pedidos');
		$this->fpdf->AliasNbPages('(np)');
		$this->fpdf->SetAutoPageBreak(false);
		$this->fpdf->SetMargins(8, 8, 8, 8);
		$this->fpdf->SetFont('Arial', 'B', '15');
		$this->fpdf->Ln(4);
		$this->fpdf->Cell(95, 10, '', 0, 0, "L");
		//$this->fpdf->SetTextColor (0,0,255);






		$this->fpdf->Cell(2, -6, "LISTA DE PEDIDOS", 0, 0, "C");
		$this->fpdf->Ln(20);
		$this->fpdf->SetFillColor(210, 210, 210);
		$this->fpdf->SetMargins(100, 8, 8, 8);
		$this->fpdf->SetFont("Arial", "B", 10);
		$this->fpdf->Cell(5, 5, "#", 'TBLR', 0, "C", 0);
		$this->fpdf->Cell(50, 5, "NOMBRE DEL MATERIAL", 'TBLR', 0, "C", 0);
		$this->fpdf->Cell(50, 5, " CANTIDAD", 'TBLR', 0, "C", 0);




		$this->fpdf->Ln(100);


		$this->fpdf->SetFont("Arial", "B", 10);
		$this->fpdf->Cell(2, -8, ".............................................................................................", 0, 0, "C", 0);

		$this->fpdf->Cell(5, -0, "firma del maestros", 0, 0, "C");

		//   $num=1
		//   foreach ($lista as $row) {
		//   	$nombre=$row->nombre;
		//    	$primerApellido=$row->primerApellido;
		//   	$segundoApellido=$row->segundoApellido;
		//    	$ci=$row->ci;
		//    	$fechaNacimiento=$row->fechaNacimiento;
		//   	$bautizado=$row->bautizado
		//    	$telefono=$row->telefono

		//   $this->fpdf->Cell(5,5,"$num",'TBLR',0,'L',0);
		//   $this->fpdf->Cell(35,5,"$nombre",'TBLR',0,'L',0);
		//  $this->fpdf->Cell(28,5,"$primerApellido",'TBLR',0,'L',0);
		//  $this->fpdf->Cell(30,5,"$segundoApellido",'TBLR',0,'L',0);
		//  $this->fpdf->Cell(30,5,"$ci",'TBLR',0,'l',0);
		// $this->fpdf->Cell(30,5,"$fechaNacimiento",'TBLR',0,'L',0);
		//  $this->fpdf->Cell(22,5,"$bautizado",'TBLR',0,'L',0);
		//$this->fpdf->Cell(15,5,"$telefono",'TBLR',0,'L',0);
		// $this->fpdf->Ln(5);
		// // }







		echo $this->fpdf->Output('Maestros.pdf', 'I');
	}




	public function nota($idPedidoMaterial)
	{
		$data = $this->pedido_model->getNotaDePedido($idPedidoMaterial);
		$maestro = $this->maestro_model->recuperarMaestroRecibo($data['idUsuario']);
		$pedidos = $this->pedido_model->getPedidos($data['idPedidoMaterial']);
		$this->pdf = new PDF_MC_Table();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$logo      = base_url() . "uploads/logo1.png";
		$anulado   = base_url() . "fotos/anulado.png";
		$titulo   = utf8_decode('Reporte de Pedidos');
		$area = "Ministerio: Educación criatiana";
		$direccion = utf8_decode("Iglesia: Nueva Vida");


		$x1        = 30;
		$y1        = 8;
		$this->pdf->Image($logo, 3, 5, 25, 23);
		if ($data['estado'] == 0) {
			$this->pdf->Image($anulado, 60, 35, 90, 90);
		}
		///////////////////////// datos de la empresa ////////////////////////////////
		$this->pdf->SetXY($x1, $y1);
		$this->pdf->SetFont('Arial', 'B', 15);
		$length = $this->pdf->GetStringWidth($titulo);
		$this->pdf->Cell($length, 2, $titulo);
		///////
		$this->pdf->SetXY($x1, $y1 + 4);
		$this->pdf->SetFont('Arial', '', 10);
		$length = $this->pdf->GetStringWidth($area);
		$this->pdf->Cell($length, 2, $area);
		///////

		$this->pdf->SetXY($x1, $y1 + 16);
		$this->pdf->SetFont('Arial', '', 10);
		$length = $this->pdf->GetStringWidth($direccion);
		$this->pdf->Cell($length, 2, $direccion);
		///////////////////////// fin datos de la empresa //////////////////////////////
		///////////////////////// datos del cliente //////////////////////////////////
		//Obtenemos los datos de la cabecera de la pedido actual
		$r1   = 10;
		$r2   = $r1 + 68;
		$y1   = 40;
		$this->pdf->SetXY($r1, $y1);
		$this->pdf->SetFont("Arial", "B", 10);
		$this->pdf->MultiCell(60, 4, "Maestro:");
		$this->pdf->SetXY($r1, $y1 + 5);
		$this->pdf->SetFont("Arial", "", 10);

		$this->pdf->MultiCell(150, 4, utf8_decode($maestro['nombres'] . ' ' . $maestro['primerApellido'] . ' ' . $maestro['segundoApellido']));
		$this->pdf->SetXY($r1, $y1 + 10);


		///////////////////////// fin datos del maestro//////////////////////////////
		///////////////////////// Inicio recibo y fecha  //////////////////////////////
		$r1 = 220 - 90;
		$r2 = $r1 + 68;
		$y1 = 6;
		$y2 = $y1 + 2;
		$this->pdf->SetFillColor(72, 209, 204);
		$this->pdf->SetXY($r1 + 1, $y1 + 5);
		$this->pdf->SetFont("Arial", "B", 10);
		$this->pdf->Cell($r2 - $r1 - 1, 5, 'RECIBO', 1, 3, "C");
		$this->pdf->Cell($r2 - $r1 - 1, 5, 'No. ' . $pedido['nroComprobante'], 1, 2, "C");
		$this->pdf->Ln(5);
		$this->pdf->SetXY($r1 + 1, $y1 + 17);
		$originalDate = $pedido['fecha'];
		$newDate = date("d/m/Y", strtotime($originalDate));
		$this->pdf->Cell($r2 - $r1 - 1, 5, 'Fecha: ' . $newDate, 0, 0, "C");
		///////////////////////// Fin recibo y fecha //////////////////////////////
		$this->pdf->Ln(55);

		//Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
		$this->pdf->SetFillColor(232, 232, 232);
		$this->pdf->SetFont('Arial', 'B', 10);
		$this->pdf->Cell(10, 6, utf8_decode('Nº'), 1, 0, 'L', 1);
		$this->pdf->Cell(30, 6, utf8_decode('Nombre'), 1, 0, 'L', 1);
		$this->pdf->Cell(20, 6, utf8_decode('Cantidad'), 1, 0, 'L', 1);
		$this->pdf->Cell(85, 6, utf8_decode('Total'), 1, 0, 'L', 1);

		$this->pdf->Ln(6);
		//Comenzamos a crear las filas de los registros según la consulta mysql
		$detalle = $this->pedido_model->getDetallePedido($data['idPedidoMaterial']);

		//Table with rows and columns
		$this->pdf->SetWidths(array(10, 30, 85, 20, 20, 20));
		//Obtenemos todos los detalles de la pedido actual
		$numero = 1;
		$total  = 0;
		foreach ($detalle as $row) {

			$nombreMaterial      = $row['nombreMaterial'];
			$cantidad      = $row['cantidad'];
			$total      = $row['cantidad'] + $row['cantidad'];

			$this->pdf->SetFont('Arial', '', 10);
		}
		$this->pdf->Ln(1);


		$this->pdf->Output("Nota de Pedido.pdf", "I");
	}


	public function cinsertar()
	{

		$listaMaestros = $this->maestro_model->listaMaestros();
		$data['maestro'] = $listaMaestros;

		$listaMaestross = $this->maestro_model->MaestrosSelect();
		$data['maestros'] = $listaMaestross;

		$listaMaterial = $this->material_model->listaMaterial();
		$data['materiales'] = $listaMaterial;
		$listaPedido = $this->pedido1_model->listaPedido();
		$data['pedido1'] = $listaPedido;
	


		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('formularioPedido', $data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{

		// $data['fecha']=$_POST['fecha'];
		//$data['nombreMaterial']=$_POST['nombreMaterial'];
		//$data['cantidad']=$_POST['cantidad'];
		//$data['razonSocial']=$_POST['razonSocial'];

		if ($_POST['idUsuario'] != null) {
			$parametros = $this->datos();
			$idPedidoMaterial = $this->pedido_model->crearPedido($parametros);
			//Actualizar detalle de la pedido
			foreach ($_POST['idarticulo'] as $key => $id) {
				$cantidad = $_POST['cantidad'][$key];
				if ($cantidad > 0) {

					$paramsDetalle = array(
						'idPedidoMaterial' => $idPedidoMaterial,
						'idMaterial' => $id,
						'cantidad' => $cantidad,

					);
					$this->pedidodetalle_model->crearDetallePedido($paramsDetalle);
					//Actualizar stock producto
					$infoMaterial = $this->material_model->recuperarmaterial($id);
					foreach ($infoMaterial->result() as $row) {
						$nuevoStock = $row->stock - $cantidad;
						$idMaterial = $row->idMaterial;
						$data['stock'] = $nuevoStock;
						$this->material_model->modificarmaterial($idMaterial, $data);
					}
				}
			}
			$this->notaDePedido($idPedidoMaterial);
		} else {
			$this->cinsertar();
		}
		//redirect('pedido/index', 'refresh');

		$listaPedido = $this->pedido_model->agregarpedido($data);
		redirect('Pedido1/index', 'refresh');
	}





}
