<?php
	session_start();
	If (!isset($_SESSION['usuario']))
	{
		header("location:default.php");
		exit;
	}
	include 'conectar.php';
	include 'perfiles.php';
	$req = $_GET['req'];
	if ($req == "modificar")
	{
		If (isset($_GET['mivariable']))
		{
			$id = $_GET['mivariable'];
		}
		else
		{
			$id	= $_POST['cedula_original'];
		}
		$usuario =buscar_usuarios_id($id);
		$row = $usuario->fetch_assoc();
		$estado = $row['status'];
		$perfiles = perfiles_usuario($id);
		if ($perfiles->num_rows > 0) 
		{
			while ($perfil = $perfiles->fetch_assoc())
			{
				if ($perfil['id_perfil'] == 1)
					$reportes = true;
				if ($perfil['id_perfil'] == 2)
					$indicadores = true;
				if ($perfil['id_perfil'] == 3)
					$parametros = true;
				if ($perfil['id_perfil'] == 4)
					$usuarios = true;
				if ($perfil['id_perfil'] == 5)
					$clave = true;
			}
		}
	}
	else
	{
		$id = id_mayor();
		$estado = 1;
	}
?>
<script type="text/javascript" src="js/form_usuario.js" ></script>
<head>
<link href="css/style.css" rel="Stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mi Perfil</title>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
	<table cellpadding="0" cellspacing="0" border="0" width="950" bgcolor="#000000" align="center">
		<tr bgcolor="#FFFFFF">
			<td width="778" valign="top">
				<form name="form_registro" id="form_registro" method="post" action="guardar_registro_usuario.php?accion=<?php echo($req); ?>&mivariable=<?php echo($id); ?>" onSubmit="javascript:return validar_form(this);">        		
					<table width="820" border="0" align="center">
						<tr>
                			<td colspan="5" height="45" class="style11">
                            	Modificación Usuario
                            </td>
						</tr>
						<tr class="Negro" > 
							<th  bgcolor="#CCCCCC" colspan="4" align="left" height="30">Datos del Usuario - </th>
						</tr>
							<tr bgcolor="#ca342f"> 
								<td  colspan="4" height="1"></td>
							</tr>
							<tr class="Negro" > 
								<td width="18%" height="30">Id :<font color="#ca342f">*</font></td>
								<td width="32%">
                            		<input name="txtcedula" type="text" id="txtcedula" title="Id del Usuario" value=<?php echo($id);?> size="15" maxlength="9" tipo="int" etiqueta="Cédula del Usuario" req="true" disabled>
                              	</td>
                            		<input id="hdnId" name="hdnId" type="hidden" value="2829">
							</tr>
							<tr class="Negro" >
								<td height="30">Nombre(s):<font color="#ca342f">*</font></td>
								<td>
                                	<input name="txtnombre" type="text" id="txtnombre"  title="Nombres del Usuario" value="<?php if ($req=="modificar") echo($row['nombre']); ?>" maxlength="50" tipo="word" req="true" etiqueta="Nombre del Usuario" style="width:240px;">
                               	</td>
								<td width="17%" align="right">Apellido(s):<font color="#ca342f">*</font></td>
								<td width="33%">&nbsp;<input name="txtapellido" type="text" id="txtapellido"  title="Apellidos del Usuario" value="<?php if ($req=="modificar") echo($row['apellido']); ?>" maxlength="50" tipo="word" req="true" etiqueta="Apellido del Usuario" style="width:240px;">
                               </td>
							</tr>
                    		<tr bgcolor="#ca342f"> 
								<td  colspan="4" height="1"></td>
							</tr>
                    		<tr class="Negro" > 
								<th colspan="4"  bgcolor="#CCCCCC" align="left" height="30">Modulos del Usuario - </th>
							</tr>
							<tr bgcolor="#ca342f"> 
								<td  colspan="6" height="1"></td>
							</tr>
							<tr class="Negro" align="center"> 
								<td colspan="4" align="center">
									<table width="652" class="Negro" align="center" border="0" cellpadding="1" cellspacing="1">
										<tr> 
											<td height="30" colspan="4" class="style2"><strong>Modulo Reportes:</strong></td>
										</tr>
										<tr> 
											<td width="20" height="25">
                                   	 	 		<input type="checkbox" name="check_perfil1" value="1" <?php if ($reportes == true) { ?> checked <?php } ?> class="sinborde">
                           					</td>
											<td width="300">Reportes</td>
											<td width="20">
                                   	  			<input type="checkbox" name="check_perfil2" value="2" <?php if ($indicadores == true) { ?> checked <?php } ?>  class="sinborde">
                           		 			</td>
											<td width="307">Indicadores</td>
										</tr>
                                		<tr bgcolor="#ca342f"> 
											<td  colspan="4" height="1"></td>
										</tr>
										<tr> 
											<td height="30" colspan="4" class="style2">
                                            	<strong>Modulo de Configuración:</strong>
                                          	</td>
										</tr>
							  			<tr> 
											<td width="20">
                                   	  			<input type="checkbox" name="check_perfil3" value="3" <?php if ($parametros == true) { ?> checked <?php } ?> class="sinborde">
                    						</td>
											<td width="300">Parametros</td>
											<td width="20">
                                   	  			<input type="checkbox" name="check_perfil4" value="4" <?php if ($usuarios == true) { ?> checked <?php } ?> class="sinborde">
                    						</td>
											<td width="307" height="25">Usuarios</td>
										</tr>
										<tr> 
											<td width="20">
                                   				<input type="checkbox" name="check_perfil5" value="5" <?php if ($clave == true) { ?> checked <?php } ?> class="sinborde">  
                            				</td>
											<td width="300" height="25">Cambiar Clave</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
					      			</table>
								</td>
							</tr>
                    		<tr bgcolor="#ca342f"> 
						<td  colspan="4" height="1"></td>
					</tr>
					<tr>
						<td height="30" class="Negro" align="right"> <strong>Estado</strong>:</td>
						<td colspan="3" class="Negro"><p> <label> 
							<input type="radio" id="estadousuarioH" name="estadousuario" value="1" style="border=0;" <?php if (($req == "nuevo")||($estado == 1) ) { ?> checked <?php } ?>>Habilitado </label>
							<input type="radio" id="estadousuarioD" name="estadousuario" value="0" style="border=0;" <?php if ($estado == 0) { ?> checked <?php } ?> >
							<label> Deshabilitado</label><br></p>
						</td>
					</tr>
                    <tr bgcolor="#ca342f"> 
						<td  colspan="4" height="1"></td>
					</tr>
                     
					
			  </table>
				<table width="820" align="center">
	  <tr class="Negro" > 
						<th style="height: 30px;" bgcolor="#CCCCCC" colspan="4" align="left">Datos de Conexi&oacute;n -</th>
					</tr>
					<tr bgcolor="#ca342f"> 
						<td  colspan="6" height="1"></td>
					</tr>
					<tr class="Negro" > 
						<td>Login:<font color="#ca342f">*</font></td>
						<td>
                        	<input name="txtlogin" type="text" id="txtlogin" title="Login del Usuario" value="<?php if ($req=="modificar") echo($row['login']); ?>" 
                            	size="18" maxlength="15" req="true" tipo="login" etiqueta="Login del Usuario" >
                        </td>
						<td colspan="2">(M&aacute;ximo 15 carateres)</td>
					</tr>
					<tr class="Negro" > 
						<td>Password:<font color="#ca342f">*</font></td>
						<td>
                        	<input name="txtpassword" type="password" id="txtpassword" title="Password del Usuario" 
                            	value="<?php if ($req=="modificar") echo($row['clave']); ?>" size="18" maxlength="20" tipo="login" req="true" etiqueta="Password del Usuario">
                        </td>
						<td colspan="2">(M&aacute;ximo 20 caracteres)</td>
					</tr>
					<tr class="Negro" > 
						<td>Verifique Password:<font color="#ca342f">*</font></td>
						<td>
                        	<input name="txtverif" type="password" id="txtverif" title="Confirmación del Password" value="<?php if ($req=="modificar") echo($row['clave']); ?>" size="18" maxlength="20" tipo="login" 
                            	etiqueta="Confirmación del Password" req="true">
                        </td>
						<td colspan="2">(M&aacute;ximo 20 caracteres)</td>
					</tr>
                    <tr class="Negro" >
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td colspan="2">&nbsp;</td>
				  	</tr>
                    <tr> 
                  		<td height="2" colspan="4" bgcolor="#ca342f"></td>
                	</tr>
					<tr> 
					<td>&nbsp;</td>
						<td height="20" class="Negro" align="right">
                        	<p>&nbsp;</p>
                        </td>
						<td height="20" align="right" class="Negro">
                        	<div align="center">
                                <a class="revista1" href="usuarios.php">
                                    <img src="img/close.png" border="0" align="top">
                                </a>
                            </div>
                        </td>
						<td width="307"><a class="revista1" href="javascript:document.form_registro.onsubmit()"><img src="img/save.png" border="0" align="top"></a></td>
                        
					</tr>
					<tr>
						<td><input name="cedula_original" type="hidden" value="<?php echo($id); ?>"></td>
						<td><input name="login_original" type="hidden" value="larellano"></td>
					</tr>
			  </table>
			</form>
		</td>
	</tr>
</table>

</body>