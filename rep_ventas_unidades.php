<head>
	<link href="../css/estilos.css" rel="Stylesheet" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php 
	include 'conectar.php';
	include 'funciones.php';
	$codigo 	= $_GET['codigo'];
	$mes 		= $_GET['mes'];
	$ano 		= $_GET['ano'];
	$vendedor 	= $_GET['vendedor'];
	$cont = 1;
	$cant = 0;
	$mont = 0;
	$query = ventas_unidades($codigo,$mes,$ano,$vendedor);
	?>
	<title>REPORTE DE VENTAS POR UNIDADES MES: <?php echo($mes);?> AÑO: <?php echo($ano);?></title>
	<table width="700" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr> 
   			<td width="700"><img src="img/hola.png" > 
      			<table width="350" align="center" border="0">
        			<tr> 
   						<td class="TituloNegro" align="center">
          					<strong>REPORTE DE VENTAS POR UNIDADES</strong>
          				</td>
          			</tr>
          			<?php if($vendedor != ""){?>
          			<tr>
       					<td align="center">
          					<strong>Vendedor: <?php echo($vendedor);?></strong>
          				</td>
          			</tr>
          			<?php } else { ?>
          			<tr>
          				<td class="TituloNegro" align="center">
          					<font size="2" face="Verdana">
   								<strong>General</strong>
          					</font>
          				</td>	
        			</tr>
        			<?php } ?>
        			<tr class="Negro"> 
          				<td class="Negro" align="center"> 
							Mes: <?php echo($mes);?> Año: <?php echo($ano);?>
          				</td>
   					</tr>
        		</table>
        	</td>
  		</tr>
  		<tr> 
    		<td colspan="5" rowspan="2" valign="top"> 
      			<table width="600" border="0" align="center">
					<tr> 
          				<td height="1" colspan="10" bgcolor="#000099"></td>
       			 	</tr>
        			<tr bgcolor="#CCCCCC" class="Negro" valign="middle" align="center">
        			<?php if($vendedor != ""){?> 
          				<td width="60" height="23" ><strong>Código de Cotización</strong></td>
          				<td width="100" > <strong>Fecha de Entrega</strong></td>
          			<?php } else{ ?>
          				<td width="60" ><strong>Código del Vendedor</strong></td>
          				<td width="100" ><strong>Nombre del Vendedor</strong></td>
          			<?php } ?>
       					<td width="80"><strong>Monto Bs.</strong></td>
       					<td width="80"> <strong>Cantidad de Productos</strong></td>
        			</tr>
        			<tr> 
          				<td height="1" colspan="9" bgcolor="#000099"></td>
        			</tr>
        			<?php if ($query->num_rows < 1) {?>
        			<tr>
        				<table align="center">
        					<tr>
        						<td>&nbsp;</td>
        					</tr>
        					<tr> 
          						<td class="Desc">No Existen Registros</td>
        					</tr>
      					</table>
        			</tr>
        			<?php } else {
        				while ($row = $query->fetch_assoc()){?>
        			<tr bgcolor =<?php echo(colorFondo($cont)); ?> > 
        				<?php if($vendedor != ""){?>
        				<td align="center"><?php echo($row['codigo']); ?></td>
        				<td align="center"><?php echo($row['fecha_entrega']); ?></td>
        				<?php } else {?>
        				<td align="center">
        					<?php echo($row['codigo_vendedor']); ?></td>
        				<td>
        					<?php echo(nombre_vendedor($row['codigo_vendedor'])); ?>
        				</td>
        				<?php } ?>
        				<td align="right"><?php echo(number_format($row['suma'], 2, ',', '.'));
        				$mont = $mont + $row['suma'];?></td>
        				<td align="right"><?php echo($row['cantidad']);
        				$cant = $cant + $row['cantidad'];?></td>
        			</tr>
        			<?php $cont = $cont + 1;}?>
        			<tr> 
          				<td height="1" colspan="10" bgcolor="#000099"></td>
        			</tr>
        			<tr> 
          				<td height="17" align="right" valign="middle" bgcolor="#FFFFFF" class="Negro" colspan="2">TOTAL VENTAS EN BOLIVARES: 
            			</td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"><?php echo(number_format($mont, 2, ',', '.'));?></td>
        			</tr>
        			<tr> 
          				<td height="17" align="right" valign="middle" bgcolor="#FFFFFF" class="Negro" colspan="2">TOTAL UNIDADES VENDIDAS: 
            			</td>
            			<td bgcolor="#FFFFFF">&nbsp;</td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"><?php echo($cant);?></td>
        			</tr>
        			<tr> 
          				<td height="1" colspan="10" bgcolor="#000099"></td>
        			</tr>
        			<tr>
        				<table width="300" align="center">
					        <tr> 
          						<td width="145" height="34" align="right" valign="middle" class="Negro">
          							<div align="center">
          								<a href"#" style="cursor:hand;" onClick="javascript:print();">
          									<img src="img/print.png" border="0" align="top">
          								</a>
          							</div>
          						</td>
          						<td width="143" align="right" class="Negro">
          							<div align="center">
          								<a href"#" style="cursor:hand;" onClick="javascript:window.close();">
          									<img src="img/close.png"  border="0" align="top">
          								</a>
          							</div>
          						</td>
        					</tr>
						</table>
        			</tr><?php }?>
        		</table>
        	</td>
        </tr>
  </table>