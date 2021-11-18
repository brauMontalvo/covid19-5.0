<!DOCTYPE html>
<html id="fondo">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Hotel El Bosque">
    <meta name="keywords" content="hotel">
    <meta http‐equiv="refresh" content="20;URL=./2PantillaBasica.htm" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloEquBlog.css?1.0" media="all" >
    <link rel="stylesheet" href="css/login.css?1.0" media="all"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script> 

</head>
<body>
<h1 class="animate__animated animate__backInLeft">Información sobre el COVID-19</h1>
<ul>
  <li><a href="index.html">Inicio</a></li>
  <li><a href="covid.html"> ¿Qué es el COVID-19? </a></li>
  <li><a href="medidas.html"> Medidas preventivas </a></li>
  <li><a href="test.php" id="selected">¿Tengo o no COVID-19?</a></li>
  <li><a href="hospitales.html">Hospitales en México</a></li>
</ul><br><br>

<form action="continuar.php" method="POST" class="animate__animated animate__backInLeft">
    <h1 class="animate__animated animate__backInLeft">Proporcione los siguientes datos:</h1><br>

    <p>Nombre(s)<input title="Por favor, inserte su nombre o nombres" type="nombre" placeholder="ej, Barry Allen, Bruce Wayne" name="nombre"></p>

    <p>Apellidos<input title="Por favor, inserte sus apellidos" type="apellido" placeholder="ej, Pendragon, Garcia, O'Conner" name="apellidos"></p>

    <input type="submit" value="INGRESAR" class="animate__animated animate__backInLeft">
</form>

</body>
</html>