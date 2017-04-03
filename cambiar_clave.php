<?php
	session_start();
	If (!isset($_SESSION['usuario']))
	{
		header("location:default.php");
		exit;
	}
	include 'conectar.php';
	$cambio = false;
	$igual = 3;	 
	If (isset($_POST['clvact']))
	{
		$actual = $_POST['clvact'];	
		$cambio = verificar_clave($_SESSION['usuario'],$_POST['clvact']);
	}
?>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
	
    <table border="0" width="700" align="center">
  		<tr>
			<td colspan="5" height="45" class="style11">Cambiar Clave</td>
		</tr>
        <?php if(($cambio == false) && ($igual == 3)) { ?>
        <tr>
			<td class="Negro" colspan="4" align="center"> 
				<form action="cambio_clave.asp" method="post" name="estadoForm"> 
					<table align="center" class="style2">
						<tr>
					  		<td>
                            	<strong>Ingrese clave actual</strong>
                            	<input type="password" id="clvact" name="clvact" value="" size="30" style="height:25px">
                            </td>
                            <td height="20" colspan="4" align="center"  >
                            	<input type="submit" name="func" value="Enviar" / class="Negro" style="height:25px"> 
                            </td>
						</tr>
					</table>
                </form>
			</td>
		</tr>
        <?php }
		if ($igual == 2) { ?>
       	 <tr>
			<td class="Negro" colspan="4" align="center"> 
				<form action="cambio_clave.asp" method="post" name="estadoForm"  onSubmit="javascript:return validar_form(this);")>
                	<input type="HIDDEN" id="igual" name="igual" value="<%=igual%>" />
					<table align="center" class="style2">
						<tr>
					  		<td>
                            	<strong>Clave nueva: </strong>
                            </td>
                            <td>
                            	<input type="password" id="clnv" name="clnv" value="" size="30" style="height:25px">
                            </td>
                        </tr>
                        <tr>
					  		<td>
                            	<strong>Verificar clave</strong>
                            </td>
                            <td>
                            	<input type="password" id="clco" name="clco" value="" size="30" style="height:25px">
                            </td>
                            <script>
								document.getElementById("clnv").value = "";
								document.getElementById("clco").value = "";
								document.getElementById("clnv").focus();
							</script>
                        </tr>
                        <tr>
                            <td height="20" colspan="4" align="center"  >
                            	<input type="submit" name="func" value="Enviar" / class="Negro" style="height:25px"> 
                            </td>
						</tr>
					</table>
                </form>
			</td>
		</tr>
        <?php }
		if ($igual == 3) { ?>
       	<tr>
			<td colspan="4" height="35" align="center" style="background-color: #EDDADF"><b>Error de clave. Ingrese clave actual</b></td>
            <script>
				document.getElementById("clvact").focus();
			</script>  
		</tr>
        <?php }
		if ($igual == 1) { ?>
       	<tr>
			<td colspan="4" height="35" align="center" style="background-color: #EDDADF"><b>
            	Cambio de clave exitoso. Cierre esta aplicacion y acceda al sistema con su nuevo Password!
                <%Session.Abandon()%>
            </b></td>  
		</tr>
        <?php } ?>
	</table>
</body>