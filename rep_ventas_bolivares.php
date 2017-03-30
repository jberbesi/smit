<?php 
	include 'conectar.php';
	$query = ventas_bolivares($_GET['codigo'],$_GET['mes'],$_GET['ano']);
	while ($row = $query->fetch_assoc())
    	{
    		$nombre = nombre_vendedor($row['codigo_vendedor']);
    		echo $nombre;
    		echo " ";
        	echo $row['suma'];
        	echo "<br>";
    	}
?>