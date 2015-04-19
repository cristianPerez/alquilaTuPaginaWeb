function guardarContacto(){
    
    $('#loader').show("slow");
    
    if($('#nombre').val()!=="" && $('#email').val()!==""){
    $.ajax({
        dataType: "json",
        data:
            {
            "nombre": $('#nombre').val(),
            "correo": $('#email').val(),
            },
        type: 'GET',
        url: "http://localhost/alquilaTuPaginaWeb/Controlador/Fachada.php?clase=GuardarInformacion&metodo=registrarContacto",
        success: function(data) {
            if(data.respuesta==='si'){
            $('#nombre').val("");
            $('#email').val("");
            $('#titleAlert').text("Gracias!");
            $('#contetAlert').text("Te escribiremos en breve");
            delayClass(1);
            $('#loader').hide();
            location.reload();
            }
            else if(data === 'no')
            {
                $('#nombre').val("");
                $('#email').val("");
                $('#titleAlert').text("Ups!");
                $('#contetAlert').text("Algo salio mal intenta de nuevo");
                delayClass(2);
                $('#loader').hide();
            }
        },
        error: function(e,es,error) {
                $('#nombre').val("");
                $('#email').val("");
                $('#titleAlert').text("Ups!");
                $('#contetAlert').text("Algo salio mal intenta de nuevo");
                delayClass(2);
        }
    }
); 
        
    }
    else{
        $('#loader').hide();
    }
    

}

function guardarContacto2(){
    
    $('#loader').show("slow");
    
    if($('#nombre').val()!=="" && $('#email').val()!=="" ){
    $.ajax({
        dataType: "json",
        data:
            {
            "nombre": $('#nombre').val(),
            "correo": $('#email').val(),
            "asunto": $('#asunto').val(),
            "mensaje": $('#mensaje').val(),
            },
        type: 'GET',
        url: "http://localhost/alquilaTuPaginaWeb/Controlador/Fachada.php?clase=GuardarInformacion&metodo=registrarContacto2",
        success: function(data) {
            if(data.respuesta==='si'){
            $('#nombre').val("");
            $('#email').val("");
            $('#titleAlert').text("Gracias!");
            $('#contetAlert').text("Te escribiremos en breve");
            delayClass(1);
            $('#loader').hide();
            location.reload();
            }
            else if(data === 'no')
            {
                $('#nombre').val("");
                $('#email').val("");
                $('#titleAlert').text("Ups!");
                $('#contetAlert').text("Algo salio mal intenta de nuevo");
                delayClass(2);
                $('#loader').hide();
            }
        },
        error: function(e,es,error) {
                $('#nombre').val("");
                $('#email').val("");
                $('#titleAlert').text("Ups!");
                $('#contetAlert').text("Algo salio mal intenta de nuevo");
                delayClass(2);
        }
    }
); 
        
    }
    else{
        $('#loader').hide();
    }
    

}


function delayClass(tipos) {
       $("#notificaciones").fadeIn('slow', function(){
          
          if(tipos===1)
            $("#notificaciones").addClass("alert alertSuccess alert-dismissible notificacion2");
           else if(tipos===2)
            $("#notificaciones").addClass("alert alertDanger alert-dismissible notificacion2");
};)}



