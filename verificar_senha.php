
<?php
include ("conexao.php");
session_start();
$executa = $db->prepare("SELECT * FROM responsavel WHERE usuario=:usuario");
$executa->BindParam(':usuario', $_POST['usuario']);
$resultado = $executa->execute();
$senha = $_POST['senha'];
$login = $_POST['usuario'];

if ($executa->rowCount()==1){
    $linha = $executa->fetch(PDO::FETCH_OBJ);
    //$senha_criptografada = criptografa($_POST['senha']);
        
    if ($linha->usuario==$_POST['usuario'] AND $linha->senha==$_POST['senha']){
        $_SESSION['acesso_liberado'] = 1;
                $_SESSION['cod_responsavel'] = $linha->cod_responsavel;
        $_SESSION['usuario'] = $_POST['usuario'];

        $_SESSION['usuario'] = $linha->usuario;
        $_SESSION['login_primeira'] = $linha->login_primeira;
    
        if ($linha->login_primeira == "1") {
             header("Location: primeiro_login_form.php?usuario={$linha->usuario} ");
        } 
        else {
            header("Location: menu_pais.php");
        }
        exit;
    }
 else {
        # code..
    
        echo 'usuário e/ou senha incorretos=';
    }}
else{
    echo 'usuario e/ou senha incorretos';
    }

    ?>
    <a class="btn btn-danger" href="login.html">Voltar</a><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

