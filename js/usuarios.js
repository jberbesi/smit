$(function() {
    $( "#usuario" ).autocomplete({
        source: 'buscoU.php',
        minLength: 2,
        select: function(event, ui){
        	this.value = ui.item.value;
      		$(this).next("#idnumber").val(ui.item.idnumber);
      		console.log(ui.item.idnumber);
     return false;
   }
    });
});