$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper .contact-form '); //Input field wrapper
    var fieldHTML = '<div class="row flex-row"><div class="col-xs-4"><label class="required">Largo</label><input type="text"></div><div class="col-xs-4"><label class="required">Ancho</label><input type="text"></div><div class="col-xs-4"><button type="button" class="btn btn-default remove_button" >-</button></div></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append('<p class="mb-0 mt-20">Pared '+ x +'</p><div class="row flex-row"><div class="col-xs-4"><label class="required">Largo</label><input type="text"></div><div class="col-xs-4"><label class="required">Ancho</label><input type="text"></div><div class="col-xs-4"><button type="button" class="btn btn-default remove_button" >-</button></div></div>'); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});