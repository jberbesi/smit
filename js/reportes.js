$(function() {
    $( "#Vendedor" ).autocomplete({
        source: 'busco.php',
        minLength: 2,
        select: function(event, ui){
        	this.value = ui.item.value;
      		$(this).next("#idnumber").val(ui.item.idnumber);
      		console.log(ui.item.idnumber);
     return false;
   }
    });
});

function verificar(nombre,mes,ano,vendedor,codigo)
{
	bien = true;
	if (mes == 0)
	{
		alert('Debe indicar un mes.');
		bien = false;
	}
	else if (ano == 0)
	{
		alert('Debe indicar un año.');
		bien = false;
	}
	if (bien)
	{
		ventanaSecundaria (nombre,mes,ano,vendedor,codigo);
	}
}

function ventanaSecundaria (nombre,mes,ano,vendedor,codigo)
{ 
   window.open(""+nombre+".php?mes="+mes+"&ano="+ano+"&vendedor="+vendedor+"&codigo="+codigo,"Reportes","width=700, height=550, scrollbars=yes, menubar=yes, location=no, resizable=yes")
}