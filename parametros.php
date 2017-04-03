<?php
	include 'conectar.php';
	$parametro = parametros();
	$para = $parametro->fetch_assoc();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
<link href="css/style.css" rel="Stylesheet" type="text/css">
<title>PARAMETROS</title>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
	<form name="form_parametros" id="form_parametros" method="post" action="guardar_parametros.php">
		<table width="800" align="center">
        	<tr> 
            	<td height="48" colspan="4" class="style11">Parametros</td>
        	</tr>
        	<tr bgcolor="#CCCCCC"> 
				<td height="30"  colspan="4" class="Negro"><strong>Información General</strong></td>
        	</tr>
        	<tr> 
          		<td height="1" colspan="4" bgcolor="#00A1ED"></td>
        	</tr>
		  	<tr>
				<td height="40" width="250px" class="Negro">
					Porcentaje Minimo Cotizaciones:
					<font color="#CC0000">
						*
					</font>
				</td>
				<td width="100px" colspan="1">
					<input name="cotizaciones" type="text" class="Negro" id="cotizaciones" value="<?php echo($para['porcetaje_cotizaciones']); ?>" size="8" maxlength="8" tipo="nword" required="required">
				</td>
				<td height="40" width="250px" class="Negro">
					Unidades Minimas:
					<font color="#CC0000">
						*
					</font>
				</td>
				<td width="100px" colspan="1">
					<input name="unidades" type="text" class="Negro" id="unidades" value="<?php echo($para['piezas']); ?>" size="8" maxlength="8" tipo="nword" req="true">
				</td>
		  </tr>
		  <tr>
			<td height="40" width="250px" class="Negro">
				Monto minimo en Bs:
				<font color="#CC0000">
					*
				</font>
			</td>
			<td width="100px">
				<input name="bolivares" type="text" class="Negro" id="bolivares" value="<?php echo($para['ventas_bolibares']); ?>" size="8" maxlength="8" tipo="nword" req="true"></td>
			<td height="40" class="Negro" width="250px">
				Porcentaje Minimo Devoluciones:
				<font color="#CC0000">
					*
				</font>
			</td>
			<td width="100px">
				<input name="devoluciones" type="text" class="Negro" id="devoluciones" value="<?php echo($para['procetanje_devoluciones']); ?>" size="8" maxlength="8" tipo="nword" req="true">
			</td>
		  </tr>
		</table>
		<br>
		<table width="345" align="center">
        	<tr> 
		  		<td width="129" height="35" align="right" class="Negro">
		  			<div align="center">
		  				<a href="inicio.html" style="cursor:hand;" >
		  					<img src="img/close.png" border="0">
		  				</a>
		  			</div>
		  		</td>
		  		<td width="155" align="center">
					<p>
						<a class="revista1" href="javascript:form_parametros.submit();">
							<img src="img/save.png" border="0" align="top">
						</a>
					</p>
		  		</td>
        	</tr>
		</table>
	</form>
</body>