<?php 
 	date_default_timezone_set('America/Guayaquil'); 
 	$nombre = $_POST['nombre_p']; 
 	$fecha = $_POST['fecha_p']; 
 	$sueldo = $_POST['sueldo_p']; 
 	$horas = $_POST['horas_p']; 
 	$rol = $_POST['rol_p']; 
 	$nombreRol = ""; 
 	$sueldoPorHoras = 0.0; 
 	$sueldoNeto = 0.0; 
 	$anio = date('Y', strtotime($fecha)); 
 	$mes = date('m', strtotime($fecha)); 
 	$dia = date('d', strtotime($fecha)); 
 	$anioActual = date('Y'); 
 	$mesActual = date('m'); 
 	$diaActual = date('d'); 
 	$edad = 0; 
 
 	 
if ($mes > $mesActual) { 
 	    $edad = $anioActual - $anio - 1; 
 	} else { 
 	    if ($mesActual == $mes and $dia > $diaActual) { 
 	        $edad = $anioActual - $anio - 1; 
 	    } else { 
 	        $edad = $anioActual - $anio; 
 	    } 
 	} 
 
 	 
if ($edad < 18) { 
 	    // echo "Nombre: " . $nombre; 
 	    // echo "<br>"; 
 	    // echo "Edad: " . $edad; 
 	    // echo "<br>"; 
 	    // echo "No dispone de la edad permitida para trabajar en la empresa"; 
 	?> 
 	    <table border="1"> 
 	        <tr> 
 	            <td>Nombre</td> 
 	            <td>Edad</td> 
 	            <td>Detalles</td> 
 	        </tr> 
 	        <tr> 
 	            <td><?php echo $nombre ?></td> 
 	            <td><?php echo $edad ?></td> 
 	            <td><?php echo "No dispone de la edad permitida para trabajar en la empresa"; ?></td> 
 	        </tr> 

	</table> 
	<?php 
	} else { 
	if ($rol == 1) { 
	$nombreRol = "Gerente"; 
	$sueldoPorHoras = $horas * 10; 
	$sueldoNeto = $sueldo + $sueldoPorHoras; 
	} else if ($rol == 2) { 
	$nombreRol = "Administrador"; 
	$sueldoPorHoras = $horas * 5; 
	$sueldoNeto = $sueldo + $sueldoPorHoras; 
	} else if ($rol == 3) { 
	$nombreRol = "Cajero"; 
	$sueldoPorHoras = $horas * 2.5; 
	$sueldoNeto = $sueldo + $sueldoPorHoras; 
	} 
	// echo "Nombre: " . $nombre; 
	// echo "<br>"; 
	// echo "Edad: " . $edad; 
	// echo "<br>"; 
	// echo "Cargo: " . $nombreRol; 
	// echo "<br>"; 
	// echo "Sueldo ganado por horas: " . $sueldoPorHoras; •     // echo "<br>"; 
	// echo "Sueldo Neto: " . $sueldoNeto . "$"; 
	?> 
	<table border="1"> 
	<tr> 
	<td>Nombre</td> 
	<td>Edad</td> 
	<td>Rol</td> 
	<td>Sueldo Neto</td> 
	</tr> 
	<tr> 
	<td><?php echo $nombre ?></td> 
	<td><?php echo $edad ?></td> 
	<td><?php echo $nombreRol ?></td> 
	<td><?php echo $sueldoNeto ?></td> 
  
	</tr> 
	</table> 
?>