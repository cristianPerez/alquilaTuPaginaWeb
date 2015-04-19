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
            }
            else if(data === 'no')
            {
                $('#nombre').val("");
                $('#email').val("");
                $('#titleAlert').text("Ups!");
                $('#contetAlert').text("Algo salio mal intenta de nuevo");
                delayClass(2);
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
        $('#titleAlert').text("Ups!");
        $('#contetAlert').text("Completa los campos para poder continuar");
        delayClass(2);
        $('#loader').hide();
    }
    

}

function guardarContacto2(){
    
    $('#loader2').show("slow");
    
    if($('#nombre2').val()!=="" && $('#email2').val()!=="" && $('#asunto').val()!=="na" && $('#mensaje').val()!==""){
    $.ajax({
        dataType: "json",
        data:
            {
            "nombre": $('#nombre2').val(),
            "correo": $('#email2').val(),
            "asunto": $('#asunto').val(),
            "mensaje": $('#mensaje').val(),
            },
        type: 'GET',
        url: "http://localhost/alquilaTuPaginaWeb/Controlador/Fachada.php?clase=GuardarInformacion&metodo=registrarContacto2",
        success: function(data) {
            if(data.respuesta==='si'){
            $('#nombre2').val("");
            $('#email2').val("");
            $('#asunto').val("");
            $('#mensaje').val("");
            $('#titleAlert2').text("Gracias!");
            $('#contetAlert2').text("Te escribiremos en breve");
            delayClass(3);
            $('#loader2').hide();
            }
            else if(data === 'no')
            {
                $('#nombre2').val("");
                $('#email2').val("");
                $('#asunto').val("");
                $('#mensaje').val("");
                $('#titleAlert2').text("Ups!");
                $('#contetAlert2').text("Algo salio mal intenta de nuevo");
                delayClass(4);
                $('#loader2').hide();
            }
        },
        error: function(e,es,error) {
                $('#nombre2').val("");
                $('#email2').val("");
                $('#asunto').val("");
                $('#mensaje').val("");
                $('#titleAlert2').text("Ups!");
                $('#contetAlert2').text("Algo salio mal intenta de nuevo");
                delayClass(4);
                $('#loader2').hide();
        }
    }
); 
        
    }
    else{
        
        $('#loader2').hide();
    }
    

}


function delayClass(tipos) {
    if(tipos===1 || tipos ===2){
         $("#notificaciones").fadeIn('slow', function(){
          if(tipos===1)
            $("#notificaciones").addClass("alert alertSuccess alert-dismissible notificacion2");
           else if(tipos===2)
            $("#notificaciones").addClass("alert alertDanger alert-dismissible notificacion2");
            }   
        )}
        else if (tipos===3 || tipos ===4){
        $("#notificaciones2").fadeIn('slow', function(){
          if(tipos===3)
            $("#notificaciones2").addClass("alert alertSuccess2 alert-dismissible notificacion3");
           else if(tipos===4)
            $("#notificaciones2").addClass("alert alertDanger2 alert-dismissible notificacion3");
            }   
        )}
       
    }
    
      



