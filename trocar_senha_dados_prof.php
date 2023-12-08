<?php
include ("conexao.php");
$senha = md5($_POST['senha']);
$decrypted_string = openssl_decrypt($_POST['id'],"AES-128-ECB",$password_encrypt);
$dados = json_decode($decrypted_string);
if ($_POST['senha'] ==$_POST['csenha'] ) {
    $executa = $db->prepare("update professor set senha=:senha where email=:email");
    $executa->bindParam(':email', $dados->email);
    $executa->bindParam(':senha', $senha);

    $executa->execute();
    if ($executa->execute()){

?>
         <script>alert("Senha alterada com sucesso");
         window.location = "login_prof.html";</script>
<?php
    }
}else {
    echo "senhas não iguais";
}