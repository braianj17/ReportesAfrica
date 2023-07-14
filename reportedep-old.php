<?php  
error_reporting(0);
    include('conexion.php');//CONEXION A LA BD
    require 'Classes/PHPExcel.php';
    $depa = ($_GET['depa']);
    $nombreDep ='SELECT idDepa, nombre FROM `departamentos` WHERE idDepa='.$depa.'  ';
    $depnom=$conexion->query($nombreDep);

    $fila = 3;
    $fila2 = 1;
    $filacat = 62;


      while($row2 = $depnom->fetch_assoc())
    {

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle($row2['nombre']);
    $objPHPExcel->getActiveSheet()->setCellValue('A2', 'Categoria');
    $objPHPExcel->getActiveSheet()->setCellValue('B2', '#');
    $objPHPExcel->getActiveSheet()->setCellValue('C2', 'Pregunta');
    $objPHPExcel->getActiveSheet()->setCellValue('D2', 'Puntos');

    $objPHPExcel->getActiveSheet()->setCellValue('B60', 'Resultados');//RESULTADOS 
    $objPHPExcel->getActiveSheet()->setCellValue('A71', 'TOTAL');//RESULTADOS 


    

  

  
        $alumnos='SELECT d.id_categoria"cat",
            a.id_pregunta"#",a.nombre"Pregunta", d.nombre"Categoria", f.nombre"Depa",d.id_categoria"idCat", SUM(b.resultado)AS "total" 
            FROM preguntas a 
            INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta 
            INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios 
            INNER JOIN categorias d ON a.id_categoria = d.id_categoria 
            INNER JOIN departamentos f ON f.idDepa = c.idDepa 
            WHERE f.idDepa ='.$depa.' AND d.id_categoria IN (1,2,3,4,5,6,7,8,9) 
            GROUP BY a.id_pregunta';
            $resAlumnos=$conexion->query($alumnos);

        $suma1='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$depa.' AND d.id_categoria IN (1) GROUP BY a.id_pregunta';
        $sum=$conexion->query($suma1);

$suma2='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$depa.' AND d.id_categoria IN (2) GROUP BY a.id_pregunta';
$sum2=$conexion->query($suma2);

$suma3='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$depa.' AND d.id_categoria IN (3) GROUP BY a.id_pregunta';
$sum3=$conexion->query($suma3);

$suma4='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$depa.' AND d.id_categoria IN (4) GROUP BY a.id_pregunta';
$sum4=$conexion->query($suma4);

$suma5='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$depa.' AND d.id_categoria IN (5) GROUP BY a.id_pregunta';
$sum5=$conexion->query($suma5);

$suma6='SELECT a.id_pregunta,d.id_categoria,b.resultado FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$depa.' AND d.id_categoria IN (6) GROUP BY a.id_pregunta';
$sum6=$conexion->query($suma6);

$suma7='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$depa.' AND d.id_categoria IN (7) GROUP BY a.id_pregunta';
$sum7=$conexion->query($suma7);

$suma8='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$depa.' AND d.id_categoria IN (8) GROUP BY a.id_pregunta';
$sum8=$conexion->query($suma8);

$suma9='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$depa.' AND d.id_categoria IN (9) GROUP BY a.id_pregunta';
$sum9=$conexion->query($suma9);

         while($row = $resAlumnos->fetch_array(MYSQLI_BOTH)){

        $total+=$row['total'];///SUMA TODOS LOS TOTALES 

        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila2, $row2['nombre']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['Categoria']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row['#']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['Pregunta']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $row['total']);
       
        
        $fila++;

        }///recorrido conslta principal 


                $total1=0;
while ($suma = $sum->fetch_array(MYSQLI_BOTH))
                {$total1+=$suma['total'];}
                $objPHPExcel->getActiveSheet()->setCellValue('B62', $total1);
             

                $total2=0;
while ($suma2 = $sum2->fetch_array(MYSQLI_BOTH))
                {$total2+=$suma2['total'];}
                $objPHPExcel->getActiveSheet()->setCellValue('B63', $total2);
                ///////////////////////////////////////
                    $total3=0;
while ($suma3 = $sum3->fetch_array(MYSQLI_BOTH))
                {$total3+=$suma3['total'];}
                $objPHPExcel->getActiveSheet()->setCellValue('B64', $total3);

                ////////////////////////////////////////7
                    $total4=0;
while ($suma4 = $sum4->fetch_array(MYSQLI_BOTH))
                {$total4+=$suma4['total'];}
                $objPHPExcel->getActiveSheet()->setCellValue('B65', $total4);
                ////////////////////////////////
                    $total5=0;
while ($suma5 = $sum5->fetch_array(MYSQLI_BOTH))
                { $total5+=$suma5['total'];}
               $objPHPExcel->getActiveSheet()->setCellValue('B66', $total5);
                ////////////////////////////////777
                    $total6=0;
while ($suma6 = $sum6->fetch_array(MYSQLI_BOTH))
                {
                    if ($suma6['resultado'] != 5 ) //condicion para pregunta 44
                    {
                    $total6+=$suma6['resultado'];
                    }
                }
               $objPHPExcel->getActiveSheet()->setCellValue('B67', $total6);
                ///////////////////////////////////7
                    $total7=0;
while ($suma7 = $sum7->fetch_array(MYSQLI_BOTH))
                { $total7+=$suma7['total']; }
                $objPHPExcel->getActiveSheet()->setCellValue('B68', $total7);
                /////////////////////////////////77
                    $total8=0;
while ($suma8 = $sum8->fetch_array(MYSQLI_BOTH))
            { $total8+=$suma8['total']; }
              $objPHPExcel->getActiveSheet()->setCellValue('B69', $total8);
                /////////////////////////////77
                $total9=0;
while ($suma9 = $sum9->fetch_array(MYSQLI_BOTH))
                { $total9+=$suma9['total']; }
                $objPHPExcel->getActiveSheet()->setCellValue('B70', $total9);


               $objPHPExcel->getActiveSheet()->setCellValue('B71', $total);

     
          $nombreCat ='SELECT * FROM `categorias` ';
$catnom=$conexion->query($nombreCat);
while ($recorridocat = $catnom->fetch_array(MYSQLI_BOTH)) 
    {
   $objPHPExcel->getActiveSheet()->setCellValue('A'.$filacat, $recorridocat['nombre']);
   $filacat++;

   $new ='SELECT DISTINCT c.id_usuarios,d.subtotales"subt" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa='.$depa.'  
                    AND d.id_categoria='.$recorridocat['id_categoria'].' GROUP BY c.id_usuarios  ';
                        $new1=$conexion->query($new);

                        while ($recorrido2 = $new1->fetch_array(MYSQLI_BOTH))
                        {   $tot+=$recorrido2['subt'];  }///recorrido para sumar subtotales 

                    if ($recorridocat['id_categoria']==1 ) //condicion para porcentaje
                    {
                        $objPHPExcel->getActiveSheet()->setCellValue('C62', $total1 /$tot*100);

                    //    echo "<td>".($total1 /$tot*100)."%</td>";
                    }

                        if ($recorridocat['id_categoria']==2 ) //condicion para porcentaje
                    {

                        $objPHPExcel->getActiveSheet()->setCellValue('C63', $total2 /$tot*100);
                    }

                    if ($recorridocat['id_categoria']==3 ) //condicion para porcentaje
                    {

                        $objPHPExcel->getActiveSheet()->setCellValue('C64', $total3 /$tot*100);
                    }
                    if ($recorridocat['id_categoria']==4 ) //condicion para porcentaje
                    {

                        $objPHPExcel->getActiveSheet()->setCellValue('C65', $total4 /$tot*100);
                    }

                    if ($recorridocat['id_categoria']==5 ) //condicion para porcentaje
                    {

                        $objPHPExcel->getActiveSheet()->setCellValue('C66', $total5 /$tot*100);
                    }

                    if ($recorridocat['id_categoria']==6 ) //condicion para porcentaje
                    {

                        $objPHPExcel->getActiveSheet()->setCellValue('C67', $total6 /$tot*100);
                    }

                    if ($recorridocat['id_categoria']==7 ) //condicion para porcentaje
                    {

                        $objPHPExcel->getActiveSheet()->setCellValue('C68', $total7 /$tot*100);
                    }

                    if ($recorridocat['id_categoria']==8 ) //condicion para porcentaje
                    {

                        $objPHPExcel->getActiveSheet()->setCellValue('C69', $total8 /$tot*100);
                    }

                    if ($recorridocat['id_categoria']==9 ) //condicion para porcentaje
                    {

                        $objPHPExcel->getActiveSheet()->setCellValue('C70', $total9 /$tot*100);                    }

                    unset($tot);

}  //CAtegoias    
      //  $filacat++;

    //}






}//recorrido departamento 
    
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Productos.xls"');
    header('Cache-Control: max-age=0');
    
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('php://output');
    
?>