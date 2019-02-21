$(document).ready(function(){

	$(".btn-services").unbind("click").click(function(){
		$.ajax({
			url: URL + '/lista-de-proveedores',
			type: 'GET',
			data: {services: $(this).attr("data-services")},
			success: function(response){

				if (response >= 1) {
					$("#prueba").css("border", "5px solid green");
					$("#html").html(response);
				}else{
					$("#prueba").css("border", "5px solid red");
					$("#html").html(response);
				}
				
			}
		})
	});

});