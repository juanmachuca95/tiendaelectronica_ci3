$(document).ready(function(){
    $('#show_pss').mousedown(function(){
        var nomClass = $(this).attr('class');
        //alert(nomClass);
        if(nomClass == 'cerrados'){
            $('#inputPassword').removeAttr('type');
            $(this).attr('class','abiertos');
            $('#show_pss').html("&#x1f441;");
        }else{
            $('#inputPassword').attr('type','password');
            $(this).attr('class','cerrados');
            $('#show_pss').html("&#x1f573;");
        }
    });

    $('#show_pss_repet').mousedown(function(){
        var nomClass = $(this).attr('class');
        //alert(nomClass);
        if(nomClass == 'cerrados_repet'){
            $('#inputPasswordRepet').removeAttr('type');
            $(this).attr('class','abiertos_repet');
            $('#show_pss_repet').html("&#x1f441;");
        }else{
            $('#inputPasswordRepet').attr('type','password');
            $(this).attr('class','cerrados_repet');
            $('#show_pss_repet').html("&#x1f573;");
        }
    });
   
    $('#crearUsuario').on('click',function(e){
        e.preventDefault();
    })

    var namePattern = "[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+";
    var emailPattern = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$";
    var passwordPattern  = "[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+";

    

    function checkInputNombre(idInput, pattern){
    return $(idInput).val().match(pattern) ? true : false;
    }
    
    function checkInputApellido(idInput, pattern){
        return $(idInput).val().match(pattern) ? true : false;
    }

    function checkInputEmail(idInput, pattern) {
        return $(idInput).val().match(pattern) ? true : false;
    }

    function checkInputPassword(idInput, idInput2){
        if($(idInput).val() == $(idInput2).val()) {
            return true;    
        }else{
            return false;
        }
    }

    $('#form_usuario').on('submit',function(){
        var valido = true;
        if(checkInputNombre($('#inputNombre'), namePattern)){
            $('#outputNombre').html("* Nombre correcto");
            $('#outputNombre').attr('class','text-success');
        }else{
            valido = false;
            $('#outputNombre').html("Nombre Incorrecto");
            $('#outputEmail').attr('class','text-danger');
        }

        if(checkInputApellido($('#inputApellido'), namePattern )){
            $('#outputApellido').html("* Datos correctos");
            $('#outputApellido').attr('class','text-success');
        }else{
            valido = false;
            $('#outputApellido').html("* Datos Incorrectos");
            $('#outputApellido').attr('class','text-danger');
        }

        if(checkInputEmail($('#inputEmail'), emailPattern)){
            $('#outputEmail').html("* Email correcto");
            $('#outputEmail').attr('class','text-success');
        }else{
            valido = false;
            $('#outputEmail').html("* Email Incorrecto");
            $('#outputEmail').attr('class','text-danger');
        }

        if(checkInputPassword($('#inputPassword'), $('#inputPasswordRepet'))){
            $('#outputPassword').html("* Las contraseñas son correctas");
            $('#outputPassword').attr('class','text-success');
        }else{
            valido = false;
            $('#outputPassword').html("* Las contraseñas no coinciden o no cumplen el formato.");
            $('#outputPassword').attr('class','text-danger');
        }

        
        if(valido == true){
            return true;
        }else{
            //alert("No se envio");
            return false;
        }
    });

});