<?php
include_once('../conn/connect.php');

$paciente_id = $_POST['paciente_id'];
$examen = $_POST['examen'];
$cita = $_POST['cita'];
$contenido =$_POST['result'];
$real = $_POST['status'];
$adjuntos_id = random_int(1000,9999);

if ($real == "completado") {
    $estado = 1 ;
} if ($real =="por hacer") {
    $estado = 0 ;
} else {
    $estado=null;
}
$Query = "INSERT INTO registros (paciente_id,nombre_registro,fecha_cita, adjID,realizado,descripcion) values ('$paciente_id','$examen','$cita','$adjuntos_id','$estado','$contenido')";
if ($rsQuery= mysqli_query($con,$Query)==true){
    header('Location:../index.php');
}else {
    echo mysqli_error($con);
};
?>