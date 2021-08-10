<?php
include_once('../conn/connect.php');
$q = $_GET['q'];

$Query = "SELECT * FROM clientes WHERE ced LIKE '".$q."%'
OR  p_nombre LIKE '".$q."%' 
OR  apellido LIKE '".$q."%'";
$Result = mysqli_query($con,$Query);
$NofileQuery = mysqli_num_rows($Result);

if($NofileQuery<1){
    echo "sin resultados";
}else{
    echo "<table>
          <tr>
          <th>nombre</th>
          <th>apellido</th>
          <th>dni</th>
          <th>telefono</th>
          <th>correo electronico</th>
          <th>direccion</th>
          <th>genero</th>
          <th>fecha de nacimiento</th>
          </tr>";
    while($fileQuery = mysqli_fetch_array($Result)){
     echo "<tr>";
     echo "<td>" . $fileQuery['p_nombre']." ".$fileQuery['s_nombre'] . "</td>";
     echo "<td>" . $fileQuery['apellido'] . "</td>";
     echo "<td>" . $fileQuery['ced'] . "</td>";
     echo "<td>" . $fileQuery['tlf'] . "</td>";
     echo "<td>" . $fileQuery['correo'] . "</td>";
     echo "<td>" . $fileQuery['dir_cliente'] . "</td>";
     echo "<td>" . $fileQuery['sexo'] . "</td>";
     echo "<td>" . $fileQuery['fecha_n'] . "</td>";
     echo "<td> <a href='paciente.php?id=".$fileQuery['id']."'>selecionar</a></td>";
     echo "</tr>";
    }
    echo "</table>";
}

?>