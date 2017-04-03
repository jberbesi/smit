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
	$mont = 0;
	$query = devoluciones_bolivares($codigo,$mes,$ano,$vendedor);
  //print_r($query);
	?>
	<title>REPORTE DE DEVOLUCIONES MES: <?php echo($mes);?> AÑO: <?php echo($ano);?></title>
	<table width="700" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr> 
   			<td width="700"><img src="img/hola.png" > 
      			<table width="350" align="center" border="0">
        			<tr> 
   						   <td class="TituloNegro" align="center">
          		      <strong>REPORTE DE DEVOLUCIONES</strong>
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
      			<table width="600" border="0" align="center">
					<tr> 
          				<td height="1" colspan="10" bgcolor="#000099"></td>
       			 	</tr>
        			<tr bgcolor="#CCCCCC" class="Negro" valign="middle" align="center">
                <td width="60" ><strong>Código del Vendedor</strong></td>
                <td width="100" ><strong>Nombre del Vendedor</strong></td>
       					<td width="80"><strong>Devoluciones Bs.</strong></td>
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
        				<td align="center"><?php echo($row['codigo_vendedor']); ?></td>
                <td>
                  <?php echo(nombre_vendedor($row['codigo_vendedor'])); ?>
                </td>
        				<td align="right"><?php echo(number_format($row['suma'], 2, ',', '.'));
        				$mont = $mont + $row['suma'];?></td>
        			</tr>
        			<?php $cont = $cont + 1;}?>
        			<tr> 
          				<td height="1" colspan="10" bgcolor="#000099"></td>
        			</tr>
        			<tr> 
          				<td height="17" align="right" valign="middle" bgcolor="#FFFFFF" class="Negro" colspan="2">TOTAL DEVOLUCIONES EN BOLIVARES: 
            			</td>
          				<td align="right" valign="middle" bgcolor="#FFFFFF" class="Negro"><?php echo(number_format($mont, 2, ',', '.'));?></td>
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