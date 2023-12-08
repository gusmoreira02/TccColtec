<?php
include('conexao.php');
$id=$_GET['id'];

 $executa = $db->prepare("SELECT * FROM relatorio_turma where cod_turma_professor=:id LIMIT 1");
 $executa->bindParam(":id", $id);       
 	       
 $executa->execute();

 if ($executa->rowCount()!=0){
	$linha=$executa->fetch(PDO::FETCH_OBJ); 
 	

	$ret['nome_turma'] = $linha->nome;


	$executa = $db->prepare("SELECT nome_aluno FROM relatorio_turma where cod_turma_professor=:id");
	$executa->bindParam(":id", $id);       
	 	       
	$executa->execute();
	$ret['resultado'] = $executa->fetchAll(PDO::FETCH_OBJ);

}else{
	$ret['nome_turma'] = '';
	$ret['resultado'] = array();

}
$myJson = json_encode($ret);


echo $myJson;