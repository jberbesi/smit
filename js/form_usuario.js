function validar_form(theForm)
{
	var cuenta = 0;
	
	for (var i=0;i<theForm.elements.length;i++)
	{
		var elemento = theForm.elements[i];
		if (elemento.type == "checkbox")
		{
			if (elemento.checked)
			{
				cuenta = cuenta + 1;
			}
		}
	}
	if (cuenta == 0)
	{
		alert ("Debe asociar al menos un Permiso al usuario");
		return;
	}
	if((theForm.txtpassword.value)!=(theForm.txtverif.value))
	{
	alert("El Password y la Confirmación deben coincidir!!!");
	theForm.txtpassword.value="";
	theForm.txtverif.value="";
	theForm.txtpassword.focus();
	return;
	}
	if(theForm.txtnombre.value.length == 0)
	{
	alert("Debe indicar nombre");
	theForm.txtnombre.focus();
	return;
	}
	if(theForm.txtapellido.value.length == 0)
	{
	alert("Debe indicar apellido");
	theForm.txtapellido.focus();
	return;
	}
	if(theForm.txtlogin.value.length == 0)
	{
	alert("Debe indicar login");
	theForm.txtlogin.focus();
	return;
	}
	document.getElementById("form_registro").submit();
}