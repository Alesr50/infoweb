<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Editar Usuário</title>
</head>
<body>
    

<?php

$id = $_GET["idUsuario"];
settype($id, "integer");



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

$sql = "SELECT idUsuario, nomeUsuario,loginUsuario, emailUsuario,senhaUsuario FROM tblUsuario WHERE idUsuario= $id";
$result = mysqli_query($conn, $sql);

while($row = $result->fetch_assoc()) {
$id        = $row["idUsuario"];
$nome      = $row["nomeUsuario"];
$login      = $row["loginUsuario"];
$email = $row["emailUsuario"];
$senha = $row["senhaUsuario"];}

?>


<div class="container">
        <form action="edita.php" method="post">
            <p>Editar  Cadastro</p>

          
            <div class="field">
                <label>ID</label>
                <input type="number" name="id" id="id" value="<?php echo $id;?>"  min="1" readonly>
            </div>
            <div class="field">
                <label>Nome</label>
                <input type="text" name="nome" id="nome" value="<?php echo $nome;?>" required>
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" id="email" value="<?php echo $email;?>" required>
            </div>
            <div class="field">
                <label>Login</label>
                <input type="email" name="email" id="email" value="<?php echo $login;?>" required>
            </div>
          
            <div class="field">
                <label>Senha</label>
                <input type="password" name="senha" id="senha" value="<?php echo $senha;?>" required>
            </div>
            <button type="submit" id="button" class="button"  onclick="window.location.href='edita.php?=$id';">Editar</button>
        </form>

    </div>

</body>
</html>

