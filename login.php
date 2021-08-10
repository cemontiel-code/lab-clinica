<?php
session_start();
if(isset($_SESSION['usuarioID'])){
    header("location:index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
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
    
<form name="login" action="script/plogin.php" method="post">
 <h1>PHP + MySQL</h1>
 <hr>
 <h2>Inicio de sesion</h2>

 <label>Email address:</label><br />
 <input type="email" name="email"><br />
 <label>Password:</label><br />
 <input type="password" name="pwd"><br />

 <br />
 <button type="submit" name="btn" class="btn btn-default">Entrar</button>
</form>

<span> Photo by <a href="https://unsplash.com/@aboutiwe?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Irwan iwe</a> on <a href="https://unsplash.com/s/photos/medic?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
</span> 
</body>
</html>