<?php 
	include 'conectar.php';
	echo json_encode(autocompletarU($_GET['term']));
?>