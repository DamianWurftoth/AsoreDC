/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var contador = 1;
$(document).ready(function () {
    $("#btn-guardar-perfil").on("click", function () {

        /*var idUsuario = document.getElementById("txt-usuario").value;*/
        
        //var idUsuario = $("#form-nu #txt-id-u").val();
        if (validarNuevoUsuario()) {
            
            /*addUsuario();*/
            /*actualizarTabla();
            contador++;
            $('#modalNuevoUsuario').modal('hide');
            document.getElementById("form-nu").reset();*/
        }
    });
    /*actualizarTabla();*/
});
function leerDatosNuevoUsuario() {
    var obj = {
        usuario: $("#txt-usuario").val().trim(),
        email: $("#txt-email").val().trim(),
        nombre: $("#txt-nombre").val().trim(),
        apellido: $("#txt-apellido").val().trim(),
        fecha: $("#txt-fecha").val().trim(),
        cedula: $("#txt-cc").val().trim(),
        direccion: $("#txt-direccion").val().trim(),
        telefono:$("#txt-telefono").val().trim(),
        cargo: $("#txt-cargo").val().trim(),
        titulo:$("#txt-titulo").val().trim()
    };
    return obj;
}
/*
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

*/

function getMensajeValidacion(mensaje) {
    var html = '<div class="alert alert-success">' + mensaje +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>';
    return html;
}
function validarNuevoUsuario() {
    var vali = true;
    var nuevoUsuario = leerDatosNuevoUsuario();
    var usu= nuevoUsuario.usuario.split(" ");   
    var regexemail = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    var nom=nuevoUsuario.nombre.split(" ");
    var ape=nuevoUsuario.apellido.split(" ");
    removerAlerts();

    if (nuevoUsuario.usuario === null || nuevoUsuario.usuario.length === 0
            || nuevoUsuario.usuario === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo usuario no puede estar vacio");
        $("#txt-usuario").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (usu.length>=2) {
        alert("entro");
        var mensajeHtml = getMensajeValidacion("El campo no puede ser mas de dos palabras");
        $("#txt-usuario").parent(".form-group").append(mensajeHtml);
    }
    if (regexemail.test($('#txt-email').val().trim())) {

    } else {
        var mensajeHtml = getMensajeValidacion("El campo email no es correcto");
        $("#txt-email").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (nuevoUsuario.nombre === null || nuevoUsuario.nombre.length === 0
            || nuevoUsuario.nombre === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo nombre no puede estar vacio");
        $("#txt-nombre").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (ape.length>2) {
        var mensajeHtml = getMensajeValidacion("El campo apellido no puede ser mas de dos palabras");
        $("#txt-apellido").parent(".form-group").append(mensajeHtml);
    }
    if (nuevoUsuario.apellido === null || nuevoUsuario.apellido.length === 0
            || nuevoUsuario.apellido === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo apellido no puede estar vacio");
        $("#txt-apellido").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (nom.length>=2) {
        var mensajeHtml = getMensajeValidacion("El campo nombre no puede ser mas de dos palabras");
        $("#txt-nombre").parent(".form-group").append(mensajeHtml);
    }
    if (nuevoUsuario.cedula === null || nuevoUsuario.cedula.length === 0
            || nuevoUsuario.cedula === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo cedula no puede estar vacio");
        $("#txt-cedula").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (nuevoUsuario.direccion === null || nuevoUsuario.direccion.length === 0
            || nuevoUsuario.direccion === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo direccion no puede estar vacio");
        $("#txt-direccion").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (nuevoUsuario.telefono === null || nuevoUsuario.telefono.length === 0
            || nuevoUsuario.telefono === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo telefono no puede estar vacio");
        $("#txt-telefono").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (nuevoUsuario.email === null || nuevoUsuario.email.length === 0
            || nuevoUsuario.email === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo email no puede estar vacio");
        $("#txt-email").parent(".form-group").append(mensajeHtml);
        vali = false;
    }

       
    
    
    
    return vali;
}
function removerAlerts(){
    $("#editar-perfil .alert").remove();
}

