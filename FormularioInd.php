<?php
     include 'Plantilla.php';
     include 'conexion.php';

     $num_id = $_GET["id"];
     
     $sentencia= " SELECT ticket.idTicket, ticket.Asunto_tick, ticket.Fecha_tick, ticket.Descripcion_tick, usuario.Nombre, usuario.Apellidos, categoria.idCategoria, categoria.Descripcion_cate,          subcategoria.Descripcion_Sub, subcategoria.idSubCategoria, tecnico.NombreTec, tecnico.idTecnico, estado.tip_estado, estado.idEstado FROM ticket 
        INNER JOIN usuario ON ticket.usuario_idUsuario = usuario.idUsuario
        INNER JOIN categoria ON ticket.categoria_idCategoria = categoria.idCategoria
        INNER JOIN subcategoria ON ticket.SubCategoria_idSubCategoria = subcategoria.idSubCategoria
        INNER JOIN tecnico ON ticket.tecnico_idTecnico = tecnico.idTecnico
        INNER JOIN estado on ticket.Estado_idEstado = estado.idEstado
        WHERE idTicket='".$num_id."' ";

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
    $pdf->Cell(90,15,"Ticket # $num_id",1,0,'C',1);
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
    $pdf->Cell(30,10,'Asunto',1,0,'C',1);
    $pdf -> SetXY(37,81);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Asunto_tick'],1,0,'C',1);
    $pdf->SetXY(6,92);
    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Descripcion',1,0,'C',1);
    $pdf -> SetXY(37,92);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Descripcion_tick'],1,0,'C',1); 
    $pdf->SetXY(6,103);
     $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Fecha',1,0,'C',1);
    $pdf -> SetXY(37,103);
     $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Fecha_tick'],1,0,'C',1);
    $pdf->SetXY(6,114);
     $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Categoria',1,0,'C',1);
    $pdf -> SetXY(37,114);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Descripcion_cate'],1,0,'C',1);
    $pdf->SetXY(6,125);
     $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'SubCategoria',1,0,'C',1);
    $pdf -> SetXY(37,125);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['Descripcion_Sub'],1,0,'C',1);
    $pdf->SetXY(6,136);
     $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Estado',1,0,'C',1);
    $pdf -> SetXY(37,136);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['tip_estado'],1,0,'C',1);
    $pdf->SetXY(6,147);
     $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Tecnico',1,0,'C',1);
    $pdf -> SetXY(37,147);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0); 
    $pdf->Cell(165,10,$row['NombreTec'],1,0,'C',1);
 }
    $pdf->Output();
?>