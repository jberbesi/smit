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
	$cont = 0;
	$cotpro = 0;
	$cotnopro = 0;
	$mont = 0;
	$montP = 0;
	$montNP = 0;
	$query = cotizaciones_vendedor($codigo,$mes,$ano,$vendedor);
	?>
	<title>REPORTE DE COTIZACIONES MES: <?php echo($mes);?> AÑO: <?php echo($ano);?></title>
	<table width="700" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr> 
   			<td width="700"><img src="img/hola.png" > 
      			<table width="350" align="center" border="0">
        			<tr> 
   						<td class="TituloNegro" align="center">
          					<strong>REPORTE DE COTIZACIONES</strong>
          				</td>
          			</tr>
          			<tr>
       					<td align="center">
          					<strong>Vendedor: <?php echo($vendedor);?></strong>
          				</td>
          			</tr>
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
          				<td width="60" height="23" ><strong>Código de Cotización</strong></td>
          				<td width="90" > <strong>Fecha de emisión</strong>
          				</td>
          				<td width="110"><strong>Monto Bs.</strong></td>
          				<td width="60"><strong>Status</strong></td>
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
        				<td align="center"><?php echo($row['codigo']); ?></td>
        				<td align="center"><?php echo($row['fecha_emision']); ?></td>
        				<td align="right"><?php echo(trim(number_format($row['monto'], 2, ',', '.')));
        					$mont = $mont + $row['monto']; ?></td>
        				<td align="center">
        				<?php if ($row['status']==1){ 
        					$montP = $montP + $row['monto'];
        					$cotpro = $cotpro + 1;?>
        					<img src="img/choice-yes.gif" title="Procesada">
        				<?php } else{
        					$montNP = $montNP + $row['monto'];
        					$cotnopro = $cotnopro +1; ?>
        					<img src="img/Delete_16.png" title="No Procesada">
        				<?php } ?>
        				</td>
           			</tr>
        			<?php $cont = $cont + 1;}?>
        			<tr> 
          				<td height="1" colspan="10" bgcolor="#000099"></td>
        			</tr>
        			<tr> 
          				<td height="17" align="right" valign="middle" bgcolor="#FFFFFF" class="Negro" colspan="2">TOTAL COTIZACIONES: 
            			</td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"><?php echo($cont); ?></td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro">100%</td>
        			</tr>
        			<tr> 
          				<td height="17" align="right" valign="middle" bgcolor="#FFFFFF" class="Negro" colspan="2">TOTAL COTIZACIONES PROCESADAS: 
            			</td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"><?php echo($cotpro); ?></td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"><?php echo (number_format(porcetanje($cont,$cotpro),2,',','')); ?>%</td>
        			</tr>
        			<tr> 
          				<td height="17" align="right" valign="middle" bgcolor="#FFFFFF" class="Negro" colspan="2">TOTAL COTIZACIONES NO PROCESADAS: 
            			</td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"><?php echo($cotnopro); ?></td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"><?php echo (number_format(porcetanje($cont,$cotnopro),2,',','')); ?>%</td>
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