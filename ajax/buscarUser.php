<?php
    session_start();
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header

	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>ID</th>
							<th>Nombre(s)</th>
							<th>Apellidos</th>
							<th>Puntaje obtenido</th>
							<th>Diagnóstico</th>
						</tr>';

    include("db_connection.php");
	$query = "SELECT * FROM usuario WHERE apellidos='".$_SESSION["apellido"]."' AND nombres='".$_SESSION["nombre"]."'";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['nombres'].'</td>
				<td>'.$row['apellidos'].'</td>
				<td>'.$row['puntaje'].'</td>
				<td>'.$row['resultado'].'</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">No hay registros!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>