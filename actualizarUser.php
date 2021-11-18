<?php    include_once("encabezado.php");?>
<h1>ACTUALIZACIÓN DE TEASTER<br></h1>

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
        $row =$Result->fetch_array() 
    ?>

    <center>
    <form action="actualizandoUser.php?id=<?php print($_GET['id'])?>" method="POST">
    <table id="aldair" border=1>
            <tr> <td><strong> Nombre(s)</strong></td> <td> <input type="text" size=40 name="Nombres" value="<?php print($row['nombres']) ?>"> </td> </tr>
            <tr> <td><strong> Apellidos</strong></td> <td> <input type="text" size=40 name="Apellidos" value="<?php print($row['apellidos']) ?>"> </td> </tr>
            <tr> <td><strong> Puntaje</strong></td> <td> <input type="text" size=40 name="Puntaje" value="<?php print($row['puntaje']) ?>"> </td> </tr>
            <tr> <td><strong> Resultado</strong></td> <td> <input type="text" size=40 name="Resultado" value="<?php print($row['resultado']) ?>"> </td> </tr>

        <?php	} ?>
    </table>
    <input type=submit value="Actualizar" >
    </form>
    </center><br><br>