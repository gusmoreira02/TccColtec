<?php
include('conexao.php');
$id=$_GET['id'];

 $executa = $db->prepare("SELECT * FROM relatorio_aluno where cod_responsavel=:id");
 $executa->bindParam(":id", $id);       
 	       
        $executa->execute();

 if ($executa->rowCount()!=0){
	$linha=$executa->fetch(PDO::FETCH_OBJ); 
 	
	$ret['firstName'] = $linha->nome_responsavel;

$executa = $db->prepare("SELECT nome_responsavel,nome FROM relatorio_aluno where cod_responsavel=:id");
	$executa->bindParam(":id", $id);      

 	       
	$executa->execute();
	$ret['resultado'] =  'Cidade: ' . $linha->cidade . '<br>Rua: ' . $linha->rua . '<br>Bairro:' . $linha->bairro . '<br>Número: ' . $linha->numero . '<br>Email:' . $linha->email ;
	
		$ret['resultado1'] = $executa->fetchAll(PDO::FETCH_OBJ);
	//$ret['estado'] =   $linha->estado;;

}else{
	$ret['firstName'] = '';
	$ret['resultado'] = 'Nenhum Dependente Cadastrado';

}
$myJson = json_encode($ret);


echo $myJson;