<?php
$dbHost = "localhost";
$dbUser = 'root';
$dbPassword = '';
$dBase = 'clinica_lab';

$con = mysqli_connect($dbHost,$dbUser,$dbPassword,$dBase);
// Check connection
if(mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 

?>