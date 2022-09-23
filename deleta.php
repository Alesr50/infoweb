<?php

$id        = $_GET["idUsuario"];


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

$sql = 'UPDATE tblUsuario SET  ativo=0 WHERE idUsuario = ?';
$stmt = $conn->prepare($sql) or die($conn->error);

if(!$stmt){
  echo 'erro na consulta: '. $conn->errno .' - '. $conn->error;
}

$stmt->bind_param('i', $id);
$stmt->execute();
header("Location: listar.php");
?>