<?php
session_start();
if (@$_SESSION['nombre'])
{
header('Location: home.php');
exit;
}
else
{
?>
<!DOCTYPE HTML>
<head>
  <title>Login</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">




</head>
<body>
<div class="container" style='border-style: double;'>
<nav class="navbar navbar-default" style="text-align: center;"><img src="https://d5tnfl9agh5vb.cloudfront.net/uploads/2015/12/upn_blog_ser-glob_liu-final_02-dic.png" width="15%">
</nav>
<h4>Inicio de sesi&oacute;n</h4>
<form name="loginForm" id="loginForm" method="POST">
  <div class="form-group">
    <label for="user">Correo Electrónico</label>
    <input style="width:30%" type="text" class="form-control" name="user" id="user"
           placeholder="Introduce tu nombre de usuario">
  </div>
  <div class="form-group">
    <label for="passwd">Contrase&ntilde;a</label>
    <input style="width:30%" type="password" class="form-control" id="passwd" id="passwd" 
           placeholder="Contrase&ntilde;a">
  </div>
 
  <button id="login" type="submit" class="btn btn-default">Entrar</button>
  <div style="clear:both; height: 10px;">&nbsp;</div>
  <div id ="exito" class="alert alert-success" style="display:none">
  <strong>Login OK!</strong> En breve ser&aacute; redireccionado.
</div>

<div id ="fallo" class="alert alert-danger" style="display:none">
  <strong>Error!</strong> Usuario o contrase&ntilde;a inv&aacute;lidos.
</div>

</form>
</div>



<script language="JavaScript">

$( document ).ready(function() {
    $( "#loginForm" ).submit(function( event ) {    
    event.preventDefault();
    $(this).serialize();
            $.ajax({
                    type: "POST",
                    url: "save.php",
                    data: { user: $('#user').val(), passwd: $('#passwd').val(), operacion: 'Login' }
                })
                .done(function(data) {
        
         if (data.status == "UPS")
        {
          $( "#fallo" ).show();
        }
        else
        {
          $( "#fallo" ).hide();
          $( "#exito" ).show();
          location.href="home.php";
        }
      });
  });
});
</script>
</body>
</html>
<?php } ?>