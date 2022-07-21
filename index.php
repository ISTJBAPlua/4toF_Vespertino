<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>4to Vespertino</title>
</head>
<body> 
 	    <div> 
 	        <form action="recibe.php" method="POST"> 
 	            <label>Nombre:</label> 
 	            <input type="text" name="nombre" id="nombre_txt"> 
 	            <label>Fecha de nacimiento:</label> 
 	            <input type="date" name="fecha" id="fecha_dt"> 
 	            <label>Sueldo:</label> 
 	            <input type="text" name="sueldo" id="sueldo_txt"> 
 	            <label>Horas trabajadas:</label> 
 	            <input type="text" name="horas" id="horas_txt"> 
 	            <label>Rol en la empresa:</label> 
 	            <select name="rol" id="rol_cmb"> 
 	                <option value="0">Seleccione una opcion</option> 
 	                <option value="1">Gerente</option> 
 	                <option value="2">Administrador</option> 
 	                <option value="3">Cajero</option> 

 	            </select> 
 	            <input type="submit" name="submit" id="submit_btn" onclick="ajaxCaptura();" value="Guardar datos"> 
 	        </form> 
 	        <div id="presentaTabla"></div> 
 	    </div> 
 	</body> 
 
 	 
</html> 
 
 	 
<script src="./js/jquery-3.6.0.min.js"></script> 
 	<script> 
 	    function ajaxCaptura() { 
 	        var nombre = $('#nombre_txt').val(); 
 	        var fecha = $('#fecha_dt').val(); 
 	        var sueldo = $('#sueldo_txt').val(); 
 	        var horas = $('#horas_txt').val(); 
 	        var rol = $('#rol_cmb').val(); 
 	        if (rol != 0) { 
 	            $.ajax({ 
 	                type: "POST", 
 	                url: "recibir.php", 
 	                data: { 
 	                    nombre_p: nombre, 
 	                    fecha_p: fecha, 
 	                    sueldo_p: sueldo, 
 	                    horas_p: horas, 
 	                    rol_p: rol 
 	                }, 
 	                success: function(data) { 
 	                    $('#presentaTabla').html(data); 
 	                } 
 	            }); 
 	        } else { 
 	            alert("Asegurese de seleccionar una opcion!"); 
 	        } 
 
 	 
    } 
 
 	 
    function captura() { 
 	        const fechaActual = new Date(); 
 	        var anioActual = fechaActual.getFullYear(); 
 	        var mesActual = fechaActual.getMonth() + 1; 
 	        var diaActual = fechaActual.getDate(); 
 	        var nombre = $('#nombre_txt').val(); 
 	        var fecha = $('#fecha_dt').val(); 
 	        var sueldo = $('#sueldo_txt').val(); 
 	        var horas = $('#horas_txt').val(); 
 	        var rol = $('#rol_cmb').val(); 
 	        var nombreRol = ''; 
 	        var sueldoPorHoras = 0.0; 
 	        var sueldoNeto = 0.0; 
 	        var edad = 0; 
 	        var anio = fecha.substring(0, 4); 
 	        var mes = fecha.substring(5, 7); 
 	        var dia = fecha.substring(8, 10); 
 	        var sueldoConvertido = parseFloat(sueldo); 
 
 	 
        if (mes > mesActual) { 
 	            edad = anioActual - anio - 1; 
 	        } else { 
 	            if (mesActual == mes && dia > diaActual) { 
 	                edad = anioActual - anio - 1; 
 	            } else { 
 	                edad = anioActual - anio; 
 	            } z• 	        } 
 
 	 
        if (rol != 0) { 
 	            if (rol == 1) { 
 	                nombreRol = 'Gerente'; 
 	                sueldoPorHoras = horas * 10; 
 	                sueldoNeto = sueldoConvertido + sueldoPorHoras; 
 	            } else if (rol == 2) { 
 	                nombreRol = 'Administrador'; 
 	                sueldoPorHoras = horas * 5; 
 	                sueldoNeto = sueldoConvertido + sueldoPorHoras; 
 	            } else if (rol == 3) { 
 	                nombreRol = "Cajero" 
 	                sueldoPorHoras = horas * 2.5; 
 	                sueldoNeto = sueldoConvertido + sueldoPorHoras; 
 	            } 
 	            if (edad < 18) { 
 	                alert("No dispone de la edad permitida para trabajar en la empresa"); 
 	            } else { 
 	                alert("Nombre: " + nombre + 
 	                    " Edad: " + edad + 
 	                    " Rol: " + nombreRol + 
 	                    " Sueldo Neto: " + sueldoNeto + "$"); 
 	            } 
 	        } else { 
 	            alert("Asegurese de seleccionar una opcion!"); 
 	        } 
 	    } 
 	</script>