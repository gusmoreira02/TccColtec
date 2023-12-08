    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
    <title>Primeiro Login</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

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
<body><body  class="">

  <div class="container">

    <form class="login-form" action="primeiro_login_adm.php" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i><font color="#000080" ><center>BEM VINDO!</center><br>Vejo que é seu primeiro login, Por favor, escolha uma nova senha.</p><br></font>
        <div class="input-group">
        <input type="hidden" name="usuario" value=" <?php echo $_SESSION['usuario'] ?>"><br>
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="password" class="form-control" placeholder="Senha" name="senha" autofocus>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button>
      </div>
    </form>
  </div>
    
    </form>
    </body>
    </html>
  