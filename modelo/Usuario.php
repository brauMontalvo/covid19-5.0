<?php
/*************************************************************/
/* Usuario.php
 * Objetivo: clase que encapsula el manejo de la entidad Usuario
 * Autor: BAOZ
 *************************************************************/
error_reporting(E_ALL);
include_once("AccesoDatos.php");

class Usuario{
/*En este caso los atributos son protegidos (en lugar de privados)
  para utilizarlos en la herencia*/
protected $sCveUsu="";
protected $sNombre="";
protected $sApePat="";
protected $sApeMat="";
protected $sContrasenia="";
   
   function setClave($psCveUsu){
       $this->sCveUsu = $psCveUsu;
   }
   
   function getClave(){
       return $this->sCveUsu;
   }
   
   function setNombre($psNombre){
       $this->sNombre = $psNombre;
   }
   
   function getNombre(){
       return $this->sNombre;
   }
   
   function setApePat($psApePat){
       $this->sApePat = $psApePat;
   }
   
   function getApePat(){
       return $this->sApePat;
   }
   
   function setApeMat($psApeMat){
       $this->sApeMat = $psApeMat;
   }
   
   function getApeMat(){
       return $this->sApeMat;
   }
   
   function setPwd($psContrasenia){
       $this->sContrasenia = $psContrasenia;
   }
   
   function getPwd(){
       return $this->sContrasenia;
   }
   
	/*Busca por clave y contraseña, regresa verdadero si lo encontró*/
	function buscarCvePwd(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$bRet = false;
	    error_log($this->sCveUsu." ".$this->sContrasenia,0);
		if ($this->sCveUsu==null|| $this->sCveUsu=="" ||$this->sContrasenia == "")
			throw new Exception("Usuario->buscarCvePwd(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "SELECT sNombre, sApePat, sApeMat 
					FROM administrador
					WHERE sCveUsuario = '".$this->sCveUsu."'
					AND sContrasenia = '".$this->sContrasenia."'";
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
				error_log($sQuery,0);
				$oAccesoDatos->desconectar();
				if ($arrRS){
					$this->sNombre = $arrRS[0][0];
					$this->sApePat = $arrRS[0][1];
					$this->sApeMat = $arrRS[0][2];
					$bRet = true;
				}
			} 
		}
		return $bRet;
	}
   
	/*Busca por clave, regresa verdadero si lo encontró*/
	function buscar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$bRet = false;
		if ($this->sCveUsu=="")
			throw new Exception("Usuario->buscar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "SELECT sNombre, sApePaterno, sApeMaterno, sContrasenia 
					FROM administrador
					WHERE sCveUsuario = ".$this->sCveUsu;
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
				$oAccesoDatos->desconectar();
				if ($arrRS){
					$this->sNombre = $arrRS[0][0];
					$this->sApePat = $arrRS[0][1];
					$this->sApeMat = $arrRS[0][2];
					$this->sContrasenia = $arrRS[0][3];
					$bRet = true;
				}
			} 
		}
		return $bRet;
	}
 }
 ?>