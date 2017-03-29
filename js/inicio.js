function inicio()
   	{
     $(document).ready(function(){

	 $('#submenuoReportes').fadeIn(1500);
     $('#submenuConfiguracion').hide();
     });
  }
  
  function reportes()
   {
     $(document).ready(function(){

	 $('#submenuoReportes').fadeIn(1500);
	 $('#submenuConfiguracion').hide();
     });
  }
  
  function configuracion()
   {
     $(document).ready(function(){

	 $('#submenuoReportes').hide();
	 $('#submenuConfiguracion').fadeIn(1500);
     });
  }
	function moverimg(img_name,img_src) {
		document[img_name].src=img_src;
	}     

	inicio();