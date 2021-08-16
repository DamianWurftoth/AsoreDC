/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $("#iniciarSesion").submit(function (event) {
        //event.preventDefault();
        var email = $("#usuario").val();
        var contraseña = $("#contraseña").val();
        if (email === "admin@sda.gov.co" && contraseña === "admin") {
            
            $(this).attr("action", "SI/Administrador/examples/user.html");
            
            //window.location.href = "SI/Administrador/index.html";
//            $('#ingresar').attr("href","SI/Administrador/index.html");
            return true;
        } else if (email === "supervisor@sda.gov.co" && contraseña === "supervisor") {
            
            $(this).attr("action", "SI/Supervisor/examples/Perfil.html");
                       
        } else if (email === "boss@sda.gov.co" && contraseña === "boss") {
            $(this).attr("action", "SI/Jefe_Supervisores/examples/Perfil.html");
        } else if (email === "analista@sda.gov.co" && contraseña === "analista") {
            $(this).attr("action", "SI/Analista/examples/user.html");
        } else if (email === "auditor@sda.gov.co" && contraseña === "auditor") {
            $(this).attr("action", "SI/Auditor/examples/Perfil.html");
        } else {
            alert("No ingreso de forma correcta los datos");
        }
    });
    $("#obser").click(function () {
//       var nombreContacto = $("nombreCont").val();
//       var emailContacto = $("emailCont").val();
//       var obserContacto = $("obserCont").val();
        loadValidator('#contactenosForm');
    });
    $("#enviar").click(function () {
        var email = $("#emailRecuperar").val();
        if (email === "admin@sda.gov.co") {
            alert("Su contraseña es admin");

        } else if (email === "supervisor@sda.gov.co") {
            alert("Su contraseña es Supervisor");
        } else if (email === "boss@admin.gov.co") {
            alert("Su contraseña es boss");
        } else if (email === "analista@sda.gov.co") {
            alert("Su contraseña es analista");
        } else if (email === "auditor@sda.gov.co") {
            alert("Su contraseña es auditor");
        }
    });
    
});
//$(document).ready(function () {
//    $("#form-login").submit(function () {
//        var email = $("#form-login #txt-email").val();
//        var pass = $("#form-login #txt-password").val();
//        if(email === "admin@miapp.com" && pass === "123456"){
//            $("#form-login").attr("action","app/administrador/index.html");
//            return true;
//        }else if(email === "cliente@miapp.com" && pass === "123456"){
//            $("#form-login").attr("action","app/cliente/index.html");
//            return true;
//        }
//        alert("Usuario y/o clave incorrectos");
//        return false;
//    });
//});


function loadValidator(form) {
    
    $.validate({
        form: form,
        modules: 'security',
        onError: function ($form) {
            alert('Validation of form ' + $form.attr('id') + ' failed!');
        },
        onSuccess: function ($form) {
            alert("Nos pondremos en contacto con usted lo antes posible");
            return true; // Will stop the submission of the form
        },
        onValidate: function ($form) {
            
        },
        onElementValidate: function (valid, $el, $form, errorMess) {
            console.log('Input ' + $el.attr('name') + ' is ' + (valid ? 'VALID' : 'NOT VALID'));
        }
    });
}