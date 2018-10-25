<?php
	include("serverDb.php");
	include("arrayConexion.php");

	$serverName = name();
	$connectionInfo = ac();

	$con = sqlsrv_connect($serverName, $connectionInfo); 

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];

	echo $nombre;
	echo $apellido;

	$sql = "INSERT INTO USERS (NOMBRE, APELLIDO)
	VALUES ('".$nombre."', '".$apellido."')";

	$params = array();

  	$options = array('Scrollable' => SQLSRV_CURSOR_KEYSET);

	$stmt = sqlsrv_query($con, $sql, $params, $options);
?>