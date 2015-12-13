$(document).ready(function () {
    $("#cargando").hide();
    $("#avisos").show();
    $('#chkCargo').click(function () {
  
        if ($(this).is(':checked')) {
            $('#cargo').removeAttr('disabled');
        } else {
            $('#cargo').attr('disabled', true);
            $('#cargo').val("");
            ajax();
        }
    });
    $('#chkCon').click(function () {
   
        if ($(this).is(':checked')) {
            $('#Con').removeAttr('disabled');
        } else {
            $('#Con').attr('disabled', true);
            $('#Con').val("-1");
            ajax();
        }
    });
    $('#chkReg').click(function () {
 
        if ($(this).is(':checked')) {
            $('#Reg').removeAttr('disabled');
        } else {
            $('#Reg').attr('disabled', true);
            $('#Reg').val("-1");
            ajax();
        }
    });
    $('#chkCiu').click(function () {

        if ($(this).is(':checked')) {
            $('#Ciu').removeAttr('disabled');
        } else {
            $('#Ciu').attr('disabled', true);
            $('#Ciu').val("-1");
            ajax();
        }
    });

    $('#cargo').keyup(function () {
        ajax();
    });
    $('#Con').change(function () {
        ajax();
    });
    $('#Reg').change(function () {
        ajax();
    });
    $('#Ciu').change(function () {
        ajax();
    });

    function ajax() {
        var dataString="";
dataString +="es="+$("#tipo").val();
        if ($('#chkCargo').is(':checked')) {
            
             var conocimientos = $('#cargo').val();
            if(conocimientos !== "" )
            dataString += "&cargo="+conocimientos;
        }
        if ($('#chkCon').is(':checked')) {
            var estudio = $('#Con').val();
            if(estudio != "-1" )
            dataString+="&Con=" + estudio;
        }
        if ($('#chkReg').is(':checked')) {
            var region = $('#Reg').val();
            if(region != "-1" )
            dataString+="&Reg=" + region;
        }
        if ($('#chkCiu').is(':checked')) {
            var ciudad = $('#Ciu').val();
            if(ciudad != "-1" )
            dataString+="&Ciu=" + ciudad;
        }
        console.log(dataString)
            if (dataString !== "") {
            $.ajax({
                type: "POST",
                url: "include/resultado-ajax.php",
                data: dataString,
                cache: false,
                error: function (){
                     console.log(dataString)
                },
                success: function (html)
                {
                    $("#cargando").hide();
                    $("#avisos").show();
                    $('#avisos').html(html)
                }, beforeSend: function(){
                    $("#cargando").show();
                    $("#avisos").hide();
                    
                  console.log("Cargando....");
                }
            });
        } else {
           console.log(dataString)
        }
    }
})
$(document).load(function (){
    $("#avisos").hide();
})