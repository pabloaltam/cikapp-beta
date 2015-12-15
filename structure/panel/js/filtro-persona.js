/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
   // Pegar en filtro-personas 
    $('#nombre-completo').click(function () {
  
        if ($(this).is(':checked')) {
            $('#txtNombreCompleto').removeAttr('disabled');
        } else {
            $('#txtNombreCompleto').attr('disabled', true);
            $('#txtNombreCompleto').val("");
            ajax();
        }
    });
    //fin
    $('#conocimientos').click(function () {
  
        if ($(this).is(':checked')) {
            $('#txtConocimientos').removeAttr('disabled');
        } else {
            $('#txtConocimientos').attr('disabled', true);
            $('#txtConocimientos').val("");
            ajax();
        }
    });
    $('#estudios').click(function () {
   
        if ($(this).is(':checked')) {
            $('#txtEstudios').removeAttr('disabled');
        } else {
            $('#txtEstudios').attr('disabled', true);
            $('#txtEstudios').val("-1");
            ajax();
        }
    });
    $('#nivIngles').click(function () {
 
        if ($(this).is(':checked')) {
            $('#txtNivIngles').removeAttr('disabled');
        } else {
            $('#txtNivIngles').attr('disabled', true);
            $('#txtNivIngles').val("-1");
        ajax();
        }
    });
    $('#region').click(function () {
 
        if ($(this).is(':checked')) {
            $('#txtRegion').removeAttr('disabled');
        } else {
            $('#txtRegion').attr('disabled', true);
            $('#txtRegion').val("-1");
            ajax();
        }
    });
    $('#ciudad').click(function () {

        if ($(this).is(':checked')) {
            $('#txtCiudad').removeAttr('disabled');
        } else {
            $('#txtCiudad').attr('disabled', true);
            $('#txtCiudad').val("-1");
            ajax();
        }
    });
//pegar
 $('#txtNombreCompleto').keyup(function () {
        ajax();
    });
//fin-pegar
    $('#txtConocimientos').change(function () {
        ajax();
    });
    $('#txtEstudios').change(function () {
        ajax();
    });
    $('#txtNivIngles').change(function () {
        ajax();
    });
    $('#txtRegion').change(function () {
        ajax();
    });
    $('#txtCiudad').change(function () {
        ajax();
    });

    function ajax() {
        var dataString = "";
        var idU = $('#idU').val();
        dataString+="filtro-persona=1&idU="+idU;
        // Pegar
        if ($('#nombre-completo').is(':checked')) {
            
            var nombreCompleto = $('#txtNombreCompleto').val();
            if(nombreCompleto !== "" )
            dataString += '&NomCom=' + nombreCompleto;
        }
        //fin-pegar
        if ($('#conocimientos').is(':checked')) {
            
            var conocimientos = $('#txtConocimientos').val();
            if(conocimientos !== "" )
            dataString += '&Con=' + conocimientos;
        }
        if ($('#estudios').is(':checked')) {
            var estudio = $('#txtEstudios').val();
            if(estudio != "-1" )
            dataString += '&Est=' + estudio;
        }
        if ($('#nivIngles').is(':checked')) {
            var nivIngles = $('#txtNivIngles').val();
            if(nivIngles != "-1" )
            dataString += '&Nvi=' + nivIngles;
        }
        if ($('#region').is(':checked')) {
            var region = $('#txtRegion').val();
            if(region != "-1" )
            dataString += '&Reg=' + region;
        }
        if ($('#ciudad').is(':checked')) {
            var ciudad = $('#txtCiudad').val();
            if(ciudad != "-1" )
            dataString += '&Ciu=' + ciudad;
        }
        console.log(dataString)
        if (dataString !== "") {
            $.ajax({
                type: "GET",
                url: "include/resultado-ajax.php",
                data: dataString,
                cache: false,
                success: function (html)
                {
                    $("#scroll").html(html);
                }, beforeSend: function(){
                  $("#scroll").html("<p>Buscando profesionales...</p>");
                }
            });
        } else {
            $("#scroll").html("<p>Seleccione al menos una opción y elija segun corresponda...</p>");
        }
    }
})