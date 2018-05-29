
	

<?php
include('conexao.php');
session_start();

 //$executa1 = $db->prepare("SELECT * FROM usuario WHERE usuario=:usuario");
 //$executa1->bindParam (':usuario',$_SESSION['usuario']);
 //$linha1 = $executa1->fetch(PDO::FETCH_OBJ);
  //if ($linha1->login_primeira!= 1) {
  //	header("location:  menu_pais.php");
  //	exit;
  	# code...
  //}
 
$executa = $db->prepare("UPDATE professor SET senha WHERE usuario=:usuario");
$executa->bindParam (':usuario', $_SESSION['usuario']);
$executa->bindParam (':senha', $_POST['senha']);


$resultado = $executa->execute();
echo $_SESSION['usuario']	;
if ($executa->rowCount()==1) {
    echo 'Dados alterados com sucesso';
    $linha1->login_primeira = 2;
}else {
    echo 'Nenhum dado alterado';
}
?>
<a href="menu_professores.php">Voltar</a>
