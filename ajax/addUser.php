<?php
	if(isset($_POST['id']) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['puntaje']) && isset($_POST['resultado']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$id = $_POST['id'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
        $puntaje = $_POST['puntaje'];
		$resultado = $_POST['resultado'];
		

		$query = "INSERT INTO usuario(id, nombres, apellidos, puntaje, resultado) VALUES('$id', '$nombres', '$apellidos', '$puntaje', '$resultado')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "¡Registro Exitoso!";
	}
?>