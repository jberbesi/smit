<?php 
	include 'conectar.php';
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"/>
<title>SMIT</title>
<link rel="icon" type="image/png" href="img/favicon.png" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
	function movepic(img_name,img_src) {
		document[img_name].src=img_src;
	}
</script>
<!-- Buscar logo desde la tabla parametros -->
</head>
<body  style="background-image: url('img/diagonal.png')">
	<table cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
    	<tr>
        	<td style="height: 183px;">      
        		<table style="width: 1093px; height: 100%" cellspacing="0" cellpadding="0">
					<tr>
						<td style="height: 250px">
							<table style="width: 98%; height: 295px" cellspacing="0" cellpadding="0" align="center">
								<tr>
									<td valign="top">
										<table style="width: 100%; height: 100%" cellspacing="0" cellpadding="0" class="style15">
											<tr>
												<td style="height: 250px">	
        											<!--seccion-->
        											<?php
        												if (isset($_POST["Submit"]))
															{
    															$vusumls = trim($_POST['usuml']);
																$vpswmls = trim($_POST['pswml']);
																if (valido_password($vusumls,$vpswmls))
																{
																	?>
																		<script type="text/javascript">
																			window.location = "index.php"
																		</script>
                 													<?php
																}
																else
																{
																	?>
													<form  method="post" >
														<table style="width: 95%" cellspacing="0" cellpadding="0" align="center">
                            								<tr>
                        										<td style="height: 37px;" colspan="4" class="style16">
                        											<strong>Error - Invalido Usuario/Password.</strong>
                                                               	</td>
                            								</tr>
                            								<tr>
                        										<td style="height: 22px;" colspan="4" class="textos" valign="top">
                                                                	Vuelva a intentarlo...
                        										</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 14px;">
                        											<font size="2"><span class="textos">
                                                                    	<strong>Usuario:</strong>
                                                                   	</span></font>
                                                              	</td>
                                								<td style="width: 42px; " rowspan="8"></td>
                        										<td style="width: 160px;" rowspan="5">                        
                                                					<img alt="" src="img/login_icon.png" />
                                                                </td>
                        										<td rowspan="8" >
                        	                    					<img alt="" src="img/hola.png"/>
                                                               	</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 29px;">
                                                					<input class=form name="usuml" size="32"/>
                                                             	</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 20px;">
                        											<font size="2"><span class="textos">
                                                                    	<strong>Password:</strong>
                                                                  	</span></font>
                                                           		</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 21px;">
                                                					<input class=form name="pswml" type="password" size="32"/>
                                                               	</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 20px;">
                                            						<input class=boton name="Submit" type="submit" value="Ingresar" style="height: 26px"/>
                                                               	</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 20px;">&nbsp;
                                                				</td>
                        										<td style="height: 20px; width: 160px;">&nbsp;
                                                				</td>
                            								</tr>
                            								<tr>
                        										<td class="textos" style="height: 25px; width: 180px;">&nbsp;
                                                				</td>
                        										<td style="width: 160px; height: 25px;" class="textos">&nbsp;
                        										</td>
                            								</tr>
                            								<tr>
                        										<td style="height: 20px; width: 180px;" class="textos">&nbsp;</td>
                        										<td style="height: 20px; width: 160px;">&nbsp;
                        										</td>
                            								</tr>
                            							</table>
                   									</form> 
                									<?php
																}	
													}
													else
													{
							
													?>
													<form  method="post" >
                  										<table style="width: 95%" cellspacing="0" cellpadding="0" align="center">
                        									<tr>
                        										<td style="height: 37px;" colspan="4" class="style16">
                        											<strong>Ingresar</strong>
                                                              	</td>
                            								</tr>
                            								<tr>
                        										<td style="height: 22px;" colspan="4">
                        										</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 14px;">
                        											<font size="2"><span class="textos">
                                                                    	<strong>Usuarior:</strong>
                                                                  	</span></font>
                                                               	</td>
                                								<td style="width: 42px; " rowspan="8"></td>
                        										<td style="width: 160px;" rowspan="5">
                        											<img alt="" src="img/login_icon.png" />
                                                              	</td>
                        										<td rowspan="8" >
                        											<img alt="" src="img/hola.png" />
                                                               	</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 29px;">
                                                					<input class=form name="usuml" size="32"/>
                                                               	</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 20px;">
                        											<font size="2"><span class="textos">
                            	                                       	<strong>Password:</strong>
                                                                   	</span></font>
                                                               	</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 21px;">
                                                					<input class=form name="pswml" type="password" size="32"/>
                                                               	</td>
                            								</tr>
                            								<tr>
                        										<td style="width: 180px; height: 20px;">
                                           							<input class=boton name="Submit" type="submit" value="Ingresar" style="height: 26px"/>
                                                               	</td>
                           									</tr>
                           									<tr>
                        										<td style="width: 180px; height: 20px;">&nbsp;
                                               					</td>
                        										<td style="height: 20px; width: 160px;">&nbsp;
                                                				</td>
                            								</tr>
                            								<tr>
                        										<td class="textos" style="height: 25px; width: 180px;">&nbsp;
                                               					</td>
                        										<td style="width: 160px; height: 25px;" class="textos">&nbsp;
                        										</td>
                            								</tr>
                            								<tr>
                        										<td style="height: 20px; width: 180px;" class="textos">&nbsp;</td>
                       											<td style="height: 20px; width: 160px;">&nbsp;
                       											</td>
                           									</tr>
                            							</table>
                        							</form>
        											<?php 
													} 
													?>
                        						</td>
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
        	<td style="height: 5px" bgcolor="#ffffff" ></td>
    	</tr>
    	<tr>
        	<td style="height: 15px" bgcolor="#ffffff" >
        		<table style="width: 99%; height: 71px;" cellspacing="0" cellpadding="0">
            		<tr>
                		<td style="width: 484px" valign="top">&nbsp;
                		</td>
                		<td align="right" valign="top">
        					<span class="style14"><br /></span><span class="style13">© <?php echo date("Y")?>. <strong>SMIT</strong>. All rights reserved<br />Powered by Shennok</span>
						</td>
            		</tr>
        		</table>
        	</td>
    	</tr>
	</table>
</body>
</html>