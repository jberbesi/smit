function validar_form(theForm){ 
		if((theForm.clnv.value)!=(theForm.clco.value)){
			alert("El Password y la Confirmacion deben coincidir!!!");
			document.getElementById("clnv").value = "";
			document.getElementById("clco").value = "";
			document.getElementById("clnv").focus();
			return false;
		}
		else
			return true;
	}