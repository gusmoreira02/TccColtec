<?php
include('conexao.php');
$id=$_GET['id'];

 $executa = $db->prepare("SELECT * FROM professor where cod_professor=:id");
 $executa->bindParam(":id", $id);       
 	       
        $executa->execute();

 if ($executa->rowCount()!=0){
	$linha=$executa->fetch(PDO::FETCH_OBJ);
	 
 	

	$ret['firstName'] = $linha->nome;
	$ret['resultado'] = $linha->rg . '<br>Estado: ' . $linha->estado . '<br>Cidade: ' . $linha->cidade . '<br>Bairro: ' . $linha->bairro  . '<br>Rua: ' . $linha->rua . '<br>Número: ' . $linha->numero . '<br>Email:' . $linha->email;
	//$ret['estado'] =   $linha->estado;;

}else{
	$ret['firstName'] = '';
	$ret['resultado'] = 'Nenhum dado encontrado';

}
$myJson = json_encode($ret);


echo $myJson;