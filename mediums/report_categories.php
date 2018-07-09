<?php include('../templates/page_init.tpl'); ?>
<?php
    
    require_once('../fpdf/fpdf.php');
    include ("../db/conexion.php");

    class PDF extends FPDF
    {
        
        function AcceptPageBreak()
        {

            $this->AddPage();
            $this->SetFillColor(232,232,232);
            $this->SetFont('Arial','B',12);
            $this->SetX(10);
            $this->Cell(10,6,'#',1,0,'C',1);
            $this->SetX(20);
            $this->Cell(30,6,'CATEGORIA',1,0,'C',1); 
            $this->Ln();

        }

        // Se heredan todas las funciones para hacer el Encabezado de la página
        function Header()
        {
            // Logo
            $this->Image('../assets/img/logo.jpg',10,8,28);
            // Arial bold 15
            $this->SetFont('Arial','B',20);
            // Movernos a la derecha (espacio)
            $this->Cell(70);
            // Título (PROPIEDAD DESPUÉS DEL TITULO ES CONTORNO, SALTO DE LÍNEA, ALINEACIÓN)
            $this->Cell(60,20,'INFORME DE CATEGORIAS',0,0,'C');
            // Salto de línea
            $this->Ln(30);
        }
        
        // Se crea la función FOOTER "Pie de página"
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
            
            //Posición en y
            $this->SetY(-20);
            //Fuente
            $this->SetFont('Arial','I',8);
            //Fecha
            date_default_timezone_set('Pacific/Noumea');
            $this->Cell(0,10,date('d/m/Y g:i:s a'),0,0,'C');

            //$this->Cell(0,10,time(),0,0,'C');
        }
    }

    $mostrar = 
    "
        SELECT * FROM categories;
    ";
    
    $res = $conexion->query($mostrar);
    
    //Limpiar (eliminar) y deshabilitar los búferes de salida.
    ob_end_clean();
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->Addpage();
    $pdf->SetAuthor('Sistema de Biblioteca');
    $pdf->SetCreator('Institución Educativa Jesús María Ormaza');
    $pdf->SetTitle('Informe de Categorias v1.0');

    $pdf->SetFillColor(84,89,247);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetX(50);
    $pdf->Cell(10,6,'#',1,0,'C',1);
    $pdf->SetX(60);
    $pdf->Cell(100,6,'CATEGORIE',1,0,'C',1);
    $pdf->Ln(); 

    while ($fila = $res->fetch_assoc())
    {
        $pdf->SetFont('Arial','',12);
        $pdf->SetX(50);
        $pdf->Cell(10,6,$fila['id_categories'],1,0,'C');
        $pdf->SetX(60);
        $pdf->Cell(100,6,utf8_decode($fila['name_categories']),1,1,'C');

    }
    
    /*for($i=1;$i<=100;$i++)
    $pdf->Cell(0,10,'Imprimiendo linea número '.$i,0,1);*/
    $pdf->Output();
?>