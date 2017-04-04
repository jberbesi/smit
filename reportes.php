<?php
  session_start();
  include 'conectar.php';
  validar_seguridad($_SESSION['usuario'],1);
?>
<head>
<link href="css/style.css" rel="Stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js" ></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js" ></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<script type="text/javascript" src="js/reportes.js" ></script> 
<title>Reportes -- Indique Criterios Busqueda</title>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
<table width="800" border="0" align="center">
	<tr>
		<td width="664" height="399"> 
	 		<table width="570" border="0" align="center">
				<tr>
					<td colspan="5" height="45" class="style11">Reportes de Vendedores</td>
				</tr>
				<tr>
		  			<td class="Negro">
		  				<b>
		  					<font size="3" face="Verdana, Arial, Helvetica, sans-serif">
		  						Indique Reporte con sus Criterios de Consulta
		  					</font>
		  				</b>
		  			</td>
				</tr>
				<tr>
					<td class="Negro" bgcolor="#000099" height="1">
					</td>
				</tr>
			</table>
	  		<form name="frm_reportes">
        		<table width="628" border="0" align="center">
          			<tr>
            			<td width="339" height="37" class="Negro">
            				<font size="2" face="Verdana, Arial, Helvetica, sans-serif">Mes: </font>
              				<select name="mes" req="true">
                				<option class="Negro" value="0">Mes</option>    
                				<option class="Negro" value="1"> Enero</option>
								<option class="Negro" value="2"> Febrero</option>
                				<option class="Negro" value="3"> Marzo</option>
                				<option class="Negro" value="4"> Abril</option>
                				<option class="Negro" value="5"> Mayo</option>
                				<option class="Negro" value="6"> Junio</option>
                				<option class="Negro" value="7"> Julio</option>
                				<option class="Negro" value="8"> Agosto</option>
                				<option class="Negro" value="9"> Septiembre</option>
                				<option class="Negro" value="10"> Octubre</option>
                				<option class="Negro" value="11"> Noviembre</option>
                				<option class="Negro" value="12"> Diciembre</option>
              				</select>
              			</td>
            			<td class="Negro" width="279">
            				<font size="2" face="Verdana, Arial, Helvetica, sans-serif">Año:</font>
              				<select name="ano" req="true">
                				<option class="Negro" value="0">Año</option>    
                				<option class="Negro" value="2016"> 2016</option>
								<option class="Negro" value="2017"> 2017</option>
              				</select>
              			</td>
          			</tr>
          			<tr>
            			<td width="339" height="42"  class="Negro">
            				<font size="2" face="Verdana, Arial, Helvetica, sans-serif">Vendedor:</font>
              				<input id="Vendedor" class="query" name="vendedor" type="text" size="20" maxlength="20" tipo="nword" etiqueta="Codigo" autocomplete="off" style="height:30px"><input class="des" type="HIDDEN" id="idnumber" name="idnumber"/>
              </td>
          </tr>
          
          <tr>
            <td width="339" height="42" class="negro">
            	<img src="img/rojo.gif">
            	<a href="#" style="cursor:hand; font-size: 12px;" class="revista1" onClick="javascript:verificar('rep_cotizaciones',document.frm_reportes.mes.value,document.frm_reportes.ano.value, document.frm_reportes.vendedor.value,document.frm_reportes.idnumber.value);return;">
            			Cotizaciones
           		</a>
           	</td>
            <td  height="45" >
            	<img src="img/rojo.gif">
            	<a href="#" style="cursor:hand; font-size: 12px;" class="revista1" onClick="javascript:verificar('rep_ventas_unidades',document.frm_reportes.mes.value,document.frm_reportes.ano.value, document.frm_reportes.vendedor.value,document.frm_reportes.idnumber.value);return;">
            			Ventas por Unidades
           		</a>
            </td>
          </tr>
          <tr>
            <td width="339" height="42" class="negro">
            	<img src="img/rojo.gif">
            	<a href="#" style="cursor:hand; font-size: 12px;" class="revista1" onClick="javascript:verificar('rep_ventas_bolivares',document.frm_reportes.mes.value,document.frm_reportes.ano.value, document.frm_reportes.vendedor.value,document.frm_reportes.idnumber.value);return;">
            			Ventas En Bolivares
           		</a>
           	</td>


            <td width="339" height="42" class="negro">
            	<img src="img/rojo.gif">
            	<a href="#" style="cursor:hand; font-size: 12px;" class="revista1" onClick="javascript:verificar('rep_devoluciones',document.frm_reportes.mes.value,document.frm_reportes.ano.value, document.frm_reportes.vendedor.value,document.frm_reportes.idnumber.value);return;">
            			Devoluciones
           		</a>
           	</td>
          </tr>  
        </table>
    </form>  </td>
  </tr>
</table> 
