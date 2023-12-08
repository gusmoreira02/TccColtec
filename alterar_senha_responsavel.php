<?php
include('conexao.php');
include('seguranca.php');
$executa = $db->prepare("SELECT senha FROM responsavel where cod_responsavel=:cod_responsavel");
$executa->bindParam(':cod_responsavel', $_SESSION['cod_responsavel']);
$executa->execute();
$linha = $executa->fetch();


$antiga_senha = $_POST['senha'];
$senha = $_POST['alterar_senha'];
$senhaa = $_POST['confirmar_senha'];
	 $senha_criptografada = criptografia($senha);
    $senha_criptografada1 = criptografia($senhaa);
    $senha_antiga = criptografia($antiga_senha);


if ($linha->senha<>$senha_antiga){
    $ret['status'] = 0;
    $ret['mensagem'] = 'erro de senha antiga';
}else{
	if ($senha_criptografada === $senha_criptografada1){
		$executa = $db->prepare("UPDATE responsavel SET senha =:senha_criptografada WHERE cod_responsavel=:cod_responsavel");
		$executa->bindParam ( ':cod_responsavel' , $_SESSION['cod_responsavel'] );
		$executa->bindParam ( ':senha_criptografada' , $senha_criptografada );
		$resultado = $executa->execute();
	    if($resultado){
	        $ret['status'] = 1;
	        $ret['mensagem'] = 'Senha alterada com sucesso!';
	      
	    } else {
	        $ret['status'] = 0;
	        $ret['mensagem'] = 'Erro ao alterar senha';
	    }


	}else{
	    $ret['status'] = 0;
	    $ret['mensagem'] = 'Erro ao alterar senha';
	}
	
}

echo json_encode($ret);
exit;
