<?php
include_once('conn/connect.php');
session_start();
if(isset($_SESSION['usuarioID'])){
    $ID = $_SESSION['usuarioID'];
    $QUERY = "Select * from personal Where id='$ID'";
    $rsQUERY = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));
    $countQUERY = mysqli_num_rows($rsQUERY);
    if($countQUERY<=0){
    header('Location:login.php');
    exit;
    }

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
 <script src="script/busqueda.js"></script>
 <title>inicio</title>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid bg-light">
    <img src="data:image/jpeg;base64,<?php echo base64_encode( $_SESSION['fotoUsuario'] );?>" width="105px" height="105px">
    <?php
        echo $_SESSION['fullName'];
    ?> <br />
    <br />
<a href="script/plogout.php">Cerrar Sesion</a>
<br /><br />
<h2>Menu Opciones</h2>
<ol>
 <li><a href="index.php">volver al menu incial</a></li>
</ol>

</div>



<form name='busqueda'>  
    <input type="text" name="str"  size='50' id="searchbar" >
    <input type="button" onclick="showResult()" value="buscar">
    <input type="button" onclick="showAll()" value="mostrat todo">
</form>
<div id="livesearch"></div>
</body>
</html>