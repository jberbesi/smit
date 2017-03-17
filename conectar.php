<?php
	function abrirConexion ()
	{
		include 'config/database.php';		
		$cnx = mysql_connect($host, $user, $pass);
		if (!$cnx) {
    		die('No pudo conectarse: ' . mysql_error());
		}
		$bd_seleccionada = mysql_select_db($db, $cnx);
		if (!$bd_seleccionada) {
    		die ('No se puede usar foo : ' . mysql_error());
		}
		else
		{
			return $cnx;
		}
	}
	
	function valido_password ($usu, $pass)
	{
		$cnx = abrirConexion();
		$consulta = "SELECT * FROM usuarios WHERE login='" . $usu . "' AND clave='" . $pass . "'";
		$resultado = mysql_query($consulta, $cnx);
		if (!$resultado) {
    		echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    		exit;
		}
		$fila = mysql_fetch_row($resultado);
    	if ($fila!=0)
		{
			$_SESSION['usuario'] = $fila[0];
			$_SESSION['usuarioNombre'] = $fila[i]." ".$fila[2];
		}
		return ($fila!=0);
	}

function consultar($clave,$conec)
{
	$cnx = abrirConexion ();
	$consulta="SELECT codigo from codigo where codigo =".$clave;
	$resultado=pg_query($cnx,$consulta) or die (pg_last_error());
	$num = pg_num_rows($resultado);
	return $num;
	pg_close($cnx);
}

function insertar($clave,$conec,$tabla)
{	
	$consulta="INSERT INTO ".$tabla." VALUES (".$clave.",now())";
	$resultado=pg_query($cnx,$consulta) or die (pg_last_error());
	pg_close($cnx);
}

function eliminar($clave,$conec)
{
	if ($clave=='uno')
	{
		$consulta="DELETE FROM codigo WHERE (tiempo <(now() - interval '20 seconds'))";
	}
	else
	{
		$consulta="DELETE FROM codigo WHERE (codigo = ".$clave.")";
	}
	pg_query($cnx,$consulta) or die (pg_last_error());
	pg_close($cnx);
}
?>