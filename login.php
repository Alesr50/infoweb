<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbAula";


// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
    header("Location: login.html"); exit;
}


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// Validação do usuário/senha digitados


$sql = "SELECT idUsuario, nomeUsuario, emailUsuario FROM tblUsuario WHERE nomeUsuario ='$usuario' and senhausuario=$senha and ativo=1";
$result = mysqli_query($conn, $sql);
if  (mysqli_num_rows($result) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "Login inválido!"; 
    
} else {
    
    echo "entrou";
}




mysqli_close($conn);

?>