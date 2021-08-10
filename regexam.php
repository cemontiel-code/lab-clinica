<?php
session_start();
if(isset($_SESSION['usuarioID'])){
    if (isset($_GET['id'])) {
        $id_paciente = $_GET['id'];
        echo $id_paciente;
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
<?php echo $id_paciente;?>
<hr>
<form name="Registro-Paciente" action="script/pregexam.php" method="post">
    <h1>
        registro de  nuevos examenesexamenes
    </h1>

 <input type="hidden" name="paciente_id" value="<?php echo $id_paciente ?>"><br />
 <label for="examen">tipos de examen</label>
 <input list="examenes" name="examen">
  <datalist id="examenes">
    <option value="Hemograma completo">
    <option value="Urinalisis completo">
    <option value="Heces por parasito, sangre oculta">
    <option value="Perfil renal: Nitrógeno de urea, Creatinina, Ácido úrico, Proteína total, albúmina/globulina calcio, glucosa">
    <option value="Perfil lipídico: Colesterol, LDL; HDL; triglicérido">
    <option value="Perfil hepático: Bilirrubina, total y directa, AST, LDH">
    <option value="Perfil triode: TSH, T3, T4">
    <option value="Panel básico metabólico: Electrolitos, glucosa, nitrógeno de urea,creatinina">
  </datalist>
<br>
   <label for="status">estatus del examen</label>
   <input list="Estatuses"  name="status">
    <datalist id="Estatuses">
        <option value="completado">
        <option value="por hacer">
    </datalist>
   <br>
 <label> fecha de cita</label><br />
 <input type="date" require name="cita"><br />
 <br>
 <textarea id="textarea1" 
      class="input shadow" 
      name="result" 
      rows="15" 
      cols="100" 
      placeholder="Resultados de Examen ">
   </textarea>
   <br>
 <button type="submit" name="btn" class="btn btn-default">subir</button>
</form>
</body>
</html>









