<?php include('../templates/page_init_admin.tpl'); ?>
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
			$this->Cell(30,6,'LIVRE',1,0,'C',1);
			$this->SetX(50);
			$this->Cell(40,6,'UTILISATEUR',1,0,'C',1);
			$this->SetX(90);
			$this->Cell(50,6,'DATE PRET',1,0,'C',1);
			$this->SetX(140);
			$this->Cell(50,6,'DATE EXPIRATION',1,0,'C',1);
			$this->SetX(190);
			$this->Cell(50,6,'DATE RETOUR',1,0,'C',1);
			$this->SetX(240);
			$this->Cell(50,6,'ETAT',1,0,'C',1);
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
			$this->Cell(130,20,'INFORME DEVOLUCIONES PENDIENTES',0,0,'C');
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
		SELECT * FROM loans JOIN users ON login=code_user_loans WHERE state_loans='En cours' ORDER BY date_expired_loans desc, state_loans;
	";
	
	$res = $conexion->query($mostrar);
	
	//Limpiar (eliminar) y deshabilitar los búferes de salida.
	ob_end_clean();
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->Addpage();
	$pdf->SetAuthor('Sistema de Biblioteca');
	$pdf->SetCreator('Institución Educativa Jesús María Ormaza');
	$pdf->SetTitle('Informe de Estudiantes v1.0');

	$pdf->SetFillColor(84,89,247);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(10);
	$pdf->Cell(10,6,'#',1,0,'C',1);
	$pdf->SetX(20);
	$pdf->Cell(60,6,'LIVRE',1,0,'C',1);
	$pdf->SetX(80);
	$pdf->Cell(60,6,'UTILISATEUR',1,0,'C',1);
	$pdf->SetX(140);
	$pdf->Cell(40,6,'DATE PRET',1,0,'C',1);
	$pdf->SetX(180);
	$pdf->Cell(40,6,'DATE EXPIRATION',1,0,'C',1);
	$pdf->SetX(220);
	$pdf->Cell(40,6,'DATE RETOUR',1,0,'C',1);
	$pdf->SetX(260);
	$pdf->Cell(30,6,'ETAT',1,0,'C',1);
	$pdf->Ln();	

	while ($fila = $res->fetch_assoc())
	{
		$book=utf8_decode($fila['name_book_loans']);
	if(strlen($book)>25)
		$book=substr($book,0,25)."...";
	$user=utf8_decode($fila['last_name'])." ".utf8_decode($fila['first_name']);
	if(strlen($user)>25)
		$user=substr($user,0,25)."...";
	
		$pdf->SetFont('Arial','',12);
		$pdf->SetX(10);
		$pdf->Cell(10,6,$fila['id_loans'],1,0,'C');
		$pdf->SetX(20);
		$pdf->Cell(60,6,$book,1,0,'C');
		$pdf->SetX(80);
		$pdf->Cell(60,6,$user,1,0,'C');
		$pdf->SetX(140);
		$pdf->Cell(40,6,$fila['date_loans'],1,0,'C');
		$pdf->SetX(180);
		$pdf->Cell(40,6,$fila['date_expired_loans'],1,0,'C');
		$pdf->SetX(220);
		$pdf->Cell(40,6,$fila['date_return_loans'],1,0,'C');
		$pdf->SetX(260);
		$pdf->Cell(30,6,$fila['state_loans'],1,1,'C');

	}
	
	/*for($i=1;$i<=100;$i++)
    $pdf->Cell(0,10,'Imprimiendo linea número '.$i,0,1);*/
	$pdf->Output();
?>