<?php
     include 'Plantilla.php';
     include 'conexion.php';

     $num_id = $_GET["id"];
     
     $sentencia= " SELECT ticket.idTicket, ticket.Asunto_tick, ticket.Descripcion_tick, ticket.Fecha_tick, categoria.Descripcion_cate, subcategoria.Descripcion_Sub, usuario.Nombre, usuario.Apellidos, usuario.Correo, usuario.Telefono, tecnico.NombreTec, estado.tip_estado  FROM ticket
     
     INNER JOIN categoria ON ticket.categoria_idCategoria = categoria.idCategoria
     INNER JOIN subcategoria ON ticket.SubCategoria_idSubCategoria = subcategoria.idSubCategoria
     INNER JOIN usuario ON ticket.usuario_idUsuario = usuario.idUsuario
     INNER JOIN tecnico ON ticket.tecnico_idTecnico = tecnico.idTecnico
     INNER JOIN estado ON ticket.Estado_idEstado = estado.idEstado
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
        $pdf->Cell(90,15,"Ticket Usuario #$num_id",1,0,'C',1);
        //------tabla
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255); 
        $pdf -> SetFont('Arial','B',13);
        $pdf -> SetXY(6,70);
        $pdf->Cell(30,10,'ID Ticket',1,0,'C',1);
        $pdf -> SetXY(37,70);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['idTicket'],1,0,'C',1);
        $pdf->SetXY(6,81);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Nombre',1,0,'C',1);
        $pdf -> SetXY(37,81);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['Nombre'],1,0,'C',1);
        $pdf->SetXY(6,92);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Apellido',1,0,'C',1);
        $pdf -> SetXY(37,92);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['Apellidos'],1,0,'C',1); 
        $pdf->SetXY(6,103);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Correo',1,0,'C',1);
        $pdf -> SetXY(37,103);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['Correo'],1,0,'C',1);
        $pdf->SetXY(6,114);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Asunto',1,0,'C',1);
        $pdf -> SetXY(37,114);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['Asunto_tick'],1,0,'C',1);
        $pdf->SetXY(6,125);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Descripcion',1,0,'C',1);
        $pdf -> SetXY(37,125);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['Descripcion_tick'],1,0,'C',1);
        $pdf->SetXY(6,136);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Fecha',1,0,'C',1);
        $pdf -> SetXY(37,136);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['Fecha_tick'],1,0,'C',1);
        $pdf->SetXY(6,147);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Categoria',1,0,'C',1);
        $pdf -> SetXY(37,147);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['Descripcion_cate'],1,0,'C',1);
        $pdf->SetXY(6,158);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Subcategoria',1,0,'C',1);
        $pdf -> SetXY(37,158);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['Descripcion_Sub'],1,0,'C',1);
        $pdf->SetXY(6,169);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Telefono',1,0,'C',1);
        $pdf -> SetXY(37,169);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['Telefono'],1,0,'C',1);
        $pdf->SetXY(6,180);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Tecnico',1,0,'C',1);
        $pdf -> SetXY(37,180);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['NombreTec'],1,0,'C',1);
        $pdf->SetXY(6,191);
        $pdf->SetFillColor(47,62,119);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(30,10,'Estado',1,0,'C',1);
        $pdf -> SetXY(37,191);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0); 
        $pdf->Cell(165,10,$row['tip_estado'],1,0,'C',1);
        
 }
    $pdf->Output();
?>