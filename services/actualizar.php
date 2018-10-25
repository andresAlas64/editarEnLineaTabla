<?php
	include("serverDb.php");
	include("arrayConexion.php");

	$serverName = name();
	$connectionInfo = ac();

	$con = sqlsrv_connect($serverName, $connectionInfo); 

	$id = $_POST['id'];
	$texto = $_POST['texto'];
	$columna = $_POST['columna'];

	$sql = "UPDATE USERS SET $columna='".$texto."' 
	WHERE ID_USERS='".$id."'";	

	$params = array();

  	$options = array('Scrollable' => SQLSRV_CURSOR_KEYSET);

	$stmt = sqlsrv_query($con, $sql, $params, $options);
?>