<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $puntaje = $_POST['puntaje'];
    $resultado = $_POST['resultado'];
	//$sapepat=$_POST['sapepat'];

    // Updaste User details
    $query = "UPDATE usuario SET id='$id', nombres='$nombres', apellidos='$apellidos', puntaje='$puntaje', resultado='$resultado' WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}