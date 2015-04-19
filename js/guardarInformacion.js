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
                //$("#notificaciones").attr("class", "alert alert-success alert-dismissible notificacion2");
                //$("#notificaciones").removeClass("notificacion1");
                //$("#notificaciones").addClass("notificacion2");
                delayClass();
                $('#loader').hide();
            }
            else if(data === 'no')
            {
                //window.alert("ocurrio un problema intentelo de nuevo");
                window.location.href="http://localhost/alquilaTuPaginaWeb";
                $("#notificaciones").attr("class", "alert alertSuccess alert-dismissible notificacion2");
                
                $('#loader').hide();
            }
        },
        error: function(e,es,error) {
            window.alert("Ocurrio un error intentalo mas tarde");
            $('#loader').hide();
        }
    }
); 
        
    }
    else{
        //window.alert("Hay campos incompletos!!!");
        $('#loader').hide();
    }
    

}


function delayClass() {
       $("#notificaciones").fadeIn('slow', function(){
       $("#notificaciones").addClass("notificacion2");
}
)}



