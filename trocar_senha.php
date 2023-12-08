    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
<?php
/**
 * Created by PhpStorm.
 * User: UNIUV
 * Date: 06/11/2018
 * Time: 14:16
 */


include ("conexao.php");


if (!isset($_GET['id']) or $_GET['id']=='') {

    echo 'token incorreto!';
    exit;

}

$decrypted_string = openssl_decrypt($_GET['id'],"AES-128-ECB",$password_encrypt);
$dados = json_decode($decrypted_string);


if (!isset($dados->email)){
    echo 'token incorreto.';
    exit;
}

$executa = $db->prepare("select * from responsavel where email=:email");
$executa->bindParam(':email',$dados->email);
$executa->execute();
if ($executa->rowCount()==0){
    echo 'token incorreto';
    exit;
}
$linha=$executa->fetch(PDO::FETCH_OBJ);

?>
  <div class="container">

    <form class="login-form" action="trocar_senha_dados.php" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i><font color="#000080" ><center>Alterar senha</center></font>
        <br><div class="input-group">
         <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" ><br>
          <span class="input-group-addon"><i  class="icon_profile"></i></span>
          <input type="password" class="form-control" placeholder="Senha" name="senha" autofocus>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="password" class="form-control" placeholder="Confirmar Senha" name="csenha" autofocus>
            </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button>
      </div>
    </form>
  </div>
    

</form>
