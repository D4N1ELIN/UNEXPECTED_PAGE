<?php
    
    include 'Plantilla.php';
    include 'conexion.php';
    $idUsuario = $_SESSION['usuario']['idUsuario'];
    $nomUsuario = $_SESSION['usuario']['Nombre'];
    $apeUsuario = $_SESSION['usuario']['Apellidos'];
    $where="  ";

    

    $query="SELECT ticket.idTicket,usuario.Nombre, ticket.Asunto_tick, ticket.Fecha_tick, categoria.Descripcion_cate, subcategoria.Descripcion_Sub, tecnico.NombreTec, estado.tip_estado FROM ticket
    INNER JOIN usuario ON ticket.usuario_idUsuario=usuario.idUsuario
    INNER JOIN categoria ON ticket.categoria_idCategoria=categoria.idCategoria
    INNER JOIN subcategoria ON ticket.SubCategoria_idSubCategoria=subcategoria.idSubCategoria
    INNER JOIN tecnico ON ticket.tecnico_idTecnico=tecnico.idTecnico
    INNER JOIN estado ON ticket.Estado_idEstado=estado.idEstado
    
    
    $where ORDER BY ticket.idTicket ASC ";
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
    $pdf->Cell(90,15,"Tecnico: $nomUsuario $apeUsuario",1,0,'C',1);
    //

    $pdf->SetFillColor(47,62,119);
    $pdf->SetTextColor(255,255,255); 
    $pdf -> SetFont('Arial','B',13);
    $pdf -> SetXY(6,70);
    $pdf->Cell(10,10,'ID',1,0,'C',1);
    $pdf->Cell(26,10,'Nombre',1,0,'C',1);
    $pdf->Cell(21,10,'Asunto',1,0,'C',1);
    $pdf->Cell(30,10,'Fecha',1,0,'C',1);   
    $pdf->Cell(30,10,'Categoria',1,0,'C',1);
    $pdf -> SetFont('Arial','B',11);
    $pdf->Cell(30,10,utf8_decode('Subcategoria'),1,0,'C',1);  
    $pdf -> SetFont('Arial','B',13);
    $pdf->Cell(25,10,'Tecnico',1,0,'C',1);
    $pdf->Cell(25,10,'Estado',1,1,'C',1);

    $pdf -> SetFont('Arial','',9);

    while($row = $ejecutarQuery->fetch_assoc())
    {
        $pdf -> SetFont('Arial','',9);
        $pdf->SetTextColor(0,0,0); 
        $pdf->SetX(6);
        $pdf->Cell(10,14,$row['idTicket'],1,0,'C');
        $pdf->Cell(26,14,utf8_decode($row['Nombre']),1,0,'C');
        $pdf->Cell(21,14,$row['Asunto_tick'],1,0,'C');
        $pdf->Cell(30,14,utf8_decode($row['Fecha_tick']),1,0,'C');
        $pdf->Cell(30,14,$row['Descripcion_cate'],1,0,'C');
        $pdf->Cell(30,14,$row['Descripcion_Sub'],1,0,'C');
        $pdf->Cell(25,14,$row['NombreTec'],1,'C');
        $pdf -> SetFont('Arial','',11);
        $pdf->Cell(25,14,$row['tip_estado'],1,1,'C');
    }

    $pdf->Output();

?>