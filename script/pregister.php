<?php
include_once('../conn/connect.php');

$ced      = $_POST['ced'];
$p_nombre = $_POST['p_nombre'];
$s_nombre = $_POST['s_nombre'];
$apellido = $_POST['apellido'];
$tlf      = $_POST['tlf'];
$dir_cli  = $_POST['dir_cliente'];
$correo   = $_POST['correo'];
$sexo     = $_POST['sexo'];
$fecha_N  = $_POST['fecha-nacimiento'];
$foto     = $_POST['foto'];
$reg_id = random_int(10000,99999);


$Query = "Insert Into clientes (ced,p_nombre,s_nombre,apellido,tlf,dir_cliente,correo,sexo,fecha_n,paciente_id,foto) values ('$ced','$p_nombre','$s_nombre','$apellido','$tlf','$dir_cli','$correo','$sexo','$fecha_N','$reg_id','$foto')";
if ($rsQuery= mysqli_query($con,$Query)==true){
    header('Location:../index.php');
}else {
    echo mysqli_error($con);
};
?>