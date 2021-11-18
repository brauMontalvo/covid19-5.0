<?php
    include_once("encabezado.php");
    include_once("menu.php");
?>

<h1>USUARIOS REGISTRADOS<br></h1>

<?php
    $mysql = new mysqli("localhost:3306", "root", "", "covid19");
    $Query = "select * from usuario";
    $Result = $mysql->query( $Query );
    $numeroRegistros=$Result->num_rows;
    if($numeroRegistros<=0) 
    { 
     echo "<div align='center'>"; 
     echo "<h2>No se encontraron resultados</h2>"; 
     echo "</div><hr> "; 
    }else{
        ?>

    <center><table id="aldair" border=1>
        <tr>
		<td><strong> ID</strong></td>
        <td><strong> Nombre(s)</strong></td>
		<td><strong> Apellido</strong></td>
		<td><strong> Puntaje</strong></td>
		<td><strong> Resultado</strong></td>
		</tr>

        <?php
        $i = 0;
        while($row =$Result->fetch_array()) {
        $idE = $row["id"];    
        
    ?>
    
        <tr>
        <td> <?php printf($row["id"]); ?></td>
        <td> <?php printf($row["nombres"]); ?></td>
        <td> <?php printf($row["apellidos"]); ?></td>
        <td> <?php printf($row["puntaje"]); ?></td>
        <td> <?php printf($row["resultado"]); ?></td>
        <td>
            <form action= "actualizarUser.php?id=<?php print($idE);?>" method="POST"> 
                    <input type ="submit" value="Actualizar"> 
            </form>
            <form action= "borrarUser.php?id=<?php print($idE);?>" method="POST"> 
                    <input type ="submit" value="Eliminar"> 
        </form>
        </td>
    </tr>
    <?php	}
    }
    ?>
</table></center><br><br>