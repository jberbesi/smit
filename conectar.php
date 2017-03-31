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
	
	function abrirConexioni ()
	{
		include 'config/database.php';		
		$cnx = mysql_connect();
		$cnx = new mysqli($host, $user, $pass, $db);
		return $cnx;
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
			$_SESSION['usuarioNombre'] = $fila[1]." ".$fila[2];
		}
		return ($fila!=0);
	}

	function autocompletar($searchTerm)
	{
    	$cnx = abrirConexioni();
		$query = $cnx->query("SELECT * FROM vendedor WHERE nombre LIKE '%".$searchTerm."%' OR apellido LIKE '%".$searchTerm."%' ORDER BY nombre ASC");
    	while ($row = $query->fetch_assoc())
    	{
        	$data[]=  array("value" => $row['nombre']." ".$row['apellido'], "idnumber" => $row['codigo']);
    	}
    	return($data);
	}

	function ventas_bolivares($codigo,$mes,$ano,$vendedor)
	{
		$cnx = abrirConexioni();
		if ($vendedor === "")
		{
			$sql = "SELECT codigo_vendedor, SUM(monto) AS suma, SUM(cant_prodd) AS cantidad FROM cotizaciones WHERE status = 1 AND MONTH(fecha_entrega)=".$mes." AND YEAR(fecha_entrega)=".$ano." GROUP BY codigo_vendedor";
		}
		else
		{
			$sql = "SELECT codigo, codigo_vendedor, monto AS suma, cant_prodd AS cantidad, fecha_entrega FROM cotizaciones WHERE codigo_vendedor='".$codigo."' AND status = 1 AND MONTH(fecha_entrega)=".$mes." AND YEAR(fecha_entrega)=".$ano;
		}
		$query = $cnx->query($sql);
		return ($query);
	}

	function nombre_vendedor($codigo_vendedor)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("SELECT nombre, apellido FROM vendedor WHERE codigo ='".$codigo_vendedor."'");
		$row = $query->fetch_assoc();
		$nombre = $row['nombre']." ".$row['apellido'];
		return ($nombre);
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