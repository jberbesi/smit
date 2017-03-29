<head>
<link href="css/style.css" rel="Stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js" ></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js" ></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<title>Reportes -- Indique Criterios Busqueda</title>
</head>
<script type="text/javascript" language="javascript">

/*$(function() {
    $( ":input.query" ).autocomplete(
	{
       	source: "busco.php",            
        minLength: 2,  
		select: function (event, ui)
		{			        
			this.value = ui.item.value;
			$(this).next(":input.des").val(ui.item.des);	
			$(this).next().next(":input.pre").val(ui.item.pre);	
			event.preventDefault();    			        
		},
		focus: function (event, ui)
		{			        
			this.value = ui.item.value;
			$(this).next(":input.des").val(ui.item.des);	
			$(this).next().next(":input.pre").val(ui.item.pre);	
			event.preventDefault();
		}  
    }); 			   
});
*/
$(function() {
    $( "#Vendedor" ).autocomplete({
        source: 'busco.php',
        minLength: 2
    });
});

function ventanaSecundaria1 (nombre,fecha_i,fecha_f,sede,pais)
{ 
    // 
	//
	// Aqui se asigna el codigo de pais para DemographicsCountries
	//
	//
    pais = 2
	
	
	 		cadena_verifica = frm_fechas.fecha_inicio.value;
	if (cadena_verifica !=""){
		valor = valida(cadena_verifica);
		if(valor == false){
			bien = false;
			frm_fechas.fecha_inicio.focus();
			return a = false;
	    }
	}	

		cadena_verifica = frm_fechas.fecha_fin.value;
	if (cadena_verifica !=""){
		valor = valida(cadena_verifica);
		if(valor == false){
			bien = false;
			frm_fechas.fecha_fin.focus();
			return a = false;
	    }
	}	

		cadena_verifica = frm_fechas.select.value;
	if (cadena_verifica !=""){
		valor = valida(cadena_verifica);
		if(valor == false){
			bien = false;
			frm_fechas.select.focus();
			return a = false;
	    }
	}
	
	window.open(""+nombre+"999.asp?fecha_i="+fecha_i+"&fecha_f="+fecha_f+"&sede="+sede+"&pais="+pais,"Reportes","width=700, height=550, scrollbars=yes, menubar=yes, location=no, resizable=yes")
}
function ventanaSecundaria (nombre,fecha_i,fecha_f,sede,pais)
{ 

 		cadena_verifica = frm_fechas.fecha_inicio.value;
	if (cadena_verifica !=""){
		valor = valida(cadena_verifica);
		if(valor == false){
			bien = false;
			frm_fechas.fecha_inicio.focus();
			return a = false;
	    }
	}	

		cadena_verifica = frm_fechas.fecha_fin.value;
	if (cadena_verifica !=""){
		valor = valida(cadena_verifica);
		if(valor == false){
			bien = false;
			frm_fechas.fecha_fin.focus();
			return a = false;
	    }
	}	

		cadena_verifica = frm_fechas.select.value;
	if (cadena_verifica !=""){
		valor = valida(cadena_verifica);
		if(valor == false){
			bien = false;
			frm_fechas.select.focus();
			return a = false;
	    }
	}
 
	window.open(""+nombre+".asp?fecha_i="+fecha_i+"&fecha_f="+fecha_f+"&sede="+sede+"&pais="+pais,"Reportes","width=700, height=550, scrollbars=yes, menubar=yes, location=no, resizable=yes")
}
function ventanaterciaria (nombre,numero,seniat,tipodoc,sede)
{ 	window.open(""+nombre+".asp?numero="+numero+"&seniat="+seniat+"&tipodoc="+tipodoc+"&sede="+sede,"Reportes","width=700, height=550, scrollbars=yes, menubar=yes, location=no, resizable=yes")
}
function ventanacuarta (nombre,fecha_i,fecha_f, valor_guia, sede)
{ 

		cadena_verifica = frm_fechas.fecha_inicio.value;
	if (cadena_verifica !=""){
		valor = valida(cadena_verifica);
		if(valor == false){
			bien = false;
			frm_fechas.fecha_inicio.focus();
			return a = false;
	    }
	}	

		cadena_verifica = frm_fechas.fecha_fin.value;
	if (cadena_verifica !=""){
		valor = valida(cadena_verifica);
		if(valor == false){
			bien = false;
			frm_fechas.fecha_fin.focus();
			return a = false;
	    }
	}	

		cadena_verifica = frm_fechas.select.value;
	if (cadena_verifica !=""){
		valor = valida(cadena_verifica);
		if(valor == false){
			bien = false;
			frm_fechas.select.focus();
			return a = false;
	    }
	}

window.open(""+nombre+".asp?fecha_i="+fecha_i+"&fecha_f="+fecha_f+"&valor_guia="+valor_guia+"&sede="+sede,"Reportes","width=700, height=550, scrollbars=yes, menubar=yes, location=no, resizable=yes")
}
function complementario (nombre)
{ 
	window.open(""+nombre+".asp?")
}
function fechaMayorOIgualQue(fec0, fec1){
    var bRes = false;
    var sMes0 = fec0.substr(0, 2);
    var sDia0 = fec0.substr(3, 2);
    var sAno0 = fec0.substr(6, 4);
    var sMes1 = fec1.substr(0, 2);
    var sDia1 = fec1.substr(3, 2);
    var sAno1 = fec1.substr(6, 4);
    if (sAno0 > sAno1) bRes = true;
    else {
     if (sAno0 == sAno1){
      if (sMes0 > sMes1) bRes = true;
      else {
       if (sMes0 == sMes1)
        if (sDia0 >= sDia1) bRes = true;
      }
     }
    }
    return bRes;
   }
   
   
function FechaMayorAbandonado(fec0){
    var bRes = false;
    var sMes0 = fec0.substr(0, 2);
    var sDia0 = fec0.substr(3, 2);
    var sAno0 = fec0.substr(6, 4);
	var hoy = new Date();
	var fecha1 = new Date (sAno0,sMes0,sDia0);
	var timeDiff = Math.abs(hoy.getTime() - fecha1.getTime());
	var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
    if (diffDays > 30)
	{
		bRes = true;
	}
	
	return bRes;
   }
   

function verificaFecha(date1, date2, etiq1, etiq2)
{	var bOk = false;
	if ((date1 != "") && (date2 != "")) {
      if (fechaMayorOIgualQue(date2, date1))
	  {
       bOk = true;
      } 
	  else 
	  {
       alert("La " + etiq1 + " no puede ser mayor a la " + etiq2 + ". Por favor corrija. ")
      } 
	}
}

function verificaFecha2(date1, date2, etiq1, etiq2, nombre, sede, pais)
{	var bOk = false;
	if ((date1 != "") && (date2 != "")) 
	{
      if (fechaMayorOIgualQue(date2, date1))
	  {
       bOk = true;
      } 
	  else 
	  {
       alert("La " + etiq1 + " no puede ser mayor a la " + etiq2 + ". Por favor corrija. ")
      } 
	}
	else
	{
		if (date1 !="")
		{
			bOk = true;
		}
		else
		{
			if (date1 =="")
			{
				alert("Debe indicar una fecha inicial. Por favor corrija. ")
			}
			else
			{
				bOk = true;
			}
		}
	}
	if (bOk)
	{
		ventanaSecundaria(nombre,document.frm_fechas.fecha_inicio.value,document.frm_fechas.fecha_fin.value, sede, pais);
	}
}

</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<form name="frm_reportes" action="javascript:ventanaSecundaria(document.frm_reportes.txt_reporte.value,document.frm_reportes.txt_fecha_i.value,document.frm_reportes.txt_fecha_f.value);" method="post">
	<input type="hidden" value="" name="txt_reporte">
	<input type="hidden" value="" name="txt_fecha_i">
	<input type="hidden" value="" name="txt_fecha_f">
</form>

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
	  		<form name="frm_fechas">
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
                				<option class="Negro" value="1"> 2016</option>
								<option class="Negro" value="2"> 2017</option>
              				</select>
              			</td>
          			</tr>
          			<tr>
            			<td width="339" height="42"  class="Negro">
            				<font size="2" face="Verdana, Arial, Helvetica, sans-serif">Vendedor:</font>
              				<input id="Vendedor" class="query" name="codevendedor" type="text" size="20" maxlength="20" tipo="nword" etiqueta="Codigo" autocomplete="off" style="height:30px"><input class="des" type="HIDDEN" id="idnumber" name="idnumber"/>
              </td>
          </tr>
          
          <tr>
            <td width="339" height="42" class="negro"><img src="img/rojo.gif"><a href="#" style="cursor:hand; font-size: 12px;" class="revista1" onClick="javascript:ventanaSecundaria('rep_libroventaspa',document.frm_fechas.fecha_inicio.value,document.frm_fechas.fecha_fin.value, document.frm_fechas.select.value,1);return verificaFecha(document.frm_fechas.fecha_inicio.value, document.frm_fechas.fecha_fin.value, 'Fecha Inicio', 'Fecha de Fin');"> Libro de Ventas, Facturacion FISCAL </a></td>
            <td  height="45" ><img src="img/rojo.gif"><a href="#" style="cursor:hand; font-size: 12px;" class="revista1" onClick="javascript:ventanaSecundaria1('rep_usuarios',document.frm_fechas.fecha_inicio.value,document.frm_fechas.fecha_fin.value, document.frm_fechas.select.value);return verificaFecha(document.frm_fechas.fecha_inicio.value, document.frm_fechas.fecha_fin.value, 'Fecha Inicio', 'Fecha de Fin');"> Reporte de Usuarios Casilleros</a></td>
          </tr>
          <tr>
            <td width="339" height="42" class="negro"><img src="img/rojo.gif"><a href="#" style="cursor:hand; font-size: 12px;" class="revista1" onClick="javascript:ventanaSecundaria('rep_libroventas_resumenpa',document.frm_fechas.fecha_inicio.value,document.frm_fechas.fecha_fin.value, document.frm_fechas.select.value,1);return verificaFecha(document.frm_fechas.fecha_inicio.value, document.frm_fechas.fecha_fin.value, 'Fecha Inicio', 'Fecha de Fin');"> Facturacion Resumida</a></td>
            <td width="339" height="42" class="negro"><img src="img/rojo.gif"><a href="#" style="cursor:hand; font-size: 12px;" class="revista1" onClick="javascript:ventanaSecundaria('rep_casilleros_agencia',document.frm_fechas.fecha_inicio.value,document.frm_fechas.fecha_fin.value, document.frm_fechas.select.value,1);return verificaFecha(document.frm_fechas.fecha_inicio.value, document.frm_fechas.fecha_fin.value, 'Fecha Inicio', 'Fecha de Fin');"> Reporte de Usuarios Casilleros Resumido por agencia </a></td>
            
          </tr>  
        </table>
    </form>  </td>
  </tr>
</table> 
