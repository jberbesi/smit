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
			$sql = "SELECT codigo_vendedor, SUM(monto_bs) AS suma FROM montos WHERE mes=".$mes." AND ano=".$ano." GROUP BY codigo_vendedor";
		}
		else
		{
			$sql = "SELECT codigo_vendedor, monto_bs AS suma FROM montos WHERE codigo_vendedor='".$codigo."' AND mes=".$mes." AND ano=".$ano;
		}
		//echo $sql;
		$query = $cnx->query($sql);
		return ($query);
	}

	function ventas_unidades($codigo,$mes,$ano,$vendedor)
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

	function devoluciones_bolivares($codigo,$mes,$ano,$vendedor)
	{
		$cnx = abrirConexioni();
		if ($vendedor === "")
		{
			$sql = "SELECT codigo_vendedor, SUM(devolucion) AS suma FROM montos WHERE mes=".$mes." AND ano=".$ano." GROUP BY codigo_vendedor";
		}
		else
		{
			$sql = "SELECT codigo_vendedor, devolucion AS suma FROM montos WHERE codigo_vendedor='".$codigo."' AND mes=".$mes." AND ano=".$ano;
		}
		//echo $sql;
		$query = $cnx->query($sql);
		return ($query);
	}

	function buscar_vendedor($codigo,$vendedor)
	{
		$cnx = abrirConexioni();
		if ($vendedor === "")
		{
			$sql = "SELECT codigo, nombre, apellido FROM vendedor";
		}
		else
		{
			$sql = "SELECT codigo, nombre, apellido FROM vendedor WHERE codigo='".$codigo."'";
		}
		//echo $sql;
		$query = $cnx->query($sql);
		return ($query);
	}

	function cotizaciones_vendedor($codigo,$mes,$ano,$vendedor)
	{
		$cnx = abrirConexioni();
		$sql = "SELECT codigo, monto, fecha_emision, status FROM cotizaciones WHERE codigo_vendedor='".$codigo."' AND MONTH(fecha_entrega)=".$mes." AND YEAR(fecha_entrega)=".$ano." ORDER BY fecha_emision";
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
?>