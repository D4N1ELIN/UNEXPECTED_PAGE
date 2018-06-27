<?php
     include 'Plantilla.php';
     include 'conexion.php';

     $num_id = $_GET["id"];
     
     $sentencia= " SELECT usuario.idUsuario, usuario.Documento, usuario.Nombre, usuario.Apellidos, usuario.Correo, usuario.Contrasena, usuario.Direccion, usuario.Telefono, genero.Descripcion_gen, tipousuario.Descripcion_user, sede.Nombre_sede  FROM usuario
     INNER JOIN genero ON usuario.genero_idGenero = genero.idGenero
     INNER JOIN tipousuario ON usuario.tipousuario_idTipoUsuario = tipousuario.idTipoUsuario
     INNER JOIN sede ON usuario.sede_idSede = sede.idSede
     
        WHERE idUsuario='".$num_id."' ";

    $resultado=$conexion->query($sentencia);

 while($row = $resultado->fetch_assoc())
    {
      
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
    $pdf->SetXY(84.8,39.7);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255); 
    $pdf->SetFont('Arial','',20);
    $pdf->Cell(90,15,"Usuario # $num_id",1,0,'C',1);
    //------tabla
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255); 
    $pdf -> SetFont('Arial','B',13);
    $pdf -> SetXY(6,70);
    $pdf->Cell(30,10,'Usuario',1,0,'C',1);
    $pdf -> SetXY(37,70);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Nombre'].' '.$row['Apellidos'] ,1,0,'C',1);
    $pdf->SetXY(6,81);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Documento',1,0,'C',1);
    $pdf -> SetXY(37,81);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Documento'],1,0,'C',1);
    $pdf->SetXY(6,92);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Correo',1,0,'C',1);
    $pdf -> SetXY(37,92);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Correo'],1,0,'C',1); 
    $pdf->SetXY(6,103);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Clave',1,0,'C',1);
    $pdf -> SetXY(37,103);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Contrasena'],1,0,'C',1);
    $pdf->SetXY(6,114);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Direccion',1,0,'C',1);
    $pdf -> SetXY(37,114);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Direccion'],1,0,'C',1);
    $pdf->SetXY(6,125);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Telefono',1,0,'C',1);
    $pdf -> SetXY(37,125);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Telefono'],1,0,'C',1);
    $pdf->SetXY(6,136);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Genero',1,0,'C',1);
    $pdf -> SetXY(37,136);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Descripcion_gen'],1,0,'C',1);
    $pdf->SetXY(6,147);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Tipo Usuario',1,0,'C',1);
    $pdf -> SetXY(37,147);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Descripcion_user'],1,0,'C',1);
    $pdf->SetXY(6,158);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Sede',1,0,'C',1);
    $pdf -> SetXY(37,158);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Nombre_sede'],1,0,'C',1);
 }
    $pdf->Output();
?>