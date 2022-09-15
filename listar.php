<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   



    <title>Document</title>
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

$sql = "SELECT idUsuario, nomeUsuario, emailUsuario FROM tblUsuario";
$result = mysqli_query($conn, $sql);





if (mysqli_num_rows($result) > 0) {
  echo "<thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>        
        <th>Email</th></tr></thead>

    <tbody>";



    while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row["idUsuario"]."</td>
        <td>".$row["nomeUsuario"]."</td>
        <td>".$row["emailUsuario"]."</td> 
        <td><a href='editar.php'>Editar</a></td>
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