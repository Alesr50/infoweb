<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Lista de Usuários</title>


     <script language="Javascript">
function confirmacao(id) {
     var resposta = confirm("Deseja remover esse registro?");
     if (resposta == true) {
          window.location.href = "deleta.php?idUsuario="+id;
     }
}
</script>
 
</head>
<body>




<table id="myTable" class="display">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbAula";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT idUsuario, nomeUsuario, emailUsuario FROM tblUsuario where ativo=1";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  echo "<thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>        
        <th>Email</th
      </tr>        
      </thead>
    <tbody>";
  
    while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row["idUsuario"]."</td>
        <td>".$row["nomeUsuario"]."</td>
        <td>".$row["emailUsuario"]."</td> 
        <td><a href='editar.php?idUsuario=".$row["idUsuario"]."'>Editar</a></td>
        <td><a href='javascript:func()' onclick='confirmacao(".$row["idUsuario"].")' >Excluir</a></td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>      
        
    </tbody>
</table>
</body>
</html>