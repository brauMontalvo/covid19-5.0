<?php    include_once("encabezado.php");

$mysql = new mysqli("localhost:3306", "root", "", "covid19");
$Query = "delete from usuario WHERE id=".$_GET["id"].";";
$Result = $mysql->query( $Query );

if($Result!=null){
   	print("<h1> Teaster eliminado con exito. </h1>");
    print("<CENTER> <form action='verUsers.php'> <input type=submit value='Regresar'> </form> </CENTER>"); }
else
  	print("<h1> No se pudo eliminar, verificar la base de datos </h1>");

?>
