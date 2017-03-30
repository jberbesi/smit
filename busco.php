<?php 
	include 'conectar.php';
	echo json_encode(autocompletar($_GET['term']));
?>