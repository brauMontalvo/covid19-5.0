<?php    include_once("encabezado.php");

$mysql = new mysqli("localhost:3306", "root", "", "covid19");

$Query = "update usuario set nombres = '".$_POST["Nombres"]."', apellidos = '".$_POST["Apellidos"]."', puntaje = ".$_POST["Puntaje"]." , resultado = '".$_POST["Resultado"]."' WHERE id=".$_GET["id"].";";
$Result = $mysql->query( $Query );

if($Result!=null){
   	print("<h1> Se actualizo con éxito el registro. </h1>");
    print("<CENTER> <form action='verUsers.php'> <input type=submit value='Regresar'> </form> </CENTER>"); }
else
  	print("<h1> No se pudo actualizar </h1>");

?>
