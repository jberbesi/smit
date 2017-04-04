<?php 
	include 'conectar.php';
	$accion		= $_GET['accion'];
	$nombre 	= $_POST['txtnombre'];
	$apellido 	= $_POST['txtapellido'];
	$login 		= $_POST['txtlogin'];
	$password 	= $_POST['txtpassword'];
	$estado	 	= $_POST['estadousuario'];
	$id			= $_POST['cedula_original'];
	echo($id);
	If (isset($_POST['check_perfil1']))
	{
		$perfil[] = $_POST['check_perfil1']	;
	}
	If (isset($_POST['check_perfil2']))
	{
		$perfil[] = $_POST['check_perfil2'];	
	}
	If (isset($_POST['check_perfil3']))
	{
		$perfil[] = $_POST['check_perfil3'];
	}
	If (isset($_POST['check_perfil4']))
	{
		$perfil[] = $_POST['check_perfil4'];
	}
	If (isset($_POST['check_perfil5']))
	{
		$perfil[] = $_POST['check_perfil5'];
	}
	
	if ($accion == "nuevo")
	{
		if (verificar_login($login) == true)
		{ ?>
			<SCRIPT>
				alert ("Login ya existe");
				history.go(-1)
			</SCRIPT>
		<?php 
		}
		insertar_usuario($nombre,$apellido,$login,$password,$estado);
		$idnew = id_mayor() - 1;
		foreach ($perfil as $valor)
   		{
   			insertar_perfil($idnew,$valor);
   		}
	}
	
	if ($accion == "modificar")
	{
		if (verificar_login1($login,$id) == true)
		{ ?>
			<SCRIPT>
				alert ("Login ya existe");
				history.go(-1)
			</SCRIPT>
		<?php 
		}
		modificar_usuario($nombre,$apellido,$login,$password,$estado,$id);
		eliminar_perfil($id);
		foreach ($perfil as $valor)
   		{
   			insertar_perfil($id,$valor);
   		}
	}
	header('Location: usuarios.php');
?>
