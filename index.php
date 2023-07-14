<?php
///// INCLUIR LA CONEXIÓN A LA BD /////////////////
include('conexion.php');
///// CONSULTA A LA BASE DE DATOS /////////////////

?>

<html lang="es">
	<head>
		<title>Descargar Reportes </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<header><h1>Eige departamento</h1>
		</header>
<div class="container">



<div class="form-group col-md-2">

	<label for="cmbDowload">General Departamentos</label>
	<a type="submit" class="btn btn-primary" href="general.php">Buscar</a>

</div>
<div class="form-group col-md-2">

	<label for="cmbDowload">General direcciones </label>
	<a type="submit" class="btn btn-primary" href="direcciones.php">Buscar</a>

</div>


<div class="form-group col-md-2">
<form action="departamento.php" method="POST" >				
	<label for="cmbDowload">Departamento</label>
 <select id="idDepa" name="idDepa" class="form-control" >
	 <option value="">Seleccione...</option>
	 <option value="1">DIRECCIÓN OPERATIVA</option>
	 <option value="2">MANTENIMIENTO</option>
	 <option value="3">ALMACÉN</option>
	 <option value="4">DIRECCIÓN DE LOGÍSTICA</option>
	 <option value="5">MEDIO AMBIENTE, SUSTENTABILIDAD Y SEGURIDAD</option>
	 <option value="6">OPERADORES</option>
	 <option value="7">SISTEMAS</option>
	 <option value="8">DIR. DE EDUCACIÓN PARA LA CONSERVACIÓN</option>
	 <option value="9">TRACKER</option>
	 <option value="10">JARDÍN BOTÁNICO</option>
	 <option value="11">GUÍAS</option>
	 <option value="12">DEMOSTRACIÓN DE ANIMALES.</option>
	 <option value="13">DIR. DE FINANZAS Y ADMON.</option>
	 <option value="14">CONTABILIDAD</option>
	 <option value="15">CAJA GENERAL</option>
	 <option value="16">COMPRAS</option>
	 <option value="17">ELEFANTES</option>
	 <option value="18">VETERINARIA</option>
	 <option value="19">DIRECCIÓN DE DESARROLLO</option>
	 <option value="20">RECURSOS HUMANOS</option>
	 <option value="21">SERVICIO MÉDICO</option>
	 <option value="22">CALIDAD</option>
	 <option value="23">GERENCIA DE TIENDAS</option>
	 <option value="24">ZONA DE AVENTURAS</option>
	 <option value="25">ZONA AUSTRALIANA</option>
	 <option value="26">M60</option>
	 <option value="27">H80</option>
	 <option value="28">DISEÑO Y PRODUCCIÓN DE SOUVENIRS</option>
	 <option value="29">VENTAS PUEBLA</option>
	 <option value="30">VENTAS MÉXICO</option>
	 <option value="31">GERENCIA DE ARTE Y DISEÑO</option>
	 <option value="32">DIRECCIÓN GENERAL</option>
	 <option value="33">RELACIONES PÚBLICAS</option>
	 <option value="34">MARIPOSARIO</option>
	 <option value="35">DK</option>
	 <option value="36">GERENCIA DE PROYECTOS</option>
	 <option value="37">REGISTROS</option>
	 <option value="38">MAMÍFEROS</option>
	 <option value="39">HORTICULTURA</option>
	 <option value="40">NUTRICIÓN</option>
	 <option value="41">AVES</option>
	 <option value="42">REPTILES Y ANFIBIOS</option>
</select> 
<br>
<button type="submit" class="btn btn-primary">Buscar</button>
	</form>	
</div>
</div>
	</body>
</html>


