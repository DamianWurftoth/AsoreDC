/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var contador = 1;
var usuarios = new Array();

for (var i = 0; i < 3; i++) {
    var objG = {
        id: 123456 + 1,
        nombres: "Alfredo" + i,
        apellidos: "Manrrique "+ i,
        telefono: 123123 + i,
        email: "amanrique" + i + "@sda.com",
        cedula:1073266999 + i
    };
    usuarios.push(objG);
}

//usuarios[usuarios.length] = objG;

$(document).ready(function () {
    $("#nuevo-usuario").on("click", function () {
        if (contador===1) {
           removerAlerts(); 
        }
        
         if (validarNuevoUsuario()) {
            alert("entro");
            addUsuario();
            actualizarTabla();
            contador++;
            $('#modalNuevoUsuario').modal('hide');
            document.getElementById("form-nu").reset();
            }         
    

        
        
    });
    actualizarTabla();
});
function leerDatosNuevoUsuario() {
    var obj = {
        id: $("#form-nu #txt-id-u").val().trim(),
        nombres: $("#txt-nombres-u").val().trim(),
        apellidos: $("#txt-apellidos-u").val().trim(),
        telefono: $("#txt-telefono-u").val().trim(),
        email: $("#txt-email-u").val().trim(),
        cedula: $("#txt-cedula-u").val().trim()
    };
    return obj;
}

function addUsuario() {
    alert("en");
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
    var id2= nuevoUsuario.id.split(" ");   
    var regexemail = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    var nom=nuevoUsuario.nombres.split(" ");
    var ape=nuevoUsuario.apellidos.split(" ");
    removerAlerts();

    if (nuevoUsuario.id === null || nuevoUsuario.id.length === 0
            || nuevoUsuario.id === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo id no puede estar vacio");
        $("#txt-usuario-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (id2.length>=2) {
        var mensajeHtml = getMensajeValidacion("El campo no puede ser mas de dos palabras");
        $("#txt-usuario-u").parent(".form-group").append(mensajeHtml);
    }
    if (nuevoUsuario.nombres === null || nuevoUsuario.nombres.length === 0
            || nuevoUsuario.nombres === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo nombre no puede estar vacio");
        $("#txt-nombre").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (nom.length>=2) {
        var mensajeHtml = getMensajeValidacion("El campo nombre no puede ser mas de dos palabras");
        $("#txt-nombre-u").parent(".form-group").append(mensajeHtml);
    }
    if (nuevoUsuario.apellidos === null || nuevoUsuario.apellidos.length === 0
            || nuevoUsuario.apellidos === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo apellido no puede estar vacio");
        $("#txt-apellido-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (ape.length>2) {
        var mensajeHtml = getMensajeValidacion("El campo apellido no puede ser mas de dos palabras");
        $("#txt-apellido-u").parent(".form-group").append(mensajeHtml);
    }
    if (nuevoUsuario.telefono === null || nuevoUsuario.telefono.length === 0
            || nuevoUsuario.telefono === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo telefono no puede estar vacio");
        $("#txt-telefono-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (regexemail.test($('#txt-email-u').val().trim())) {

    } else {
        var mensajeHtml = getMensajeValidacion("El campo email no es correcto");
        $("#txt-email-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (nuevoUsuario.email === null || nuevoUsuario.email.length === 0
            || nuevoUsuario.email === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo email no puede estar vacio");
        $("#txt-email-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
    if (nuevoUsuario.cedula === null || nuevoUsuario.cedula.length === 0
            || nuevoUsuario.cedula === "" ) {
        var mensajeHtml = getMensajeValidacion("El campo cedula no puede estar vacio");
        $("#txt-cedula-u").parent(".form-group").append(mensajeHtml);
        vali = false;
    }
   
    
    return vali;
}

function removerAlerts(){
    $("#form-nu .alert").remove();
}