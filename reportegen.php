<?php  
    error_reporting(0);
    include('conexion.php');//CONEXION A LA BD
    header ('Content-type: text/html; charset=utf-8');
    header("Content-type: application/vnd.ms-excel; "); 
    header("Content-disposition: attachment; filename=general.xls"); 

    $nombreDep ='SELECT idDepa, nombre FROM `departamentos`  ';
    $depnom=$conexion->query($nombreDep);

      while($recorrido = $depnom->fetch_assoc())
    {
         /*Consulta pricipal*/
    $alumnos='SELECT 
        d.id_categoria"cat",
        a.id_pregunta"#",
        a.nombre"Pregunta", 
        d.nombre"Categoria", 
        f.nombre"Depa",
        SUM(b.resultado)AS "total" 
            FROM preguntas a 
            INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta 
            INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios 
            INNER JOIN categorias d ON a.id_categoria = d.id_categoria 
            INNER JOIN departamentos f ON f.idDepa = c.idDepa 
            WHERE f.idDepa ='.$recorrido['idDepa'].' 
            AND d.id_categoria IN (1,2,3,4,5,6,7,8,9) 
            GROUP BY a.id_pregunta';
        $resAlumnos=$conexion->query($alumnos);

$suma1='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$recorrido['idDepa'].' AND d.id_categoria IN (1) GROUP BY a.id_pregunta';
$sum=$conexion->query($suma1);

$suma2='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$recorrido['idDepa'].' AND d.id_categoria IN (2) GROUP BY a.id_pregunta';
$sum2=$conexion->query($suma2);
$suma3='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$recorrido['idDepa'].' AND d.id_categoria IN (3) GROUP BY a.id_pregunta';
$sum3=$conexion->query($suma3);

$suma4='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$recorrido['idDepa'].' AND d.id_categoria IN (4) GROUP BY a.id_pregunta';
$sum4=$conexion->query($suma4);

$suma5='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$recorrido['idDepa'].' AND d.id_categoria IN (5) GROUP BY a.id_pregunta';
$sum5=$conexion->query($suma5);

$suma6='SELECT a.id_pregunta,d.id_categoria,b.resultado FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$recorrido['idDepa'].' AND d.id_categoria IN (6) GROUP BY a.id_pregunta';
$sum6=$conexion->query($suma6);

$suma7='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$recorrido['idDepa'].' AND d.id_categoria IN (7) GROUP BY a.id_pregunta';
$sum7=$conexion->query($suma7);

$suma8='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$recorrido['idDepa'].' AND d.id_categoria IN (8) GROUP BY a.id_pregunta';
$sum8=$conexion->query($suma8);

$suma9='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa ='.$recorrido['idDepa'].' AND d.id_categoria IN (9) GROUP BY a.id_pregunta';
$sum9=$conexion->query($suma9);


     $tbHtml6 = "<table width='20%' border='1' class='table'>
        <h1 style='text-align: center;'> ".$recorrido['nombre']."</h1>
                <header>
                        <tr>
                            <th>Categoria</th>
                            <th>#</th>
                            <th>Pregunta</th>
                             <th>Puntos</th>
                        </tr>
                </header>";


$total=0;//esta variable se inicializa en o para sacar el total de la suma de resultados 
         while($row = $resAlumnos->fetch_array(MYSQLI_BOTH))
         {
                if($row['cat'] == 1){
                $cantColor="pink";
                }elseif($row['cat'] == 2){
                $cantColor="blue";
                }elseif($row['cat'] == 3){
                $cantColor="green";
                }elseif($row['cat'] == 4){
                $cantColor="gray";
                }elseif($row['cat'] == 5){
                $cantColor="blue";
                }elseif($row['cat'] == 6){
                $cantColor="pink";
                }elseif($row['cat'] == 7){
                $cantColor="green";
                }elseif($row['cat'] == 8){
                $cantColor="blue";
                }elseif($row['cat'] == 9){
                $cantColor="pink";
                }else{
                $cantColor="black";
        }   /*asignamos un color dependiendo la categoria*/
                $total+=$row['total'];
                $tbHtml6.='<tr>
                            <td bgcolor="'.$cantColor.'" >'.$row['Categoria'].'</td>
                            <td>'.$row['#'].'</td>
                            <td>'.$row['Pregunta'].'</td>
                            <td>'.$row['total'].'</td>
                        </tr>';

        }///recorrido conslta principal 


             $resultado = "
             <table width='20%' border='1' class='table'>
                <h3 style='text-align: center;'>Resultados</h3>
                    <tr>
                        <th bgcolor='pink' >Reclutamiento y selección de personal</th>
                        <th bgcolor='blue'>Formación y capacitación</th>
                        <th bgcolor='green'>Permanencia y ascenso</th>
                        <th bgcolor='gray'>Corresponsabilidad en la vida laboral, familiar y personal</th>
                        <th bgcolor='blue'>Clima laboral libre de violencia</th>
                        <th bgcolor='pink'>Acoso y Hostigamiento   </th>
                        <th bgcolor='green'>Accesibilidad</th>
                        <th bgcolor='blue'>Respeto a la diversidad</th>
                        <th bgcolor='pink'>Condiciones generales de trabajo</th>
                        <th>Total</th>
                    </tr>  ";

    $total1=0;
while ($suma = $sum->fetch_array(MYSQLI_BOTH))
                {$total1+=$suma['total'];}

                $t1='<tr><td>'.$total1.'</td>';
                ///////////////////////////////////
    $total2=0;
while ($suma2 = $sum2->fetch_array(MYSQLI_BOTH))
                {$total2+=$suma2['total'];}
                
                $t2=' <td>'.$total2.'</td>';             
                ///////////////////////////////////////
                    $total3=0;
while ($suma3 = $sum3->fetch_array(MYSQLI_BOTH))
                {$total3+=$suma3['total'];}
                $t3=' <td>'.$total3.'</td>'; 

                ////////////////////////////////////////7
                    $total4=0;
while ($suma4 = $sum4->fetch_array(MYSQLI_BOTH))
                {$total4+=$suma4['total'];}
               $t4=' <td>'.$total4.'</td>'; 
                ////////////////////////////////
                    $total5=0;
while ($suma5 = $sum5->fetch_array(MYSQLI_BOTH))
                { $total5+=$suma5['total'];}
               $t5=' <td>'.$total5.'</td>'; 
                ////////////////////////////////777
                    $total6=0;
while ($suma6 = $sum6->fetch_array(MYSQLI_BOTH))
                {
                    if ($suma6['resultado'] != 5 ) //condicion para pregunta 44
                    {
                    $total6+=$suma6['resultado'];
                    }
                }
                $t6=' <td>'.$total6.'</td>';
          ///////////////////////////////////7
                    $total7=0;
while ($suma7 = $sum7->fetch_array(MYSQLI_BOTH))
                { $total7+=$suma7['total']; }
                $t7=' <td>'.$total7.'</td>'; 
                /////////////////////////////////77
                    $total8=0;
while ($suma8 = $sum8->fetch_array(MYSQLI_BOTH))
            { $total8+=$suma8['total']; }
                $t8=' <td>'.$total8.'</td>'; 
                /////////////////////////////77
                $total9=0;
while ($suma9 = $sum9->fetch_array(MYSQLI_BOTH))
                { $total9+=$suma9['total']; }
                $t9=' <td>'.$total9.'</td>'; 

                $t=' <td>'.$total.'</td></tr>'; 

$nombreCat ='SELECT id_categoria FROM `categorias` WHERE id_categoria ';
$catnom=$conexion->query($nombreCat);
while ($recorridocat = $catnom->fetch_array(MYSQLI_BOTH)) 
    {
        /*consulta para sumar los subtotales dependiendo la cabtidad de usuarios */
    $new ='SELECT DISTINCT c.id_usuarios,d.subtotales"subt" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa WHERE f.idDepa='.$recorrido['idDepa'].'  
                    AND d.id_categoria='.$recorridocat['id_categoria'].' GROUP BY c.id_usuarios  ';
                        $new1=$conexion->query($new);

                        while ($recorrido2 = $new1->fetch_array(MYSQLI_BOTH))
                        {   $tot+=$recorrido2['subt'];  }///recorrido para sumar subtotales 

                    if ($recorridocat['id_categoria']==1 ) //condicion para porcentaje
                    {

                        $porcentaje='<td>'.($t1 /$tot*100).'%</td>';
                    }
                    if ($recorridocat['id_categoria']==2 ) //condicion para porcentaje
                    {

                        $porcentaje2='<td>'.($total2 /$tot*100).'%</td>';
                    }
                    if ($recorridocat['id_categoria']==3 ) //condicion para porcentaje
                    {

                        $porcentaje3='<td>'.($total3 /$tot*100).'%</td>';                    
                    }

                     if ($recorridocat['id_categoria']==4 ) //condicion para porcentaje
                    {

                        $porcentaje4='<td>'.($total4 /$tot*100).'%</td>';
                    }

                    if ($recorridocat['id_categoria']==5 ) //condicion para porcentaje
                    {

                        $porcentaje5='<td>'.($total5 /$tot*100).'%</td>';
                    }

                    if ($recorridocat['id_categoria']==6 ) //condicion para porcentaje
                    {

                        $porcentaje6='<td>'.($total6 /$tot*100).'%</td>';
                    }

                    if ($recorridocat['id_categoria']==7 ) //condicion para porcentaje
                    {

                        $porcentaje7='<td>'.($total7 /$tot*100).'%</td>';
                    }

                    if ($recorridocat['id_categoria']==8 ) //condicion para porcentaje
                    {

                       $porcentaje8='<td>'.($total8 /$tot*100).'%</td>';
                    }

                    if ($recorridocat['id_categoria']==9 ) //condicion para porcentaje
                    {

                        $porcentaje9='<td>'.($total9 /$tot*100).'%</td>';                    
                    }
                        $porcentajegen='<td>'.($total /168*100).'%</td>';

             unset($tot);
            
                    }// consulta categorias 
                
echo  utf8_decode($tbHtml6);// encabezado principal 
echo  utf8_decode($resultado);// encabezado categorias 
echo  ($t1);    /*imprime totales por categoria */
echo  ($t2);
echo  ($t3);
echo  ($t4);
echo  ($t5);
echo  ($t6);
echo  ($t7);
echo  ($t8);
echo  ($t9);
echo  ($t);
echo ($porcentaje);/*imprime porcentajes  */
echo ($porcentaje2);
echo ($porcentaje3);
echo ($porcentaje4);
echo ($porcentaje5);
echo ($porcentaje6);
echo ($porcentaje7);
echo ($porcentaje8);
echo ($porcentaje9);
echo ($porcentajegen);

}//recorrido departamento 
?>