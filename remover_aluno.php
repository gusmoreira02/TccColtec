<?php

include ("conexao.php");

$executa=$db->prepare("DELETE FROM aluno_turma WHERE aluno=:aluno");
$executa->bindparam(':aluno', $_POST['cod_cad_aluno']);

$resultado = $executa->execute();

if ($resultado)
{
   $ret['status'] = 1;
        $ret['mensagem'] = 'Aluno Excluido com sucesso!';
} else {
    $ret['status'] = 0;
        $ret['mensagem'] = 'Impossivel excluir';
        
}
 echo json_encode($ret);
?>