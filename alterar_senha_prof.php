<?php
include('conexao.php');
include('seguranca_prof.php');
$executa = $db->prepare("SELECT senha FROM professor where cod_professor=:cod_professor");
$executa->bindParam(':cod_professor', $_SESSION['cod_professor']);
$executa->execute();
$linha = $executa->fetch();



	 $senha_criptografada = criptografia($_POST['alterar_senha']);
	 	 $senha_criptografada1 = criptografia($_POST['confirmar_senha']);
	 	 	 $senha_criptografada_antiga = criptografia($_POST['senha']);



if ($linha->senha<>$senha_criptografada_antiga){
    $ret['status'] = 0;
    $ret['mensagem'] = 'erro de senha antiga';
}else{
	if ($senha_criptografada === $senha_criptografada1){
		$executa = $db->prepare("UPDATE professor SET senha =:senha_criptografada WHERE cod_professor=:cod_professor");
		$executa->bindParam ( ':cod_professor' , $_SESSION['cod_professor'] );
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
