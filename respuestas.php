<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script> 
<?php
    session_start();
    require_once("operaciones.php");

    $obj=new operaciones();
    
    $nombre=$obj->setNombre($_POST["nombre"]);
    $apellido=$obj -> setApellido($_POST["apellidos"]);
    $tos=$obj -> setTos($_POST["tos"]);
    $garganta=$obj -> setGarganta($_POST["garganta"]);
    $escalofrios=$obj -> setEscalofrios($_POST["escalofrios"]);
    $estomago=$obj -> setEstomago($_POST["estomago"]);
    $corporal=$obj -> setCorporal($_POST["corporal"]);
    $fiebre=$obj -> setFiebre($_POST["fiebre"]);
    $respirar=$obj -> setRespirar($_POST["respirar"]);
    $nasal=$obj -> setNasal($_POST["nasal"]);
    $ojos=$obj -> setOjos($_POST["ojos"]);
    $dolorCabeza=$obj -> setDolorCabeza($_POST['dolorCabeza']);
    $olfato=$obj -> setOlfato($_POST['olfato']);
    $respirarr=$obj -> setRespirarr($_POST['respirarr']);
    $cansancio=$obj -> setCansancio($_POST['cansancio']);
    $mensaje1=$obj -> setMensaje1($_POST["mensaje1"]);
    $mensaje2=$obj -> setMensaje2($_POST["mensaje2"]);
    $mensaje3=$obj -> setMensaje3($_POST["mensaje3"]);


    $total=0;
    $resultado="";

    if($obj->getTos() == "si"){ $total+=5; } else if($obj->getTos() == "no"){ $total+=0; }else { $total+=0; }
    if($obj->getGarganta() == "si"){ $total+=5; } else if($obj->getGarganta() == "no"){ $total+=0; } else { $total+=0; }
    if($obj->getEscalofrios() == "si"){ $total+=5; } else if($obj->getEscalofrios() == "no"){ $total+=0; } else { $total+=0; }
    if($obj->getEstomago() == "si"){ $total+=5; } else if($obj->getEstomago() == "no"){ $total+=0; } else { $total+=0; }
    if($obj->getCorporal() == "si"){ $total+=5; } else if($obj->getCorporal() == "no"){ $total+=0; } else { $total+=0; }
    if($obj->getFiebre() == "si"){ $total+=5; } else if($obj->getFiebre() == "no"){ $total+=0; } else { $total+=0; }
    if($obj->getRespirar() == "si"){ $total+=5; } else if($obj->getRespirar() == "no"){ $total+=0; } else { $total+=0; }
    if($obj->getNasal() == "si"){ $total+=5; } else if($obj->getNasal() == "no"){ $total+=0; } else { $total+=0; }
    if($obj->getOjos() == "si"){ $total+=5; } else if($obj->getOjos() == "no"){ $total+=0; } else { $total+=0; }

    if(isset($_POST['dolorCabeza'])){
        $var = $_POST['dolorCabeza'];
        if($var == "Si"){ 
            $total+=5;
        } else if($var == "Mas o menos"){
             $total+=3; 
        }else if ($var == "No"){ 
            $total+=0;
        }
    }

    if(isset($_POST['olfato'])){
        $var = $_POST['olfato'];
        if($var == "Si"){ 
            $total+=5;
        } else if($var == "Mas o menos"){
             $total+=3; 
        }else if ($var == "No"){ 
            $total+=0;
        }
    }

    if(isset($_POST['respirarr'])){
        $var = $_POST['respirarr'];
        if($var == "Si"){ 
            $total+=5;
        } else if($var == "Mas o menos"){
             $total+=3; 
        }else if ($var == "No"){ 
            $total+=0;
        }
    }

    if(isset($_POST['cansancio'])){
        $var = $_POST['cansancio'];
        if($var == "Si"){ 
            $total+=5;
        } else if($var == "Mas o menos"){
             $total+=3; 
        }else if ($var == "No"){ 
            $total+=0;
        }
    }
       
    if($total>=51 && $total<=65){
        $resultado="POSITIVO";
    }
    else if($total>=31 && $total<=50){
        $resultado="PROBABLEMENTE POSITIVO";
    }else if($total>=0 && $total<=30){
        $resultado="NEGATIVO";
    }

    $_SESSION["total"] = $total;
    $_SESSION["resultado"] = $resultado;
    $_SESSION["nombre"] = $obj->getNombre();
    $_SESSION["apellido"] = $obj->getApellido();

    $_SESSION["mensaje1"] = $obj->getMensaje1();
    $_SESSION["mensaje2"] = $obj->getMensaje2();
    $_SESSION["mensaje3"] = $obj->getMensaje3();

    if(isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["apellidos"]) && !empty($_POST["apellidos"])) {
        $con=mysqli_connect("localhost","root","","covid19");

        $dato1 = mysqli_query($con,"SELECT nombres FROM usuario WHERE nombres= '".$_POST["nombre"]."'");
        $duplicado1 = mysqli_num_rows($dato1);

        $dato2 = mysqli_query($con,"SELECT apellidos FROM usuario WHERE apellidos= '".$_POST["apellidos"]."'");
        $duplicado2 = mysqli_num_rows($dato2);

        if($duplicado1==0 && $duplicado2==0){
            //Quiere decir que no se encontró un item igual a la del input entonces inserta
            mysqli_query($con, "INSERT INTO usuarios(nombres, apellidos, puntaje, resultado) VALUES ('.$nombre.', '$apellido', '$total', '$resultado')");

            include_once("insertarUser.php");
 
            }else{
                include_once("actualizarDatos.php");
            }   
    }

    include_once("resultado.php");
?>