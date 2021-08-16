/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    
    $("#btn-bloquear1").hover(onHover, onLeave);
    $("#btn-bloquear2").hover(onHover, onLeave);
    $("#btn-bloquear3").hover(onHover, onLeave);
    $("#btn-bloquear4").hover(onHover, onLeave);
    $("#btn-bloquear5").hover(onHover, onLeave);

        
    $("#btn-bloquear1").on("click", function () {

        var notify = $.notify('<strong>Guardando</strong> No cierre la pagina...', {
            allow_dismiss: false,
             showProgressbar: true
            });

        setTimeout(function() {
            notify.update({'type': 'success', 'message': '<strong>Gracias</strong> Tu usuario ha sido inhabilitado', 'progress': 25});
            }, 4500);


    });

    $("#btn-add-bloqueo").click(function () {
        loadValidator('#form-bloqueo');
    });


    $("#btn-bloquear2").on("click", function () {

        var notify = $.notify('<strong>Saving</strong> Do not close this page...', {
            allow_dismiss: false,
             showProgressbar: true
            });

        setTimeout(function() {
            notify.update({'type': 'success', 'message': '<strong>Success</strong> Your page has been saved!', 'progress': 25});
            }, 4500);
        });
    $("#btn-bloquear3").on("click", function () {

        var notify = $.notify('<strong>Saving</strong> Do not close this page...', {
            allow_dismiss: false,
             showProgressbar: true
            });

        setTimeout(function() {
            notify.update({'type': 'success', 'message': '<strong>Success</strong> Your page has been saved!', 'progress': 25});
            }, 4500);
        });
    $("#btn-bloquear4").on("click", function () {

        var notify = $.notify('<strong>Saving</strong> Do not close this page...', {
            allow_dismiss: false,
             showProgressbar: true
            });

        setTimeout(function() {
            notify.update({'type': 'success', 'message': '<strong>Success</strong> Your page has been saved!', 'progress': 25});
            }, 4500);
        });
    $("#btn-bloquear5").on("click", function () {

        var notify = $.notify('<strong>Saving</strong> Do not close this page...', {
            allow_dismiss: false,
             showProgressbar: true
            });

        setTimeout(function() {
            notify.update({'type': 'success', 'message': '<strong>Success</strong> Your page has been saved!', 'progress': 25});
            }, 4500);
        });
});
function onHover() {
          $(this).removeClass('bloqueado');
          $(this).addClass('en uso');
          $(this).text($(this).attr('on-hover'));
        }
function onLeave() {
          $(this).removeClass('en uso');
          $(this).addClass('bloqueado');
          $(this).text($(this).attr('on-leave'));
        }
function loadValidator(form) {
    
    $.validate({
        form: form,
        modules: 'security',
        onError: function ($form) {
            /*alert('Validation of form ' + $form.attr('id') + ' failed!');*/
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

/*function leerDatosNuevoUsuario() {
    var obj = {
        id: $("#form-nu #txt-id-u").val().trim(),
        nombres: $("#txt-nombres-u").val().trim(),
        apellidos: $("#txt-apellidos-u").val().trim(),
        telefono: $("#txt-telefono-u").val().trim(),
        email: $("#txt-correo-u").val().trim(),
        cedula: $("#txt-cedula-u").val().trim()
    };
    return obj;
}
function addUsuario() {
    var obj = leerDatosNuevoUsuario();
    usuarios.push(obj);
}

function actualizarTabla() {
    $("#tbl-usuarios>tbody").html("");
    for (var i = 0; i < usuarios.length; i++) {
        var obj = usuarios[i];
        var html = "" +
                "<tr>" +
                "<td>" + obj.id + "</td>" +
                "<td>" + obj.nombres + "</td>" +
                "<td>" + obj.apellidos + "</td>" +
                "<td>" +
                "<a id=\"btn-ver-" + i + "\" class=\"btn btn-success\"  data-toggle=\"modal\" data-target=\"#modalDetalle\"><i class=\"fa fa-eye\"></i></a>" +
                "<a id=\"btn-eliminar-" + i + "\" class=\"btn btn-danger\"><i class=\"fa fa-trash\"></i></a>" +
                "</td>" +
                "</tr>";
        $("#tbl-usuarios>tbody").append(html);
        addEvtEliminar(i);
        addEvtVer(i);
    }
}

function addEvtEliminar(i) {
    $("#btn-eliminar-" + i).click(function () {
        var usuario = usuarios[i];
        //var ii = $(this).attr("id").replace("btn-eliminar-", "");
        var rta = confirm("¿Está seguro de eliminar a " + usuario.nombres + " " + usuario.apellidos + "?");
        if (rta) {
            usuarios.splice(i, 1);
            actualizarTabla();
        }
    });
}

function addEvtVer(i) {
    $("#btn-ver-" + i).click(function () {
        var usuario = usuarios[i];
        var htmlModal = $("#modalDetalle .modal-body").html();
        //alert(htmlModal);
        htmlModal = htmlModal.replace("#nombres#", usuario.nombres);
        htmlModal = htmlModal.replace("#apellidos#", usuario.apellidos);
        htmlModal = htmlModal.replace("#telefono#", usuario.telefono);
        htmlModal = htmlModal.replace("#email#", usuario.email);
        htmlModal = htmlModal.replace("#cedula#", usuario.cedula);
        //alert(htmlModal);
        $("#modalDetalle .modal-body").html(htmlModal);

    });
}


function getMensajeValidacion(mensaje) {
    var html = '<div class="alert alert-warning">' + mensaje +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>';
    return html;
}

function validarNuevoUsuario() {
    var vali = true;
    var nuevoUsuario = leerDatosNuevoUsuario();
    var ape = nuevoUsuario.apellidos.split(" ");
    removerAlerts();
    //alert(nuevoUsuario.id);
    if (nuevoUsuario.id === null || nuevoUsuario.id.length === 0
            || nuevoUsuario.id === "") {
        var mensajeHtml = getMensajeValidacion("El campo id no puede estar vacio");
        $("#txt-id-u").parent(".form-group").append(mensajeHtml);

        //alert("El campo id no puede estar vacio");
        vali = false;
    } if (isNaN(nuevoUsuario.id)) {
        var mensajeHtml = getMensajeValidacion("El campo id solo acepta números");
        $("#txt-id-u").parent(".form-group").append(mensajeHtml);
        //alert("El campo id solo acepta números");
        vali = false;
    } if(nuevoUsuario.apellidos === null || nuevoUsuario.apellidos.length === 0
            || nuevoUsuario.apellidos === ""){
        var mensajeHtml = getMensajeValidacion("El campo no puede estar vacio.");
        $("#txt-apellidos-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    } if(ape.length > 2){
        var mensajeHtml = getMensajeValidacion("Solo se aceptan máximo 2 palabras.");
        $("#txt-apellidos-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    return vali;
}

function removerAlerts(){
    $("#form-nu .alert").remove();
}*/