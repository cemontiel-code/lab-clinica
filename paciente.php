<?php
include_once('conn/connect.php');
session_start();
if(isset($_SESSION['usuarioID'])){
    $ID = $_SESSION['usuarioID'];
    $QUERY = "Select * from personal Where id='$ID'";
    $rsQUERY = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));
    $countQUERY = mysqli_num_rows($rsQUERY);
    if($countQUERY<=0){header('Location:login.php');    exit;}
    if (isset($_GET['id'])) {
        $id_paciente = $_GET['id'];
        $sql = "SELECT * FROM clientes Where id='$id_paciente'";
        $sqlResult = mysqli_query($con,$sql) or die('Error: ' . mysqli_error($con));
        $numRows = mysqli_num_rows($sqlResult);
        if ($numRows <=0 ) {header('Location:login.php');  exit;}
        else {
           while ($rows = mysqli_fetch_array($sqlResult)) {
               $foto = $rows['foto'];
               $ced = $rows['ced'];
               $nombre = $rows['p_nombre']." ".$rows['s_nombre']." ".$rows['apellido'];
               $tlf = $rows['tlf'];
               $direccion= $rows['dir_cliente'];
               $correo = $rows['correo'];
               $sexo = $rows['sexo'];
               $naci = $rows['fecha_n'];
               $med_hist = $rows['paciente_id'];
           }
        }
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
 <title>Pacientes</title><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css" integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous">
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
 <li><a href="index.php">volver al menu incial</a></li>
</ol>
<hr>
<div>
    <table border='1px'>
          <tr>
          <th>foto</th>
          <th>nombre</th>
          <th>dni</th>
          <th>telefono</th>
          <th>correo electronico</th>
          <th>direccion</th>
          <th>genero</th>
          <th>fecha de nacimiento</th>
          </tr>
          <tr>
          <td> <img src="data:image/jpeg;base64,<?php echo base64_encode( $foto );?>" width="105px" height="105px"> </td>
          <td> <h3><?php echo $nombre; ?></h3> </td>
          <td> <h2><?php echo $ced;    ?> </h2></td>
          <td>     <?php echo $tlf;    ?></td>
          <td>     <?php echo $correo; ?></td>
          <td>     <?php echo $direccion?></td>
          <td>     <?php echo $sexo;   ?></td>
          <td>     <?php echo $naci;   ?></td>
          </tr>
          </table>
          
</div>
<hr>
    <ol>
        <li><a href='regexam.php?id=<?php echo $med_hist; ?>'>agregar examen</a></li>
    </ol>
    <?php echo $med_hist; ?>
<hr>
<div>
       <table border='1px'>
          <tr>
            <th>nomvre</th>
            <th>desc.</th>
            <th>fecha de cita</th>
            <th>Estatus de examen</th>
          </tr>
          <tr>
        <?php 
            $queryExam = "SELECT * FROM registros Where paciente_id='$med_hist'";
            $resultExam = mysqli_query($con,$queryExam) or die('Error: ' . mysqli_error($con));
            $noRows = mysqli_num_rows($sqlResult);
            if ($numRows <=0 ) {header('Location:login.php');  exit;}
            else {
                while ($fileExam = mysqli_fetch_array($resultExam)) {
                $nombre_exam = $fileExam['nombre_registro'];
                $desc = $fileExam['descripcion'];
                $fecha_reg = $fileExam['fecha_registro'];
                $cita = $fileExam['fecha_cita'];
                $adj_id = $fileExam['adjID'];
                if (isset($fileExam['realizado'])) {
                    if ($fileExam['realizado']==1) {
                        $realizado ="completado.";
                   }else{
                       $realizado = 'por hacer.';
                   }
                }else {
                    $realizado = "sin cita por venir";
                }
                echo "<td>".$nombre_exam."</td>"      ;
                echo "<td>".$desc."</td>"      ;
                echo "<td>".$cita."</td>"      ;
                echo "<td>".$realizado."</td>"      ;
                echo "<td> <a href='editreg.php?id=".$adj_id."'>selecionar</a></td>";
                echo "</tr>"      ;
                }
                echo "</table>";
            }
        ?>
</div>

<div></div>
</body>
</html>