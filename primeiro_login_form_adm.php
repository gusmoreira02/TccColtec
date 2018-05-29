<?php

include ("conexao.php");
session_start();


$executa = $db->prepare("SELECT * FROM usuario WHERE usuario=:usuario");
$executa->bindParam(':usuario',$_SESSION['usuario']);

$executa->execute();

$linha = $executa->fetch(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>EDITAR</title>

</head>
<body>
<form action="primeiro_login_adm.php" method="post">
    
<input type="hidden" name="usuario" value=" <?php echo $_SESSION['usuario'] ?>"><br>
    Senha:<input type="text" name="senha" ><br>
    <button type="submit">Salvar</button>
    </form>
    </body>
    </html>
  