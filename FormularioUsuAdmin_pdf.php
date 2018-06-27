<?php
    
    include 'Plantilla.php';
    include 'conexion.php';
    $idUsuario = $_SESSION['usuario']['idUsuario'];
    $nomUsuario = $_SESSION['usuario']['Nombre'];
    $apeUsuario = $_SESSION['usuario']['Apellidos'];
    $where="  ";

    

    $query="SELECT usuario.idUsuario, usuario.Documento, usuario.Nombre, usuario.Apellidos, usuario.Correo, usuario.Contrasena, usuario.Telefono, sede.Nombre_sede FROM usuario
    INNER JOIN sede ON usuario.sede_idSede = sede.idSede
    
    $where ORDER BY usuario.idUsuario ASC ";
    $ejecutarQuery=$conexion->query($query);
    
    $pdf = new PDF();
    $pdf -> AliasNbPages();
    $pdf -> AddPage();
 //header
            $pdf->SetX(110);
            $pdf->SetFont('Arial','I', 8);
			$pdf->Cell(-10,5, 'Pagina '.$pdf->PageNo().'/{nb}',0,0,'C' );
            //-----------------
            $pdf->Image('imagenes/descarga.jpg',30.4,21.7,54);
            $pdf->SetFont('Arial','B',25);
            $pdf->SetX(35);
            $pdf->Cell(191,40,'Reporte',0,0,'C');
            $pdf->Ln(30);
    //mostrar usuario
    $pdf->SetX(84.6);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255); 
    $pdf->SetFont('Arial','',20);
    $pdf->Cell(90,15,"Admin: $nomUsuario $apeUsuario",1,0,'C',1);
    //

    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255); 
    $pdf -> SetFont('Arial','B',13);
    $pdf -> SetXY(6,70);
    $pdf->Cell(10,10,'ID',1,0,'C',1);
    $pdf->Cell(26,10,'Documento',1,0,'C',1);
    $pdf->Cell(21,10,'Nombre',1,0,'C',1);
    $pdf->Cell(30,10,'Apellido',1,0,'C',1);   
    $pdf->Cell(30,10,'Correo',1,0,'C',1);
    $pdf -> SetFont('Arial','B',11);
    $pdf->Cell(30,10,utf8_decode('Contraseña'),1,0,'C',1);  
    $pdf -> SetFont('Arial','B',13);
    $pdf->Cell(25,10,'Telefono',1,0,'C',1);
    $pdf->Cell(25,10,'Sede',1,1,'C',1);

    $pdf -> SetFont('Arial','',9);

    while($row = $ejecutarQuery->fetch_assoc())
    {
        $pdf -> SetFont('Arial','',9);
        $pdf->SetTextColor(0,0,0); 
        $pdf->SetX(6);
        $pdf->Cell(10,14,$row['idUsuario'],1,0,'C');
        $pdf->Cell(26,14,utf8_decode($row['Documento']),1,0,'C');
        $pdf->Cell(21,14,$row['Nombre'],1,0,'C');
        $pdf->Cell(30,14,utf8_decode($row['Apellidos']),1,0,'C');
        $pdf->Cell(30,14,$row['Correo'],1,0,'C');
        $pdf->Cell(30,14,$row['Contrasena'],1,0,'C');
        $pdf->Cell(25,14,$row['Telefono'],1,'C');
        $pdf -> SetFont('Arial','',11);
        $pdf->Cell(25,14,$row['Nombre_sede'],1,1,'C');
    }

    $pdf->Output();

?>
