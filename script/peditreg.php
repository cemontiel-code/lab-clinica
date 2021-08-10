<?php
include_once('../conn/connect.php');

$adjID= $_POST['adj_id'];
$desc= $_POST['result'];
$real = $_POST['status'];

if ($real == "completado") {
    $estado = 1 ;
} if ($real =="por hacer") {
    $estado = 0 ;
} else {
    $estado=null;
}

$Query = "UPDATE registros SET descripcion='$desc',realizado ='$estado' WHERE adjID ='$adjID' ";

if ($desc="") {
    $Query = "UPDATE registros SET realizado ='$estado' WHERE adjID ='$adjID' ";
}


if ($rsQuery= mysqli_query($con,$Query)==true){
    header('Location:../index.php');
}else {
    echo mysqli_error($con);
};

//
?>