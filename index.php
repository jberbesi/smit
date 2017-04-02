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
<title>SMIT</title>
<link rel="icon" type="image/png" href="img/favicon.png" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript" src="js/jquery-ui.js" ></script>
<script type="text/javascript" src="js/inicio.js" ></script>
</head>
<body  style="background-image: url('img/diagonal.png')" >
<table cellspacing="0" cellpadding="0" align="center" >
	<tr>
    	<td width="1500" style="height: 180px;">      
        	<table width="1500" cellpadding="0" cellspacing="0" class="style15" style="width: 1000px; height: 100%">
				<tr>
					<td width="1500" style="height: 180px">
        				<table style="width: 100%; height: 700px" cellspacing="0" cellpadding="0" align="center">
							<tr>
								<td class="textos" style="width: 213px" valign="top" rowspan="2">
									<table cellspacing="0" cellpadding="0" align="center">
										<tr>
											<td align="center" height="120">
                                            	<a target="contenido" href="inicio.html">
                                                	<img alt=""  src="img/hola.png"/>
                                                    	<!-- Ruta del logo-->
                                               	</a>
                                           	</td>
										</tr>
										<tr align="center">
											<td style="height: 550px" valign="top" align="center">
												<div id="submenuoReportes">
                                                <!--div id="reportes"-->
													<table style="width: 100%" align="center">
														<tr align="center">
															<td align="center">
                                                            	<a target="contenido" href="reportes.php">
                                                                	<img alt="" src="img/reportes.png" width="64" height="64" border="0">
                                                                    <h4>Reportes</h4>
                                                            	</a>
                                                          	</td>
															<td align="center">
                                                            	<a target="contenido" href="indicadores.php">
                                                                	<img alt="" src="img/indicadores.png" width="64" height="64" border="0" />
                                                                    <h4>Indicadores</h4>
                                                              	</a>
                                                           	</td>
														</tr>		
													</table>
												</div>
												<div id="submenuConfiguracion">
                                                <!--div id="configuracion"-->
													<table style="width: 100%">
														<tr>
															<td align="center">
                                                            	<a target="contenido" href="parametros.php">
                                                                	<img alt="" src="img/parametros.png" width="64" height="64" border="0">
                                                                    <h4>Parametros</h4>
                                                              	</a>
                                                          	</td>
															<td align="center">
                                                            	<a target="contenido" href="usuarios.php">
                                                                	<img alt="" src="img/usuarios.png" width="64" height="64" border="0" />
                                                               	</a>
                                                                <h4>Usuarios</h4>
                                                          	</td>
														</tr>
														<tr>
															<td align="center">
                                    	                    	<a target="contenido" href="cambiar_clave.php">
                                        	                    	<img alt="" src="img/cambioClave.png" width="64" height="64" border="0">
                                            	                    <h4>Cambiar<br />Clave</h4>
                                                	          	</a>
                                                    	   	</td>
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
								<td class="textos" style="width: 5px" valign="top" align="center" rowspan="2">
                                	<img alt="" src="img/separador.png" width="5" height="800" border="0">
                               	</td>
								<td>
									<table width="1150" cellpadding="0" cellspacing="0" style="height: 140px;">
										<tr>
											<td align="center">				
												<table width="100%" align="center" style="width: 100%; height: 45px;">
													<tr>
														<td align="left" style="height: 22px">
															<span class="style13">
                                                            	<b> Usuario:</b> <?php echo($_SESSION['usuarioNombre']);?>
                                                            </span>
                                                            <br> 
															<a href="logout.php" class="style13"> Salir </a>
                              							</td>
                                                        <td align="right" style="height: 22px">
															<img alt="" width="200px" src="img/mundopc.png" border="0"></td>
													</tr>
													<tr>
														<td align="right" colspan="2">
															<table style="width: 100%" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="150px">
																		<a href="javascript:reportes();"  onMouseOver="moverimg('mercadeo','img/reportes2.png')" onMouseOut="moverimg('mercadeo','img/reportes1.png')">
                                                                        	<img name="mercadeo" alt="" src="img/reportes1.png" width="112" height="48" border="0">
                                                                       	</a>
                                                                   	</td>
																	<td>
																		<a href="javascript:configuracion();" onMouseOver="moverimg('operaciones','img/configuracion2.png')" onMouseOut="moverimg('operaciones','img/configuracion1.png')">
                                                                        	<img name="operaciones" alt="" src="img/configuracion1.png" border="0" width="150px" >
                                                                      	</a>
                                                                  	</td>
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
								<td class="textos" height="600" style="height: 650px" valign="top">
                                	<br />
			    					<iframe id="contenido" name="contenido" width="100%" height="100%" src="inicio.html" frameborder="0">
                                    </iframe>
                               	</td>
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
                		© <?php echo date("Y")?>. <strong>SMIT</strong>. All rights reserved</td>
                	<td align="right">
        				<span class="style13">Powered by <strong>A.K.A Shennok</strong></span>
					</td>
            	</tr>
        	</table>
        </td>
    </tr>
</table>
</body>
</html>