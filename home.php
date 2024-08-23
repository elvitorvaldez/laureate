<?php
  session_start();
?>
<!DOCTYPE HTML>
<head>
  <title>Login</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">




</head>
<body>
<div class="jumbotron" style="text-align: center;"><h1>BIENVENID@ <?php echo $_SESSION['nombre']?></h1>
<br><a href="logout.php">Cerrar sesi&oacute;n</a></div>
</body>
</HTML