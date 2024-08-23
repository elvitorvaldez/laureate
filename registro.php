<?php
  session_start();
  error_reporting(E_ALL);
ini_set('display_errors', '1');
  //require_once("conecta.php");

?>
<!DOCTYPE HTML>
<head>
	<title>Registro</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<style>
	</style>

<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


</head>
<body>

<div class="container">
<nav class="navbar navbar-default" style="text-align: center;"><img src="https://d5tnfl9agh5vb.cloudfront.net/uploads/2015/12/upn_blog_ser-glob_liu-final_02-dic.png" width="15%"></nav>
<h2>Registro</h2>

<form name="Form1" id="Form1" method="POST">
<div id="c1" style="border-style: double; padding: 20px 30px 20px 30px;">


    <div class="input-group">
      <span class="input-group-addon"><b>Nombre(s)</b></span>
      <input style="width:150" type="text" class="form-control" name="Nombre" id="Nombre" required>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><b>Apellido Paterno</b></i></span>
      <input style="width:40%" type="text" class="form-control" name="APaterno" id="APaterno" required>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><b>Apellido Materno</b></span>
      <input style="width:40%" type="text" class="form-control" name="AMaterno" id="AMaterno" required>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><b>Genero</b></span>
      <select style="width:40%" class="form-control" name="Genero" id="Genero" required>
        <option value="">Seleccione una opción</option>
        <option value="1">Masculino</option>
        <option value="2">Femenino</option>
      </select>
    </div>
      <div class="input-group">
      <span class="input-group-addon"><b>Edad</b></span>
      <input style="width:10%" type="number" class="form-control" name="Edad" id="Edad" required>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><b>Estado Civil</b></span>
      <select style="width:40%" class="form-control" name="Edocivil" id="Edocivil" required>
        <option value="">Seleccione una opción</option>
        <option value="1">Soltero</option>
        <option value="2">Casado</option>
      </select>
  </div>
  <div class="input-group">
      <span class="input-group-addon"><b>Nivel de interés</b></span>
      <select style="width:40%" class="form-control" name="Nivel" id="Nivel" required>
        <option value="">Seleccione una opción</option>
        <option value="1">Preparatoria</option>
        <option value="2">Licenciatura</option>
        <option value="3">Postgrado</option>
      </select>
  </div>
  <div class="input-group" id='EspecialidadDiv'>
      <span class="input-group-addon"><b>Especialidad</b></span>
      <select style="width:40%" class="form-control" name="Especialidad" id="Especialidad">
        <option value="">Seleccione una opción</option>
        
      </select>
  </div>
      <div class="input-group">
      <span class="input-group-addon"><b>E-mail</b></span>
      <input style="width:40%" type="email" name='Email' id="Email" class="form-control" required>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><b>Contraseña</b></span>
      <input style="width:40%" type="password" name='Password' id="Password" class="form-control" required>
    </div>
            

<br>
<button type="submit" class="btn btn-info">Guardar</button>
   <div class="alert alert-success" id="alerta" style="display: none;">
    <strong><div id="status"></div></strong> <div id="mensaje"></div>
   </div>
    <div style="height: 10px"></div>




<script language = "JavaScript">

    $(document).ready(function() {

        $('#EspecialidadDiv').hide();


        $("#Nivel").on("change", function() {
        	$("#Especialidad").empty();

        	if ($("#Nivel").val()!='1')
            {
            	$('#EspecialidadDiv').show();
              $('#EspecialidadDiv').prop('required',true);
            	$('#Especialidad').prepend("<option value=''>Seleccione una especialidad</option>");
            	
            	if ($("#Nivel").val()=='2')
            	{
            		$('#Especialidad').prepend("<option value='1'>Lic en Derecho</option>");
            		$('#Especialidad').prepend("<option value='2'>Lic en Finanzas</option>");
            	}
            	if ($("#Nivel").val()=='3')
            	{
            		$('#Especialidad').prepend("<option value='3'>Mtría en Admón de Negocios</option>");
            		$('#Especialidad').prepend("<option value='4'>Mtría en Dirección de Proyectos</option>");
            	}
            }
        else
        	{
        		$('#EspecialidadDiv').hide();
            $('#EspecialidadDiv').prop('required',false);
        	}


        });

        $("#Form1").submit(function(event) {
            event.preventDefault();

            var parametros = new FormData($(this)[0]);
            parametros.append('operacion', "Registrar");
            $.ajax({
                    type: "POST",
                    url: "save.php",
                    data: parametros,
                    contentType: false,
                    processData: false

                })
                .done(function(data) {
                    if (data.status == "OK") {
                        $("#alerta").removeClass("alert-danger");
                        $("#alerta").addClass("alert-success");
                    } else {
                        $("#alerta").removeClass("alert-success");
                        $("#alerta").addClass("alert-danger");
                    }

                    $('#mensaje').empty();
                    $('#mensaje').append(data.mensaje);
                    $('#status').empty();
                    $('#status').append(data.status + "!");
                    $('#alerta').show(1000);
                    setTimeout(function() {
                        $('#alerta').hide(1000);
                    }, 3000);


                });
        });


    }); 
  </script>



  
      

</body>
</html>




