<?php
include('conexao.php');
$id=$_GET['id'];

 $executa = $db->prepare("SELECT * FROM relatorio_aluno where cod_cad_aluno=:id");
 $executa->bindParam(":id", $id);       
 	       
        $executa->execute();

 if ($executa->rowCount()!=0){
	$linha=$executa->fetch(PDO::FETCH_OBJ);
	 
 	

	$ret['firstName'] = $linha->nome;
	$ret['resultado'] = $linha->nome_responsavel . '<br>Grau de Parentesco: ' . $linha->grau_parentesco . ' <br>Cidade: ' . $linha->cidade . '<br>Rua: ' . $linha->rua . '<br>Bairro:' . $linha->bairro . '<br>Número: ' . $linha->numero;
	//$ret['estado'] =   $linha->estado;;

}else{
	$ret['firstName'] = '';
	$ret['resultado'] = 'Nenhum Responsavel Cadastrado';

}
$myJson = json_encode($ret);


echo $myJson;