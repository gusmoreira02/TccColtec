
<?php
include ("conexao.php");
session_start();
$executa = $db->prepare("SELECT * FROM usuario WHERE usuario=:usuario");
$executa->BindParam(':usuario', $_POST['usuario']);
$resultado = $executa->execute();
$senha = $_POST['senha'];
$login = $_POST['usuario'];

if ($executa->rowCount()==1){
    $linha = $executa->fetch(PDO::FETCH_OBJ);
    //$senha_criptografada = criptografa($_POST['senha']);
        
    if ($linha->usuario==$_POST['usuario'] AND $linha->senha==$_POST['senha']){
        $_SESSION['acesso_liberado_adm'] = 1;
                $_SESSION['cod_usuario'] = $linha->cod_usuario;
        $_SESSION['usuario'] = $_POST['usuario'];

        $_SESSION['usuario'] = $linha->usuario;
        $_SESSION['login_primeira'] = $linha->login_primeira;
        $ret['msg'] = 'ok';
        $ret['status'] = 1;
    
    }
    else{
        $ret['msg'] = 'usuario e/ou senha incorretosaaaaa';
        $ret['status'] = 0;
    }
}else{
    $ret['msg'] = 'usuario e/ou senha incorretos';
    $ret['status'] = 0;
}
echo json_encode($ret);

    ?>