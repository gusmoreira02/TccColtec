<?php
include('conexao.php');
$executa = $db->prepare("SELECT texto, aluno_cod_cad_aluno, bimestre FROM parecer WHERE aluno_cod_cad_aluno=:aluno_cod_cad_aluno and bimestre=:bimestre");
$executa->bindParam(':aluno_cod_cad_aluno', $_POST['cod_cad_aluno']);
$executa->bindParam(':bimestre', $_POST['bimestre']);
$executa->execute();



if ($executa->rowCount()<>0){
	$linha = $executa->fetch(PDO::FETCH_OBJ);
	$ret['status'] = 1;
	$ret['relatorio'] = $linha->texto;

}else{
	$ret['status'] = 0;
}

echo json_encode($ret);
