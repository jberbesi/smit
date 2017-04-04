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
		$cnx = new mysqli($host, $user, $pass, $db);
		return $cnx;
	}

	function valido_password ($usu, $pass)
	{
		$cnx = abrirConexion();
		$consulta = "SELECT * FROM usuarios WHERE login='" . $usu . "' AND clave='" . $pass . "' AND status = 1";
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
    	mysqli_close($cnx);
    	return($data);
	}

	function autocompletarU($searchTerm)
	{
    	$cnx = abrirConexioni();
		$query = $cnx->query("SELECT * FROM usuarios WHERE nombre LIKE '%".$searchTerm."%' OR apellido LIKE '%".$searchTerm."%' ORDER BY nombre ASC");
    	while ($row = $query->fetch_assoc())
    	{
        	$data[]=  array("value" => $row['nombre']." ".$row['apellido'], "idnumber" => $row['id']);
    	}
    	mysqli_close($cnx);
    	return($data);
	}

	function parametros()
	{
    	$cnx = abrirConexioni();
		$query = $cnx->query("SELECT * FROM parametros");
		mysqli_close($cnx);
    	return($query);
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
		mysqli_close($cnx);
		return ($query);
	}

	function suma_bolivares($codigo,$mes,$ano)
	{
		$cnx = abrirConexioni();
		$sql = "SELECT SUM(monto_bs) AS suma FROM montos WHERE codigo_vendedor='".$codigo."' AND mes=".$mes." AND ano=".$ano;
		//echo $codigo;
		$query = $cnx->query($sql);
		mysqli_close($cnx);
		return ($query);
	}

	function suma_unidades($codigo,$mes,$ano)
	{
		$cnx = abrirConexioni();
		$sql = "SELECT SUM(cant_prodd) AS suma FROM cotizaciones WHERE codigo_vendedor='".$codigo."' AND status = 1 AND MONTH(fecha_entrega)=".$mes." AND YEAR(fecha_entrega)=".$ano;
		//echo $codigo;
		$query = $cnx->query($sql);
		mysqli_close($cnx);
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
		mysqli_close($cnx);
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
			$sql = "SELECT codigo_vendedor, devolucion AS suma, monto_bs FROM montos WHERE codigo_vendedor='".$codigo."' AND mes=".$mes." AND ano=".$ano;
		}
		//echo $sql;
		$query = $cnx->query($sql);
		mysqli_close($cnx);
		return ($query);
	}

	function buscar_vendedor($codigo,$vendedor,$mes,$ano)
	{
		$cnx = abrirConexioni();
		if ($vendedor === "")
		{
			$sql = "SELECT codigo FROM vendedor WHERE codigo IN (SELECT codigo_vendedor FROM cotizaciones WHERE MONTH(fecha_entrega)=".$mes." AND YEAR(fecha_entrega)=".$ano.")";
		}
		else
		{
			$sql = "SELECT codigo FROM vendedor WHERE codigo='".$codigo."'";
		}
		//echo $sql;
		$query = $cnx->query($sql);
		mysqli_close($cnx);
		return ($query);
	}

	function contar_cotizacion($valor,$mes,$ano,$codigo)
	{
		$cnx = abrirConexioni();
		$sql = "SELECT COUNT( * ) AS cantidad FROM cotizaciones WHERE codigo_vendedor =  '".$codigo."' AND STATUS =".$valor." AND MONTH( fecha_entrega ) =".$mes." AND YEAR( fecha_entrega ) =".$ano;
		//echo $sql;
		$query = $cnx->query($sql);
		mysqli_close($cnx);
		return($query);
	}

	function cotizaciones_vendedor($codigo,$mes,$ano,$vendedor)
	{
		$cnx = abrirConexioni();
		$sql = "SELECT codigo, monto, fecha_emision, status FROM cotizaciones WHERE codigo_vendedor='".$codigo."' AND MONTH(fecha_entrega)=".$mes." AND YEAR(fecha_entrega)=".$ano." ORDER BY fecha_emision";
		$query = $cnx->query($sql);
		mysqli_close($cnx);
		return ($query);
	}

	function nombre_vendedor($codigo_vendedor)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("SELECT nombre, apellido FROM vendedor WHERE codigo ='".$codigo_vendedor."'");
		$row = $query->fetch_assoc();
		$nombre = $row['nombre']." ".$row['apellido'];
		mysqli_close($cnx);
		return ($nombre);
	}

	function modificar_parametros($cotizacion,$unidades,$bolivares,$devoluciones)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("UPDATE parametros SET porcetaje_cotizaciones =".$cotizacion.", ventas_bolibares =".$bolivares.", piezas =".$unidades.", procetanje_devoluciones =".$devoluciones);
		mysqli_close($cnx);
	}

	function verificar_clave($usuario,$clvact)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("SELECT clave FROM usuarios WHERE  id=".$usuario);
		if ($query->num_rows <= 1) 
		{
			$row=$query->fetch_assoc();
			if ($row['clave']==$clvact)
			{
				return(2);
			}
			else
			{
				return(3);
			}
		}
		mysqli_close($cnx);
	}

	function cambiar_clave($usuario,$clnv)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("UPDATE usuarios SET clave ='".$clnv."' WHERE  id=".$usuario);
		mysqli_close($cnx);
	}

	function buscar_usuarios()
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("SELECT * FROM USUARIOS");
		mysqli_close($cnx);
		return ($query);
	}

	function buscar_usuarios_id($usuario)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("SELECT * FROM usuarios WHERE  id=".$usuario);
		mysqli_close($cnx);
		return ($query);
	}

	function id_mayor()
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("SELECT MAX(id) AS id FROM usuarios");
		$row=$query->fetch_assoc();
		$id = $row['id'] + 1;
		mysqli_close($cnx);
		return ($id);
	}

	function perfiles_usuario($id)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("SELECT * FROM perfil WHERE id_usuario =".$id);
		mysqli_close($cnx);
		return ($query);
	}

	function verificar_login($login)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("SELECT * FROM usuarios WHERE  login='".$login."'");
		mysqli_close($cnx);
		if ($query->num_rows > 0) 
		{
			return(true);
		}
		else
		{
			return(false);
		}
		mysqli_close($cnx);
	}

	function insertar_usuario($nombre,$apellido,$login,$password,$estado)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("INSERT INTO usuarios (nombre,apellido,login,clave,status) VALUES ('".$nombre."','".$apellido."','".$login."','".$password."',".$estado.")");
		mysqli_close($cnx);
	}

	function insertar_perfil($id_usuario,$id_perfil)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("INSERT INTO perfil (id_usuario,id_perfil) VALUES (".$id_usuario.",".$id_perfil.")");
		mysqli_close($cnx);
	}

	function verificar_login1($login,$id)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("SELECT * FROM usuarios WHERE  login='".$login."' AND id !=".$id);
		mysqli_close($cnx);
		if ($query->num_rows > 0) 
		{
			return(true);
		}
		else
		{
			return(false);
		}
		mysqli_close($cnx);
	}

	function modificar_usuario($nombre,$apellido,$login,$password,$estado,$id)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("UPDATE usuarios SET nombre='".$nombre."', apellido='".$apellido."', login='".$login."', clave='".$password."', status=".$estado." WHERE id =".$id);
		mysqli_close($cnx);
	}

	function eliminar_perfil($id)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("DELETE FROM perfil WHERE id_usuario =".$id);
		mysqli_close($cnx);
	}


	function validar_seguridad($id_usuario,$perfil)
	{
		$cnx = abrirConexioni();
		$query = $cnx->query("SELECT * FROM perfil WHERE id_usuario=".$id_usuario." AND id_perfil=".$perfil);
		if ($query->num_rows == 0) 
		{ ?>
			<SCRIPT>
				alert ("Usuario no autorizado para ingresar a este modulo!");
				window.location="inicio.html";
			</SCRIPT>
	<?php
		}
	}
?>