<?php
// include Database connection file
include("ajax/db_connection.php");

// check request
if(isset($_SESSION))
{
    // get values
    $puntaje = $_SESSION["total"];
    $resultado = $_SESSION["resultado"];
	//$sapepat=$_POST['sapepat'];

    // Updaste User details
    $query = "UPDATE usuario SET puntaje='$puntaje', resultado='$resultado' WHERE nombres='".$_SESSION["nombre"]."' AND apellidos='".$_SESSION["apellido"]."'" ;
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
?>