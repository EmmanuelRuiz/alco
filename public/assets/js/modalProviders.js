$(document).ready(function(){

	$("#services").blur(function(){
		var services = this.value;

		$.ajax({
			url: URL + '/lista-de-proveedores',
			data: {services: services},
			type: 'POST',
			success: function(response){
				if (response == "number") {
					$("#prueba").css("border", "5px solid red");
				}else{
					$("#prueba").css("border", "5px solid green");
				}
			}
		})
	});

});