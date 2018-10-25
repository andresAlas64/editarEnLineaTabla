<?php
	include("serverDb.php");
	include("arrayConexion.php");

	$serverName = name();
	$connectionInfo = ac();

	$con = sqlsrv_connect($serverName, $connectionInfo); 

	$id = $_POST['id'];

	$sql = "DELETE FROM USERS 
	WHERE ID_USERS LIKE ".$id."";	

	$params = array();

  	$options = array('Scrollable' => SQLSRV_CURSOR_KEYSET);

	$stmt = sqlsrv_query($con, $sql, $params, $options);
?>