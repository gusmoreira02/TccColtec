<?php
include('conexao.php');
$id=$_GET['id'];
$ano=$_GET['ano'];
$cod_parecer=$_GET['cod_parecer'];

 $executa = $db->prepare("SELECT texto, bimestre, aluno_cod_cad_aluno FROM parecer where aluno_cod_cad_aluno=:id and bimestre=:cod_parecer");
 $executa->bindParam(":id", $id);     
 $executa->bindParam(":cod_parecer", $cod_parecer);    
 	       
        $executa->execute();

         if ($executa->rowCount()!=0){
	$linha=$executa->fetch(PDO::FETCH_OBJ);

$ret['resultado'] = $linha->texto;

}else{
	
	$ret['resultado'] = 'Parecer Indisponivel';

}
$myJson = json_encode($ret);


echo $myJson;
?>