<?php
include('conexao.php');
$id=$_GET['id'];
$ano=$_GET['ano'];

 $executa = $db->prepare("SELECT * FROM relatorio_turma where cod_cad_aluno=:id and ano=:ano");
 $executa->bindParam(":id", $id); 
  $executa->bindParam(":ano", $ano);           
 	       
        $executa->execute();

 if ($executa->rowCount()!=0){
	$linha=$executa->fetch(PDO::FETCH_OBJ);
	 
 	

	$ret['firstName'] = $linha->nome_aluno . '-' . $linha->nome . ' ' . $linha->ano;
//$ret['resultado'] = '<button type="button" class="btn btn-info botao" data-cod_parecer="' . $linha->cod_parecer . '">1º Bimestre</button> <button type="button" class="btn btn-info botao">2º Bimestre</button> <button type="button" class="btn btn-info botao">3º Bimestre</button> <button type="button" class="btn btn-info botao">4º Bimestre</button> ';
$ret['resultado'] = '<button type="button" class="btn btn-info botao" data-cod_parecer="1">1º Bimestre</button> <button type="button" class="btn btn-info botao" data-cod_parecer="2">2º Bimestre</button> <button type="button" class="btn btn-info botao" data-cod_parecer="3">3º Bimestre</button> <button type="button" class="btn btn-info botao" data-cod_parecer="4">4º Bimestre</button> ';
	//$ret['estado'] =   $linha->estado;;

}else{
	$ret['firstName'] = '';
	$ret['resultado'] = 'Nenhum Responsavel Cadastrado';

}
$myJson = json_encode($ret);


echo $myJson;
?>