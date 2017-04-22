# phpSFTP
incluye librerias necesarias de php para windows

#configuracion config.php
$config=
[
	"prueba"=> // nombre de la conexion. Debe ser unico
		[
			"host" =>"server.com",//nombre de dominio del servidor o direccion IP
			"usuario" => "root",
			"password" => "123",
			"puerto" => 22,
			"raiz" => "C:\\xampp\\htdocs\\phpSFTP\\", //Direcctorio local
			"eliminar" => true // mantiene o elimina los archivos despues de una carga excitosa
		],
];
