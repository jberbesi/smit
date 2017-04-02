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
?>