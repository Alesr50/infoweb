<?php
@ini_set('display_errors', '1');
error_reporting(E_ALL);

$id        = $_POST["id"];
$nome      = $_POST["nome"];
$email = $_POST["email"];
$senha     = $_POST["senha"];

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

$sql = 'UPDATE tblUsuario SET  nomeUsuario=?, emailUsuario=? ,senhaUsuario = ? WHERE idUsuario = ?';
$stmt = $conn->prepare($sql) or die($conn->error);

if(!$stmt){
  echo 'erro na consulta: '. $conn->errno .' - '. $conn->error;
}

$stmt->bind_param('sssi', $nome, $email,$senha, $id);
$stmt->execute();
header("Location: listar.php");
?>