		<html lang="es">
	<head>
		<title>Descargar Reportes en Excel desde la BD</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<header>
		</header><section>
		<div class="content">
		<form method="post" class="form" action="reportedirec.php">
		<button class="btn btn-warning">Generar reporte</button>
		</form></div>
		
<?php
 error_reporting(0);
include('conexion.php');
//$depa = $_POST['idDepa'];

/*consulta para sacar el recorrido general*/
$nombreDirec ='SELECT idDirec, nombre FROM `direcciones` ';
$depnom=$conexion->query($nombreDirec);
while ($recorrido = $depnom->fetch_array(MYSQLI_BOTH)) 
	{
/*consulta principal*/
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
		INNER JOIN direcciones g ON g.idDirec = f.idDirec  
		WHERE g.idDirec ='.$recorrido['idDirec'].' AND d.id_categoria IN (1,2,3,4,5,6,7,8,9) 
		GROUP BY a.id_pregunta';
$resAlumnos=$conexion->query($alumnos);

/*suma los puntos 	*/
$suma1='SELECT SUM(b.resultado)AS "total" 
		FROM preguntas a 
		INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta 
		INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios 
		INNER JOIN categorias d ON a.id_categoria = d.id_categoria 
		INNER JOIN departamentos f ON f.idDepa = c.idDepa 
		INNER JOIN direcciones g ON g.idDirec = f.idDirec  
		WHERE g.idDirec ='.$recorrido['idDirec'].' AND d.id_categoria IN (1) 
		GROUP BY a.id_pregunta';

$sum=$conexion->query($suma1);

$suma2='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa INNER JOIN direcciones g ON g.idDirec = f.idDirec WHERE g.idDirec ='.$recorrido['idDirec'].' AND d.id_categoria IN (2) GROUP BY a.id_pregunta';
$sum2=$conexion->query($suma2);

$suma3='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa INNER JOIN direcciones g ON g.idDirec = f.idDirec  WHERE g.idDirec ='.$recorrido['idDirec'].' AND d.id_categoria IN (3) GROUP BY a.id_pregunta';
$sum3=$conexion->query($suma3);

$suma4='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa INNER JOIN direcciones g ON g.idDirec = f.idDirec  WHERE g.idDirec ='.$recorrido['idDirec'].' AND d.id_categoria IN (4) GROUP BY a.id_pregunta';
$sum4=$conexion->query($suma4);

$suma5='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa INNER JOIN direcciones g ON g.idDirec = f.idDirec  WHERE g.idDirec ='.$recorrido['idDirec'].' AND d.id_categoria IN (5) GROUP BY a.id_pregunta';
$sum5=$conexion->query($suma5);

$suma6='SELECT a.id_pregunta,d.id_categoria,b.resultado FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa INNER JOIN direcciones g ON g.idDirec = f.idDirec  WHERE g.idDirec ='.$recorrido['idDirec'].' AND d.id_categoria IN (6) GROUP BY a.id_pregunta';
$sum6=$conexion->query($suma6);

$suma7='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa INNER JOIN direcciones g ON g.idDirec = f.idDirec  WHERE g.idDirec ='.$recorrido['idDirec'].' AND d.id_categoria IN (7) GROUP BY a.id_pregunta';
$sum7=$conexion->query($suma7);

$suma8='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa INNER JOIN direcciones g ON g.idDirec = f.idDirec  WHERE g.idDirec ='.$recorrido['idDirec'].' AND d.id_categoria IN (8) GROUP BY a.id_pregunta'; 
$sum8=$conexion->query($suma8);

$suma9='SELECT SUM(b.resultado)AS "total" FROM preguntas a INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios INNER JOIN categorias d ON a.id_categoria = d.id_categoria INNER JOIN departamentos f ON f.idDepa = c.idDepa INNER JOIN direcciones g ON g.idDirec = f.idDirec  WHERE g.idDirec ='.$recorrido['idDirec'].' AND d.id_categoria IN (9) GROUP BY a.id_pregunta';
$sum9=$conexion->query($suma9);
?>


		
		
			<table class="table"><br><br><br><br>
				<div class="alert alert-info"><h1 style="text-align: center;"><?php echo $recorrido['nombre'];?></h1></div>
				<tr class="bg-primary">
					<th>Categoria</th>
					<th>#</th>
					<th>Pregunta</th>
					<th>Puntos</th>
				</tr>
				<?php

				$total=0;
				while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{

	if($registroAlumnos['cat'] == 1){
$cantColor="pink";
}elseif($registroAlumnos['cat'] == 2){
$cantColor="blue";
}elseif($registroAlumnos['cat'] == 3){
$cantColor="green";
}elseif($registroAlumnos['cat'] == 4){
$cantColor="gray";
}elseif($registroAlumnos['cat'] == 5){
$cantColor="blue";
}elseif($registroAlumnos['cat'] == 6){
$cantColor="pink";
}elseif($registroAlumnos['cat'] == 7){
$cantColor="green";
}elseif($registroAlumnos['cat'] == 8){
$cantColor="blue";
}elseif($registroAlumnos['cat'] == 9){
$cantColor="pink";
}else{
$cantColor="black";
}

					$total+=$registroAlumnos['total'];
					//echo '<h1>'.$registroAlumnos	['Categoria'].'</h1>';
					echo'<tr>
						 <td bgcolor="'.$cantColor.'" >'.$registroAlumnos['Categoria'].'</td>
						 <td>'.$registroAlumnos['#'].'</td>
						 <td>'.$registroAlumnos['Pregunta'].'</td>
						 <td>'.$registroAlumnos['total'].'</td>';
				}
				//echo '<td>'.$total.'</td> </tr>';
				?>
			</table>
<table class="table">
	<h3>Resultados</h3>
	<tr>
		<th>Reclutamiento y selección de personal</th>
		<th>Formación y capacitación</th>
		<th>Permanencia y ascenso</th>
		<th>Corresponsabilidad en la vida laboral, familiar y personal</th>
		<th>Clima laboral libre de violencia</th>
		<th>Acoso y Hostigamiento	</th>
		<th>Accesibilidad</th>
		<th>Respeto a la diversidad</th>
		<th>Condiciones generales de trabajo</th>
		<th>Total</th>

	</tr>
<?php



				$total1=0;
while ($suma = $sum->fetch_array(MYSQLI_BOTH))
				{$total1+=$suma['total'];}

				echo '<td>'.$total1.'</td>';
				///////////////////////////////////
				$total2=0;
while ($suma2 = $sum2->fetch_array(MYSQLI_BOTH))
				{$total2+=$suma2['total'];}
				echo '<td>'.$total2.'</td>';
				///////////////////////////////////////
					$total3=0;
while ($suma3 = $sum3->fetch_array(MYSQLI_BOTH))
				{$total3+=$suma3['total'];}
				echo '<td>'.$total3.'</td>';

				////////////////////////////////////////7
					$total4=0;
while ($suma4 = $sum4->fetch_array(MYSQLI_BOTH))
				{$total4+=$suma4['total'];}
				echo '<td>'.$total4.'</td>';
				////////////////////////////////
					$total5=0;
while ($suma5 = $sum5->fetch_array(MYSQLI_BOTH))
				{ $total5+=$suma5['total'];}
				echo '<td>'.$total5.'</td>';
				////////////////////////////////777
					$total6=0;
while ($suma6 = $sum6->fetch_array(MYSQLI_BOTH))
				{
					if ($suma6['resultado'] != 5 ) //condicion para pregunta 44
					{
					$total6+=$suma6['resultado'];
					}
				}
				echo '<td>'.$total6.'</td>';
				///////////////////////////////////7
					$total7=0;
while ($suma7 = $sum7->fetch_array(MYSQLI_BOTH))
				{ $total7+=$suma7['total']; }
				echo '<td>'.$total7.'</td>';
				/////////////////////////////////77
					$total8=0;
while ($suma8 = $sum8->fetch_array(MYSQLI_BOTH))
			{ $total8+=$suma8['total']; }
				echo '<td>'.$total8.'</td>';
				/////////////////////////////77
				$total9=0;
while ($suma9 = $sum9->fetch_array(MYSQLI_BOTH))
				{ $total9+=$suma9['total']; }
				echo '<td>'.$total9.'</td>';

				/*$togen=0;
while ($suumatotal = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{$togen+=$suumatotal['total'];}*/
				echo '<td>'.$total.'</td>';

echo "<tr>";

$nombreCat ='SELECT id_categoria FROM `categorias` WHERE id_categoria ';
$catnom=$conexion->query($nombreCat);
while ($recorridocat = $catnom->fetch_array(MYSQLI_BOTH)) 
	{

	$new ='SELECT DISTINCT 
			c.id_usuarios,d.subtotales"subt" 
			FROM preguntas a 
			INNER JOIN resultados b ON a.id_pregunta = b.id_pregunta 
			INNER JOIN usuarios c ON c.id_usuarios =b.id_usuarios 
			INNER JOIN categorias d ON a.id_categoria = d.id_categoria 
			INNER JOIN departamentos f ON f.idDepa = c.idDepa 
			INNER JOIN direcciones g ON g.idDirec = f.idDirec  
			WHERE g.idDirec='.$recorrido['idDirec'].'  
				 	AND d.id_categoria='.$recorridocat['id_categoria'].' 
				 	GROUP BY c.id_usuarios  ';
						$new1=$conexion->query($new);

						while ($recorrido2 = $new1->fetch_array(MYSQLI_BOTH))
						{	$tot+=$recorrido2['subt'];	}///recorrido para sumar subtotales 

					if ($recorridocat['id_categoria']==1 ) //condicion para porcentaje
					{

						echo "<td>".($total1 /$tot*100)."%</td>";
					}
					if ($recorridocat['id_categoria']==2 ) //condicion para porcentaje
					{

						echo "<td>".($total2 /$tot*100)."%</td>";
					}
					if ($recorridocat['id_categoria']==3 ) //condicion para porcentaje
					{

						echo "<td>".($total3 /$tot*100)."%</td>";
					}
					if ($recorridocat['id_categoria']==4 ) //condicion para porcentaje
					{

						echo "<td>".($total4 /$tot*100)."%</td>";
					}

					if ($recorridocat['id_categoria']==5 ) //condicion para porcentaje
					{

						echo "<td>".($total5 /$tot*100)."%</td>";
					}

					if ($recorridocat['id_categoria']==6 ) //condicion para porcentaje
					{

						echo "<td>".($total6 /$tot*100)."%</td>";
					}

					if ($recorridocat['id_categoria']==7 ) //condicion para porcentaje
					{

						echo "<td>".($total7 /$tot*100)."%</td>";
					}

					if ($recorridocat['id_categoria']==8 ) //condicion para porcentaje
					{

						echo "<td>".($total8 /$tot*100)."%</td>";
					}

					if ($recorridocat['id_categoria']==9 ) //condicion para porcentaje
					{

						echo "<td>".($total9 /$tot*100)."%</td>";
						echo "<td>".($total/168*100)."%</td>";
					}

						
				unset($tot);
			
					}// consulta categorias 
				echo "</tr>"; 

			}/// consulta departamentos 
?>



</table>

</section>


	</body>
</html>
