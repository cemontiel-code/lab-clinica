<?php
include_once('conn/conexion.php');
session_start();
if(isset($_SESSION['usuarioID'])){
 $ID = $_SESSION['usuarioID'];
 $QUERY = "Select * from usuarios Where usuarioID='$ID'";
 $rsQUERY = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));
 $countQUERY = mysqli_num_rows($rsQUERY);
 if($countQUERY<=0){
 header('Location: index.php');
 }

}else{
 header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <title>PHP + MySQL</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css" integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</head>
<body>

 <h2> Listado de Usuarios </h2>
<table border="1">
<tr>
<th>ID</th>
<th>Foto</th>
<th>Nombre</th>
<th>Apellido</th>
<th>telefonoMovil</th>
<th>Correo</th>
</tr>
<?php
$QUERY = "SELECT * FROM personal WHERE ";
$rsQUERY = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));
while($fileQUERY = mysqli_fetch_array($rsQUERY)){
?>
<tr>
<td><?php echo $fileQUERY['usuarioID']; ?></td>
<td><?php
 if(!empty($fileQUERY['foto'])){
 $rutaFoto = 'fotos/' . $fileQUERY['foto'];
 }else{
 $rutaFoto = 'fotos/silueta.jpg';
 }
?>
<img src="<?php echo $rutaFoto; ?>" width="75px" height="75px">
</td>
<td><?php echo $fileQUERY['nombre']; ?></td>
<td><?php echo $fileQUERY['apellido']; ?></td>
<td><?php echo $fileQUERY['telefonoMovil']; ?></td>
<td><?php echo $fileQUERY['correo']; ?></td>
<td>
 <a href="modificarUsuarios.php?ID=<?php echo $fileQUERY['usuarioID']; ?>"
title="Modificar"><i class="material-icons" style="font-size:26px">mode_edit</i></a>
 <a href="#" title="Eliminar" onClick="eliminar(<?php echo $fileQUERY['usuarioID']; ?>)"><i
class="material-icons" style="font-size:26px">delete</i></a></td>
</tr>
<?php } ?>
</table>
<?php
mysqli_close($con);
?>
<br />
<a href="menu.php" title="Regresar"><i class="material-icons"
style="font-size:26px">arrow_back</i></a>
<a href="agregarUsuarios.php" title="Nuevo Usuario"><i class="material-icons" style="font-size:26px">dvr</i></a>
<script>
function eliminar(id){
var id = id;
 confirmar = confirm("Deseas Borrar el Registro");
 if(confirmar == true) {
 url = 'process/usuarios.php?ID='+id+'&borrar=si';
 location.href=url;

 alert("¡Eliminado!, El registro se eliminó completamente");
 return true;
 }else{
 alert("Cancelado, El registro No se eliminó");
 return false;
 }
 window.refresh();
}
</script>
</body>
</html>