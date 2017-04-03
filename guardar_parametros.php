<?php
	include 'conectar.php';
	$cotizacion 	= $_POST['cotizaciones'];
	$unidades 		= $_POST['unidades'];
	$bolivares 		= $_POST['bolivares'];
	$devoluciones 	= $_POST['devoluciones'];
	modificar_parametros($cotizacion,$unidades,$bolivares,$devoluciones);
	header('Location: parametros.php');
?>