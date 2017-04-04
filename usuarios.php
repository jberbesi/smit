<?php
	session_start();
	If (!isset($_SESSION['usuario']))
	{
		header("location:default.php");
		exit;
	}
	include 'conectar.php';
    validar_seguridad($_SESSION['usuario'],4);
	$usuario = buscar_usuarios();
?>
<head>
<link href="css/style.css" rel="Stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js" ></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js" ></script> 
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<script type="text/javascript" src="js/usuarios.js" ></script>
<head>
	<title>Usuarios</title>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
	<table cellpadding="0" cellspacing="0" border="0" width="990px" align="center">
		<tr >
      		<td colspan="5" height="45" class="style11">Buscar Usuarios</td>
        </tr>
        <tr> 
            <td height="2" colspan="5" bgcolor="#456ba8"></td>
        </tr>
    </table>
	<div id="slickbox6" style="overflow-y:auto; height:300px; vertical-align:middle"> 	
		<table cellpadding="0" cellspacing="0" border="0" width="990px" bgcolor="#000000" align="center">
			<tr bgcolor="#FFFFFF">
				<td width="990" valign="top">
            		<table border="0" align="center" dwcopytype="CopyTableRow">
               			<tr class="Negro"> 
							<td>&nbsp;</td>
						</tr>
						<tr class="Negro">
							<td colspan="4">
								<form name="form2" method="post" action="registro_usuario_perfil.php?req=modificar" onSubmit="return validar()">
                        			Seleccione usuario:
									<input id="usuario" class="query" name="usuario" type="text" size="20" maxlength="20" tipo="nword" etiqueta="Codigo" autocomplete="off" style="height:30px"><input class="des" type="HIDDEN" id="idnumber" name="cedula_original"/>
                            		<input class="boton" value="Buscar" type="submit" name="btnBusqueda">
                            		<input name="req" type="hidden" value="modificar">
                    			</form>
                    		</td>
                		</tr>
                		<tr class="Negro">
                    		<td width="71" height="15"><strong>Codigo Id</strong></td>
                    		<td width="176"><strong>Nombres</strong></td>
                    		<td width="194"><strong>Apellidos</strong></td>
                    		<td width="127"><strong>Status</strong></td>
                		</tr>
                		<tr> 
                  			<td height="2" colspan="6" bgcolor="#456ba8"></td>
                		</tr>
                        <?php if ($usuario->num_rows > 0) {
							while ($row = $usuario->fetch_assoc()){ ?>
						<tr bgcolor="#F3F3F3" class="Negro"> 
                        	<td height="25" align="right">
                            	<a class="Nombre" href="registro_usuario_perfil.php?mivariable=<?php echo($row['id']); ?>&req=modificar" target="contenido">
									<?php echo($row['id']); ?>
                           		</a>
                           	</td>
                            <td><?php echo($row['nombre']); ?></td>
                            <td><?php echo($row['apellido']); ?></td>
                            <?php if ($row['status'] == 1) { ?>
                       		<td>Habilitado</td>
                            <?php } else { ?>
                            <td>Deshabilitado</td>
                            <?php } ?>
                 		</tr>
                        <?php }} else { ?>
                        <tr bgcolor="#F3F3F3" class="Negro"> 
                        	<td colspan="4" height="25" align="center">No Hay Registros</td>
                 		</tr>
                        <?php } ?>
           				<tr> 
               				<td height="2" colspan="6" bgcolor="#456ba8"></td>
                		</tr>
		  			</table>	
				</td>
			</tr>
    	</table>
    </div>
    <table width="980" height="43" border="0" align="center" >
    	<tr>
        	<td height="2" colspan="4" bgcolor="#456ba8"></td>
        </tr>
        <tr> 
            <td width="245" height="39" align="center">
            	
                	<p><a href="registro_usuario_perfil.php?req=nuevo" class="revista1" style="cursor:hand;" title="Registro de Nuevos Usuarios"><img src="img/agregar_usuario.png" border="0" align="top" 
                    style="width:70px;height:70px;"></a></p>
            	
            </td>
        </tr>
	</table>

</body>