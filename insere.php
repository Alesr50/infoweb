<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbaula";

$nome=$_GET['nome'];
$senha=$_GET['senha'];
$email=$_GET['email'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tblusuario(nomeusuario, senhausuario, emailusuario)
VALUES ('$nome', '$senha', '$email')";

if (mysqli_query($conn, $sql)) {
  echo "Registro Cadastrado";
  header("Location: listar.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
