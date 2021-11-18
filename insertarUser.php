<?php
	if(isset($_SESSION["nombre"]) && isset($_SESSION["apellido"]) && isset($_SESSION["total"]) && isset($_SESSION["resultado"]))
	{
		// include Database connection file 
		include("ajax/db_connection.php");

		// get values 
		$nombres = $_SESSION["nombre"];
		$apellidos = $_SESSION["apellido"];
        $puntaje = $_SESSION["total"];
		$resultado = $_SESSION["resultado"];

		$query = "INSERT INTO usuario(nombres, apellidos, puntaje, resultado) VALUES('$nombres', '$apellidos', '$puntaje', '$resultado')";
        
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "¡Registro Exitoso!";
	}
?>