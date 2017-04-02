<head>
	<link href="../css/estilos.css" rel="Stylesheet" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php 
	set_time_limit(300);
	include 'conectar.php';
	include 'funciones.php';
	$codigo 	= $_GET['codigo'];
	$mes 		= $_GET['mes'];
	$ano 		= $_GET['ano'];
	$vendedor 	= $_GET['vendedor'];
	$query = buscar_vendedor($codigo,$vendedor,$mes,$ano);
	$parametro = parametros();
	$para = $parametro->fetch_assoc();
	?>
	<title>INDICADOR GRADO DE CUMPLIMIENTO MES: <?php echo($mes);?> AÑO: <?php echo($ano);?></title>
	<table width="700" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr> 
   			<td width="700"><img src="img/hola.png" > 
      			<table width="350" align="center" border="0">
        			<tr> 
   						<td class="TituloNegro" align="center">
          					<strong>GRADO DE CUMPLIMIENTO</strong>
          				</td>
          			</tr>
          			<tr>
       					<td align="center">
                  		<?php if($vendedor != ""){?>
          					<strong>Vendedor: <?php echo($vendedor);?></strong>
                  		<?php } else { ?>
                    	<strong>General</strong>
                  		<?php } ?>
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
    			<?php while ($row = $query->fetch_assoc()){ 
    					$cont = number_format(0, 2, ',', '.');?>
      			<table width="600" border="0" align="center">
      				<tr>
      					<td>
      						<strong>Vendedor: <?php echo(nombre_vendedor($row['codigo']));?></strong>
      					</td>
      					<td colspan="3">
      						<strong>Codigo: <?php echo($row['codigo']);?></strong>
      					</td>
      				</tr>
					<tr> 
          				<td height="1" colspan="10" bgcolor="#000099"></td>
       			 	</tr>
        			<tr bgcolor="#CCCCCC" class="Negro" valign="middle" align="center">
          				<td width="100" height="23" ><strong>Item</strong></td>
          				<td width="60" > <strong>Valor %</strong>
          				</td>
          				<td width="60"><strong>% Obtenido</strong></td>
          				<td width="60"><strong>Cumplido</strong></td>
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
        			<!-- COTIZACIONES -->
        			<?php } else {
        				$cotpro = contar_cotizacion(1,$mes,$ano,$row['codigo']);
        				$cotnopro = contar_cotizacion(0,$mes,$ano,$row['codigo']);
        				$row1 = $cotpro->fetch_assoc();
        				$row2 = $cotnopro->fetch_assoc();
        				$cotizaciones = $row1['cantidad'] + $row2['cantidad'];
        				if ($row1['cantidad']>0)
        				{
        					$porcetanjeCot1 = porcetanje($cotizaciones,$row1['cantidad']);
        					$obtenidoCot = evaluar_parametro($para['porcetaje_cotizaciones'],$porcetanjeCot1);
        				}
        				else
        				{
        					$obtenidoCot = 0;
        				}
        				(FLOAT)$cont = (FLOAT)$cont + (FLOAT)$obtenidoCot;
        				$obtenidoCot = (number_format($obtenidoCot, 2, ',', '.'));
        				?>
        			<tr bgcolor =<?php echo(colorFondo(0)); ?> >
        				<td align="center">Cotizaciones</td>
        				<td align="center">25%</td>
        				<td align="center"><?php echo($obtenidoCot); ?>%</td>
        				<td align="center">
        				<?php if ($obtenidoCot==25){?>
        					<img src="img/choice-yes.gif" title="Procesada">
        				<?php } else{?>
        					<img src="img/Delete_16.png" title="No Procesada">
        				<?php } ?>
        				</td>
           			</tr>
           			<!-- VENTAS EN BOLIVARES -->
           			<?php
           				$montbs = suma_bolivares($row['codigo'],$mes,$ano);
        				$row3 = $montbs->fetch_assoc();
        				if ($row3['suma']>0)
        				{
        					$obtenidoVbs = evaluar_parametro($para['ventas_bolibares'],$row3['suma']);
        				}
        				else
        				{
        					$obtenidoVbs = 0;
        				}
        				(FLOAT)$cont = (FLOAT)$cont + (FLOAT)$obtenidoVbs;
        				$obtenidoVbs = (number_format($obtenidoVbs, 2, ',', '.'));
        				?>
        			<tr bgcolor =<?php echo(colorFondo(1)); ?> >
        				<td align="center">Ventas en Bolivares</td>
        				<td align="center">25%</td>
        				<td align="center"><?php echo($obtenidoVbs); ?>%</td>
        				<td align="center">
        				<?php if ($obtenidoVbs==25){?>
        					<img src="img/choice-yes.gif" title="Procesada">
        				<?php } else{?>
        					<img src="img/Delete_16.png" title="No Procesada">
        				<?php } ?>
        				</td>
           			</tr>
           			<!-- VENTAS EN UNIDADES -->

           			<?php
           				$ventUnd = suma_unidades($row['codigo'],$mes,$ano);
        				$row4 = $ventUnd->fetch_assoc();
        				if ($row4['suma']>0)
        				{
        					$obtenidoVud = (evaluar_parametro($para['piezas'],$row4['suma']));
        				}
        				else
        				{
        					$obtenidoVud = 0;
        				}
        				(FLOAT)$cont = (FLOAT)$cont + (FLOAT)$obtenidoVud;
        				$obtenidoVud = (number_format($obtenidoVud, 2, ',', '.'));
        				?>
        			<tr bgcolor =<?php echo(colorFondo(0)); ?> >
        				<td align="center">Ventas por Unidades</td>
        				<td align="center">25%</td>
        				<td align="center"><?php echo($obtenidoVud); ?>%</td>
        				<td align="center">
        				<?php if ($obtenidoVud==25){?>
        					<img src="img/choice-yes.gif" title="Procesada">
        				<?php } else{?>
        					<img src="img/Delete_16.png" title="No Procesada">
        				<?php } ?>
        				</td>
           			</tr>

           			<!-- DEVOLUCIONES -->

           			<?php
           				$devolu = devoluciones_bolivares($row['codigo'],$mes,$ano,"vendedor");
        				$row5 = $devolu->fetch_assoc();
        				if ($row5['suma']>0)
        				{
        					$porcetanjeDev = porcetanje($row5['monto_bs'],$row5['suma']);
        					$obtenidoDev = (evaluar_parametro1($para['procetanje_devoluciones'],$porcetanjeDev));
        				}
        				else
        				{
        					$obtenidoDev = 25;
        				}
        				(FLOAT)$cont = (FLOAT)$cont + (FLOAT)$obtenidoDev;
        				$obtenidoDev = (number_format($obtenidoDev, 2, ',', '.'));
        				?>
        			<tr bgcolor =<?php echo(colorFondo(1)); ?> >
        				<td align="center">Devoluciones</td>
        				<td align="center">25%</td>
        				<td align="center"><?php echo($obtenidoDev); ?>%</td>
        				<td align="center">
        				<?php if ($obtenidoDev==25){?>
        					<img src="img/choice-yes.gif" title="Procesada">
        				<?php } else{?>
        					<img src="img/Delete_16.png" title="No Procesada">
        				<?php } ?>
        				</td>
           			</tr>

           			<!-- Fin Reportes -->
        			<?php }?>
        			<tr> 
          				<td height="1" colspan="10" bgcolor="#000099"></td>
        			</tr>
        			<tr> 
          				<td height="17" align="right" valign="middle" bgcolor="#FFFFFF" class="Negro" colspan="2">PORCENTAJE TOTAL ACUMULADO: 
            			</td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"><?php echo(number_format($cont, 2, ',', '.')); ?></td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"></td>
        			</tr>
        			<tr> 
          				<td height="17" align="right" valign="middle" bgcolor="#FFFFFF" class="Negro" colspan="2">PORCENTAJE A COBRAR: 
            			</td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"><?php echo (number_format(procentaje_cobro($cont), 2, ',', '.')); ?>%</td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"></td>
        			</tr>
        			<tr> 
          				<td height="1" colspan="10" bgcolor="#000099"></td>
        			</tr>
        			<br>
        			<br>
        			<?php }?>
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
        			</tr>
        		</table>
        	</td>
        </tr>
  </table>