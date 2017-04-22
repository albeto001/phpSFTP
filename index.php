<?php
include_once("conexion.php");
include_once("config.php");

//error_reporting(0);

foreach ($config as $key => $value) {
	$conexion= new conexionSFTP($value['host'],$value['puerto'],$value['usuario'],$value['password']);
	$con = $conexion->conectar();

	if($con == 1){
		$dir = opendir($value['raiz']);
		while($current = readdir($dir)){
			if(strtoupper(substr($current, strlen($current) - 4)) == ".TXT"){
				$res = $conexion->put_contents($current,file_get_contents($value['raiz'] . $current));
				if($res == 1 && $value['eliminar']){
					unlink($value['raiz'].$current);
				}
				if($res != 1){
					print " [" . date("Y-m-d H:i:s") . "] Error al subir el archivo $current >>>\r\n";
				}
			}
		}
	}
	else{
		print " [" . date("Y-m-d H:i:s") . "] Error de conexion a " . $value['host'] ." >>> \r\n";
	}
}
