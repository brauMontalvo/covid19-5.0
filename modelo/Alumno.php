<?php

error_reporting(E_ALL);
include_once("AccesoDatos.php");
include_once("Usuario.php");


//Alumno es un tipo especial de Usuario (herencia)
class Alumno extends Usuario{
//Sólo define los atributos propios; la clave, el nombre y el pwd los hereda

private $nnumcontrol=0;
private $ncvecarrera=0;
private $nsemestre=0;	

   
	function setNumControl($pnValor){
       $this->nnumcontrol = $pnValor;
	}
   
	function getNumControl(){
       return $this->nnumcontrol;
	}
   
	function setCveCarrera($pnValor){
       $this->ncvecarrera = $pnValor;
	}
   
	function getCveCarrera(){
       return $this->ncvecarrera;
	}
   
   function setSemestre($pnValor){
       $this->nsemestre = $pnValor;
	}
   
	function getSemestre(){
       return $this->nsemestre;
	}
}
?>