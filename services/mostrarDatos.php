<?php
	include("serverDb.php");
	include("arrayConexion.php");

	$serverName = name();
	$connectionInfo = ac();

	$con = sqlsrv_connect($serverName, $connectionInfo); 

	$sql = "SELECT ID_USERS, NOMBRE, APELLIDO FROM USERS";

	$params = array();

  	$options = array('Scrollable' => SQLSRV_CURSOR_KEYSET);

	$stmt = sqlsrv_query($con, $sql, $params, $options);

	echo "<table>
    <thead>
      	<tr> 
        	<th>Id</th>
        	<th>Nombre</th>
        	<th>Apellido</th>
         	<th></th>
      	</tr>
    </thead>
    <tbody>";
    while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
      echo "<tr>
        <td>".$fila['ID_USERS']."</td>
       	<td id='nombre_usuario' data-id_usuario='".$fila['ID_USERS']."' contenteditable>".$fila['NOMBRE']."</td>
       	<td id='apellido_usuario' data-id_apellido='".$fila['ID_USERS']."' contenteditable>".$fila['APELLIDO']."</td>
       	<td class='centrado'><button id='eliminar' data-id='".$fila['ID_USERS']."'><i class='far fa-trash-alt'></i> Eliminar</button></td>
      </tr>";
    }

    echo "<tr>
    	<td></td>
    	<td id='nombre_add' contenteditable></td>
    	<td id='apellido_add' contenteditable></td>
    	<td class='centrado'><button id='add' style='margin: 0 auto;'><i class='fas fa-plus'></i> Agregar</button></td>
    </tr>";

   	echo "</tbody></table>";
?>