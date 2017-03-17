<?php
	session_start();
	If (!isset($_SESSION['usuario']))
	{
		header("location:default.php");
		exit;
	}
	include 'conectar.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"/>
<title>TecnoAviation - Aviation Management System</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript" src="js/jquery-ui.js" ></script>
<script>
  function SubmitLimpiaWR(){ 
	 document.getElementById('vwo').value = document.getElementById('vwo2').value; 
	var theForm = document.forms['searchForm'];
		 if (!theForm) {
			 theForm = document.searchForm;
		 }
		 theForm.submit();

		  document.getElementById('vwo2').value = "";
		  document.getElementById('vwo2').focus();
		}

	function inicio()
   {
     $(document).ready(function(){

	 $('#submenuoperaciones').fadeIn(1500);
	 $('#submenucuentascobrar').hide();
     $('#submenurrhh').hide();
     $('#submenumercadeo').hide();
     $('#submenufacturacion').hide(); 
     $('#submenucompras').hide(); 
     $('#submenugerencial').hide(); 
     $('#submenuconfi').hide(); 
     });
  }
  
  function operaciones()
   {
     $(document).ready(function(){

	 $('#submenuoperaciones').fadeIn(1500);
	 $('#submenucuentascobrar').hide();
     $('#submenurrhh').hide();
     $('#submenumercadeo').hide();
     $('#submenufacturacion').hide(); 
     $('#submenucompras').hide(); 
     $('#submenugerencial').hide(); 
     $('#submenuconfi').hide(); 
     });
  }
  
  function mercadeo()
   {
     $(document).ready(function(){

	 $('#submenuoperaciones').hide();
	 $('#submenucuentascobrar').hide();
     $('#submenurrhh').hide();
     $('#submenumercadeo').fadeIn(1500);
     $('#submenufacturacion').hide(); 
     $('#submenucompras').hide(); 
     $('#submenugerencial').hide(); 
     $('#submenuconfi').hide(); 
     });
  }
  
  function rrhh()
   {
     $(document).ready(function(){

	 $('#submenuoperaciones').hide();
	 $('#submenucuentascobrar').hide();
     $('#submenurrhh').fadeIn(1500);
     $('#submenumercadeo').hide();
     $('#submenufacturacion').hide(); 
     $('#submenucompras').hide(); 
     $('#submenugerencial').hide(); 
     $('#submenuconfi').hide(); 
     });
  }
  
   function cuentascobrar()
   {
     $(document).ready(function(){

	 $('#submenuoperaciones').hide();
	 $('#submenucuentascobrar').fadeIn(1500);
     $('#submenurrhh').hide();
     $('#submenumercadeo').hide();
     $('#submenufacturacion').hide(); 
     $('#submenucompras').hide(); 
     $('#submenugerencial').hide(); 
     $('#submenuconfi').hide(); 
     });
  }
  
  function facturacion()
   {
     $(document).ready(function(){

	 $('#submenuoperaciones').hide();
	 $('#submenucuentascobrar').hide();
     $('#submenurrhh').hide();
     $('#submenumercadeo').hide();
     $('#submenufacturacion').fadeIn(1500);
     $('#submenucompras').hide(); 
     $('#submenugerencial').hide(); 
     $('#submenuconfi').hide(); 
     });
  }

  function compras()
   {
     $(document).ready(function(){

	 $('#submenuoperaciones').hide();
	 $('#submenucuentascobrar').hide();
     $('#submenurrhh').hide();
     $('#submenumercadeo').hide();
     $('#submenufacturacion').hide();
     $('#submenucompras').fadeIn(1500);
     $('#submenugerencial').hide(); 
     $('#submenuconfi').hide(); 
     });
  }
  function gerencial()
   {
     $(document).ready(function(){

	 $('#submenuoperaciones').hide();
	 $('#submenucuentascobrar').hide();
     $('#submenurrhh').hide();
     $('#submenumercadeo').hide();
     $('#submenufacturacion').hide();
     $('#submenucompras').hide(); 
     $('#submenugerencial').fadeIn(1500);
     $('#submenuconfi').hide(); 
     });
  }
  function config()
   {
     $(document).ready(function(){

	 $('#submenuoperaciones').hide();
	 $('#submenucuentascobrar').hide();
     $('#submenurrhh').hide();
     $('#submenumercadeo').hide();
     $('#submenufacturacion').hide();
     $('#submenucompras').hide(); 
     $('#submenugerencial').hide(); 
     $('#submenuconfi').fadeIn(1500);
     });
  }

</script> 
<script type="text/javascript">
function movepic(img_name,img_src) {
	document[img_name].src=img_src;
}
</script>
<script>
	     inicio();	  
</script>
</head>
<body  style="background-image: url('img/diagonal.png')" >
<table cellspacing="0" cellpadding="0" align="center" >
    
    <tr>
        <td width="1500" style="height: 180px;">      
        <table width="1500" cellpadding="0" cellspacing="0" class="style15" style="width: 1500px; height: 100%">
			<tr>
				<td width="1500" style="height: 180px">
				
        <table style="width: 100%; height: 700px" cellspacing="0" cellpadding="0" align="center">
			<tr>
				<td class="textos" style="width: 213px" valign="top" rowspan="2">
				<table cellspacing="0" cellpadding="0">
					<tr>
						<td align="center" height="120"><a target="contenido" href="123/default.asp"><img alt=""  src=""/><!-- Ruta del logo--></a></td>
					</tr>
					<tr>
						<td style="height: 550px" valign="top">
						<div id="submenuoperaciones" >
						<table style="width: 100%">
							<tr>
								<td><a target="contenido" href="123/proveedores.asp"><img alt="" src="img/vendors.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/buscar_facturas_cxp.asp"><img alt="" src="img/search_invoice.png" width="85" height="94" border="0" /></a></td>
							</tr>
							<tr>
								<td><a target="contenido" href="123/registro_documentos_cl_cxp.asp"><img alt="" src="img/register_bill.png" width="85" height="94" border="0" /></a></td>
								<td><a target="contenido" href="123/tipos_reportes_cxp.asp"><img alt="" src="img/reports_cxp.png" width="85" height="94" border="0" /></a></td>
							</tr>
							<tr>
								<td><a target="contenido" href="123/cuentas_contables.asp"><img alt="" src="img/account.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/procesar_facturas_cl_m_cxp.asp"><img alt="" src="img/payments.png" width="85" height="94" border="0"></a></td>
							</tr>
							<tr>
								<td><a target="contenido" href="123/write_check.asp"><img alt="" src="img/write_checks.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/print_check.asp"><img alt="" src="img/print_checks.png" width="85" height="94" border="0"></a></td>
							</tr>
							<tr>
								<td><a target="contenido" href="123/bank.asp"><img alt="" src="img/banks.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/reversar_cxp.asp"><img alt="" src="img/void_payments.png" width="85" height="94" border="0"></a></td>
							</tr>
						</table>
						</div>
						
						<div id="submenumercadeo" >
						<table style="width: 100%">
                            <form action="/123/tipoworkorder.asp?requerim=<%="modificar"%>" method="post" value="<%=" "%>" name="searchForm" class="Estilo1" target="contenido">
                                <tr>
                                    <td colspan="2"><input type="text" name="vinvoice" id="vinvoice" size="15" style="height: 30px" autocomplete="off" />
                                    <input type="hidden" name="vwo" id="vwo" size="15" value="" style="height: 30px"  autocomplete="off"  />
                                    </td>
                                </tr>
                                <tr>
                            <td colspan="4" ><input type="submit" name="func" value="Search Invoice" class="boton" onClick="SubmitLimpiaWR()" /></td>
							</tr></form>
							<tr>
								<td><a target="contenido" href="123/customers.asp"><img alt="" src="img/clie.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/buscar_facturas.asp"><img alt="" src="img/search_invoice.png" width="85" height="94" border="0" /></a></td>
							</tr>
							<tr>
								<td><a target="contenido" href="123/registro_documentos_cl.asp"><img alt="" src="img/register_bill.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/facturar_quote.asp"><img alt="" src="img/facturar_quote.png" width="85" height="94" border="0"></a></td>
							</tr>
							<tr>
								<td><a target="contenido" href="123/conceptos_fact.asp"><img alt="" src="img/conceptos_fact.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/tipos_reportes.asp"><img alt="" src="img/reports_cxp.png" width="85" height="94" border="0" /></a></td>
							</tr>
						</table>
						</div>
						
						<div id="submenufacturacion" >
						<table style="width: 100%">
                            <form action="/123/tipoworkorder.asp?requerim=<%="modificar"%>" method="post" value="<%=" "%>" name="searchForm" class="Estilo1" target="contenido">
                                <tr>
                                    <td colspan="2"><input type="text" name="vwo" id="vwo" size="15" style="height: 30px" autocomplete="off" />
                                    <input type="hidden" name="vwo" id="vwo" size="15" value="" style="height: 30px"  autocomplete="off"  />
                                    </td>
                                </tr>
                                <tr>
                            <td colspan="4" ><input type="submit" name="func" value="Search WO" class="boton" onClick="SubmitLimpiaWR()" /></td>
							</tr></form>
							<tr>
								<td><a target="contenido" href="123/workorders.asp"><img alt="" src="img/presu.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/workorders_search.asp"><img alt="" src="img/search_wo.png" width="85" height="94" border="0"></a></td>
							</tr>
							<tr>
								<td><a target="contenido" href="123/repair_orders.asp"><img alt="" src="img/repair_orders.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/uploadtester.asp"><img alt="" src="img/documents.png" width="85" height="94" border="0"></a></td>
							</tr>
							<tr>
								<td><a target="contenido" href="123/items_quote.asp"><img alt="" src="img/items_quote.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/quotes.asp"><img alt="" src="img/quotes.png" width="85" height="94" border="0"></a></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>
						
						</div>
						
						<div id="submenucuentascobrar" >
						
						<table style="width: 100%">
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;
								</td>
							</tr>
							<tr>
								<td>&nbsp;
								</td>
								<td>&nbsp;
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>
						
						</div>
						
						<div id="submenurrhh" >
						<table style="width: 100%">
							<tr>
								<td><a target="contenido" href="123/orden_compra.asp"><img alt="" src="img/purchase_order.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/output_stock_PO.asp"><img alt="" src="img/purchase_orderRP.png" width="85" height="94" border="0"></a></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>
                        </div>
                        <div id="submenucompras" >
                        <table style="width: 100%">
                            <tr>
								<td><a target="contenido" href="123/buscar_articulos.asp"><img alt="" src="img/items.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/add_stock.asp"><img alt="" src="img/add_stock.png" width="85" height="94" border="0"></a></td>
                            </tr>
                            <tr>
								<td><a target="contenido" href="123/entry_stock.asp"><img alt="" src="img/inventory_entry.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/output_stock.asp"><img alt="" src="img/inventory_output.png" width="85" height="94" border="0"></a></td>
                            </tr>
                            <tr>
								<td><a target="contenido" href="123/almacen.asp"><img alt="" src="img/warehouse.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/tipos_reportes_inv.asp"><img alt="" src="img/reports_cxp.png" width="85" height="94" border="0" /></a></td>
                            </tr>
                            <tr>
								<td><a target="contenido" href="123/maintenance.asp"><img alt="" src="img/Maintenance.png" width="85" height="94" border="0"></a></td>
								<td>&nbsp;
                                </td>
                            </tr>
                        </table>
                        </div>
                        <div id="submenugerencial" >
                        <table style="width: 100%">
							<tr>
								<td><a target="contenido" href="123/fingerprint.asp"><img alt="" src="img/fingerprint.png" width="85" height="94" border="0"></a></td>
								<td><a target="contenido" href="123/tipos_reportes_gerencial.asp"><img alt="" src="img/management_reports.png" width="85" height="94" border="0"></a></td>
							</tr>
                            <tr>
                                <td>&nbsp;
                                </td>
                                <td>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                        </div>
                        <div id="submenuconfi" >
                        <table style="width: 100%">
                            <tr>
                                <td><a target="contenido" href="123/registro_usuario_perfil.asp?str_perfil=true" ><img alt="" src="img/miperf.png" width="85" height="94" border="0"></a></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><a target="contenido" href="123/sucursales.asp"><img alt="" src="img/sucursal.png" width="85" height="94" border="0"></a></td>
                                <td><a target="contenido" href="123/conditions.asp" ><img alt="" src="img/conditions.png" width="85" height="94" border="0"></a></td>
                            </tr>
                            <tr>
                                <td><a target="contenido" href="123/class.asp" ><img alt="" src="img/class.png" width="85" height="94" border="0"></a></td>
                                <td><a target="contenido" href="123/departamento.asp" ><img alt="" src="img/depart.png" width="85" height="94" border="0"></a></td>
                            </tr>
                            <tr>
                                <td><a target="contenido" href="123/parametros.asp"><img alt="" src="img/Paramvar.png" width="85" height="94" border="0"></a></td>
                                <td><a target="contenido" href="123/ver_usuarios.asp"><img alt="" src="img/confusua.png" width="85" height="94" border="0"></a></td>
                            </tr>
                            <tr>
                                <td><a target="contenido" href="123/steps.asp?str_perfil=true" ><img alt="" src="img/steps.png" width="85" height="94" border="0"></a></td>
                                <td><a target="contenido" href="123/sub_steps.asp"><img alt="" src="img/sub_steps.png" width="85" height="94" border="0"></a></td>
                            </tr>
                            <tr>
                                <td><a target="contenido" href="123/tools.asp" ><img alt="" src="img/tools.png" width="85" height="94" border="0"></a></td>
                                <td><a target="contenido" href="123/workperfil.asp?str_perfil=true" ><img alt="" src="img/workperf.png" width="85" height="94" border="0"></a></td>
                            </tr>
                            <tr>
                                <td><a target="contenido" href="123/warranty.asp"><img alt="" src="img/warra.png" width="85" height="94" border="0"></a></td>
                                <td><a target="contenido" href="123/manuals.asp"><img alt="" src="img/manuals.png" width="85" height="94" border="0"></a></td>
                            </tr>
                            <tr>
                                <td><a target="contenido" href="123/corrective_actions.asp"><img alt="" src="img/corrective_actions.png" width="85" height="94" border="0"></a></td>
                                <td><a target="contenido" href="123/workRequested.asp" ><img alt="" src="img/workRequested.png" width="85" height="94" border="0"></a></td>
                            </tr>
                            <tr>
                                <td><a target="contenido" href="123/tracecode.asp"><img alt="" src="img/trace_code.png" width="85" height="94" border="0"></a></td>
                                <td><a target="contenido" href="123/terms.asp"><img alt="" src="img/terms.png" width="85" height="94" border="0" /></a></td>
                            </tr>
                            <tr>
                                <td><a target="contenido" href="123/task.asp"><img alt="" src="img/task.png" width="85" height="94" border="0"></a></td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                        </div>
						</td>
					</tr>
					<tr>
						<td align="center" style="height: 62px">&nbsp;</td>
					</tr>
				</table>
				</td>
				<td class="textos" style="width: 5px" valign="top" align="center" rowspan="2"><img alt="" src="img/separador.png" width="5" height="1500" border="0"></td>
				<td>
				
				<table width="1150" cellpadding="0" cellspacing="0" style="height: 140px;">
					<tr>
						<td align="center">				
						<table width="100%" align="center" style="width: 100%; height: 45px;">
							<tr>
								<td align="left" style="height: 22px">
								<span class="style13"><b> User:</b> <?php echo($_SESSION['usuarioNombre']);?></span><br> 
								<a href="logout.asp" class="style13">Sign Out (x)</a> | <a href="tecnoaviation.asp" target="new" class="style13">New Window</a></td>
								
								<td align="right" style="height: 22px">
					<img alt="" src="img/tecnovigi_int.png" border="0"></td>
							</tr>
							<tr>
								<td align="right" colspan="2">
								<table style="width: 100%" cellspacing="0" cellpadding="0">
									<tr>
										<td style="width: 12%;">
										<a href="javascript:mercadeo();"  onMouseOver="movepic('mercadeo','img/mercadeo_act.png')" onMouseOut="movepic('mercadeo','img/mercadeo.png')"><img name="mercadeo" alt="" src="img/mercadeo.png" width="112" height="48" border="0"></a></td>
										<td style="width: 12%;" align="center">
										<a href="javascript:operaciones();" onMouseOver="movepic('operaciones','img/operaciones_act.png')" onMouseOut="movepic('operaciones','img/operaciones.png')"><img name="operaciones" alt="" src="img/operaciones.png" border="0" ></a></td>
										<td style="width: 13%;" align="center">
										<a href="javascript:facturacion();"  onmouseover="movepic('facturacion','img/facturacion_act.png')" onMouseOut="movepic('facturacion','img/facturacion.png')"><img name="facturacion" alt="" src="img/facturacion.png"  border="0"></a></td>
										<td style="width: 17%;" align="center"><a href="javascript:rrhh();" onMouseOver="movepic('rrhh','img/rrhh_act.png')" onMouseOut="movepic('rrhh','img/rrhh.png')"><a href="javascript:rrhh();" onmouseover="movepic('rrhh','img/rrhh_act.png')" onmouseout="movepic('rrhh','img/rrhh.png')"><img name="rrhh" alt="" src="img/rrhh.png"  border="0" /></a></td>
										<td width="15%" align="center">
										<a href="javascript:compras();" onMouseOver="movepic('compras','img/compras_act.png')" onMouseOut="movepic('compras','img/compras.png')"><img name="compras" alt="" src="img/compras.png"  border="0"></a></td>
										<td width="13%" align="center">
										<a href="javascript:gerencial();" onMouseOver="movepic('informacion','img/informacion_act.png')" onMouseOut="movepic('informacion','img/informacion.png')"><img name="informacion" alt="" src="img/informacion.png"  border="0"></a></td>
										<td width="12%" align="center">
										<a href="javascript:config();" onMouseOver="movepic('configuraciones','img/configuraciones_act.png')" onMouseOut="movepic('configuraciones','img/configuraciones.png')"><img name="configuraciones" alt="" src="img/configuraciones.png"  border="0"></a></td>
									</tr>
              <tr>
                <td height="1.5" colspan="8" bgcolor="#A4A4A4"></td>
              </tr>
								</table>
								</td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
				
				</td>
			</tr>
			<tr>
				<td class="textos" height="600" style="height: 1486px" valign="top"><br />
			    <iframe id="contenido" name="contenido" width="100%" height="100%" src="123/default.asp" frameborder="0"> </iframe></td>
			</tr>
		</table>
            </td>
			</tr>
		</table>
        </td>
    </tr>
    <tr>
        <td style="height: 5px" bgcolor="#ffffff" ></td>
    </tr>
    
    <tr>
        <td style="height: 15px" bgcolor="#ffffff" >
        <table style="width: 97%; height: 33px;" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td style="width: 484px" class="style13">
                © <%=Year(date())%>. <strong>TecnoAviation</strong>. All rights reserved</td>
                <td align="right">
        <span class="style13">Powered by <strong>TechnoLRG</strong></span>
</td>
            </tr>
        </table>
        </td>
    </tr>
</table>
</body>
</html>