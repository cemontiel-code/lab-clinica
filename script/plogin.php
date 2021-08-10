<?php
include_once('../conn/connect.php');
session_start();
$email = null;
$pwd = null;
if(isset($_POST['btn'])){
 if(isset($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['email']) && !
empty($_POST['pwd'])){
 echo 'Recibio del POST', '<br />';
 $email = $_POST['email'];
 $pwd =$_POST['pwd'];

 echo $email, '<br />';
 echo $pwd, '<br />';
 $Query = "Select * From personal Where correo='$email' And password='$pwd'";
 $Result = mysqli_query($con, $Query) or die('Error: ' . mysqli_error($con));
 $fileQuery = mysqli_fetch_array($Result);
 $NofileQuery = mysqli_num_rows($Result);

 if($NofileQuery > 0){
 $_SESSION['usuarioID'] = $fileQuery['id'];
 $_SESSION['fullName'] = $fileQuery['p_nombre'] . ' ' .$fileQuery['s_nombre'] . ' ' .$fileQuery['apellido'];

 if(!empty($fileQuery['foto_id'])){
 $_SESSION['fotoUsuario'] = $fileQuery['foto_id'];
 }else{
 $_SESSION['fotoUsuario'] = null;
 }
 header('Location: ../index.php');
 }else{
 session_destroy();
 header('Location: ../login.php');
 }
 }else{
 session_destroy();
 header('Location: ../login.php');
 }
}else{
 session_destroy();
 header('Location: ../login.php');
}

mysqli_close($con);
?>