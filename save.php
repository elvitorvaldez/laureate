<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("conecta.php");
$retorno="Error al guardar los datos";
$status="UPS";

if ($_POST['operacion']=="Registrar")
{
@$Nombre=$_POST['Nombre'];
@$APaterno=$_POST['APaterno'];
@$AMaterno=$_POST['AMaterno'];
@$Genero=$_POST['Genero'];
@$Edad=$_POST['Edad'];
@$Edocivil=$_POST['Edocivil'];
@$Nivel=$_POST['Nivel'];
@$Especialidad=$_POST['Especialidad'];
if ($Nivel==1){$Especialidad=0;}
@$Email=$_POST['Email'];
@$Password=md5($_POST['Password']);

  $query="INSERT INTO Registro (Nombre, APaterno, AMaterno, IdGenero, Edad, IdEdoCivil, idNivel, IdEspecialidad, Email, Password) 
  VALUES ('".$Nombre."', '".$APaterno."', '".$AMaterno."', '".$Genero."', '".$Edad."', '".$Edocivil."', '".$Nivel."', '".$Especialidad."', '".$Email."', '".$Password."');";

  if (mysqli_query($link,$query))
  {
  	$retorno="Se han actualizado los datos";
  	$status="OK";
  }


}
else if ($_POST['operacion']=="Login")
{
		
@$user=$_POST['user'];
@$passwd=md5($_POST['passwd']);
$retorno="bad";
 $query="select Nombre, APaterno from Registro where Email='$user' and Password='$passwd';";
  $resultado=mysqli_query($link,$query);

 while ($fila = mysqli_fetch_assoc($resultado)) {
    $retorno = "";
    $status = "";
    session_start();
    $_SESSION['usuario']=$user;
    $_SESSION['nombre']=$fila['Nombre'].$fila['APaterno'];
}
echo $retorno;
  
}

$data['mensaje']=$retorno;

$data['status']=$status;
header('Content-type: application/json; charset=utf-8');
echo json_encode($data);

die();
?>