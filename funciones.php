<?php
	function colorFondo ($cont){
		$resto = $cont % 2;
		if ($resto==0){
			$color = '"#FFFFFF"';
		}
		else{
			$color = '"#F3F3F3"';
		}
		return ($color);
	}

	function porcetanje ($total, $parte)
	{
		return($porcetanje = ($parte * 100)/$total);
	}

	function porcetanje_indicador ($total, $parte)
	{
		return($porcetanje = ($parte * 25)/$total);
	}

	function evaluar_parametro ($parametro,$cantidad)
	{
		if ($cantidad < $parametro)
		{
			return(porcetanje_indicador($parametro,$cantidad));
		}
		else
		{
			return(25);
		}
	}

	function evaluar_parametro1 ($parametro,$cantidad)
	{
		if ($cantidad < $parametro)
		{
			return(porcetanje_indicador($parametro,$cantidad));
		}
		else
		{
			return(0);
		}
	}

	function procentaje_cobro($cont)
	{
		if ($cont < 50)
			return(0);
		if (($cont >= 50) && ($cont <= 60))
			return(0.1);
		if (($cont > 60) && ($cont <= 70))
			return(0.2);
		if (($cont > 50) && ($cont <= 80))
			return(0.3);
		if (($cont > 80) && ($cont <= 90))
			return(0.4);
		if (($cont > 90) && ($cont <= 100))
			return(0.5);
	}
?>