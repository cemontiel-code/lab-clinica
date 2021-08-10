<?php
include_once('conn/connect.php');
session_start();
if(isset($_SESSION['usuarioID'])){
    $regID=$_GET['id'];
}else{
 header('Location:login.php');
 exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>regostro de pacientes</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css" integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</head>
<!-- 
    Diseñe un programa en PHP para la gestión administrativa de exámenes de laboratorios clínicos, en donde se pueda
    ingresar la información del paciente y se genere la solicitud de los exámenes de laboratorios a realizar, de igual
    forma se debe de ingresar los resultados de los exámenes practicados al paciente, los mismo resultados debe de ser
    enviados por correo en formato pdf.
    Base de datos en Mysql

    Photo by <a href="https://unsplash.com/@aboutiwe?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Irwan iwe</a> on <a href="https://unsplash.com/s/photos/medic?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
  
-->
<body>
Bienvenido: <br />
<img src="data:image/jpeg;base64,<?php echo base64_encode( $_SESSION['fotoUsuario'] );?>" width="105px" height="105px">
<br />
<?php
echo $_SESSION['fullName'];
?> <br />
<a href="script/plogout.php">Cerrar Sesion</a>
<br /><br />
<h2>Menu Opciones</h2>
<ol>
 <li><a href="index.php">volver al menu principal</a></li>
</ol>

<hr>

<div class="flex-box">
    <form action="script/peditreg.php" method="post">

    <input type="hidden" name="adj_id" value="<?php echo $regID ?>"><br />
   <textarea id="textarea1" 
      class="input shadow" 
      name="result" 
      rows="15" 
      cols="100" 
      placeholder="Your text here ">
   </textarea>
   <br>
   <label for="status">estatus de examen</label>
   <input list="Estatuses"  name="status">
    <datalist id="Estatuses">
        <option value="completado">
        <option value="por hacer">
    </datalist>
   <br>
   <input type="submit" class="btn-primary "value="guardar">
   </form>
</div>
</body>
</html>