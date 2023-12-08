<?php
try {
include "seguranca_adm.php";

include ("conexao.php");
$executa = $db->prepare("UPDATE aluno SET nome=:nome, estado=:estado, cidade=:cidade, bairro=:bairro, rua=:rua, numero=:numero WHERE cod_cad_aluno=:cod_cad_aluno");
$executa->bindParam(':cod_cad_aluno', $_POST['cod_cad_aluno']);
$executa->bindParam (':nome', $_POST['nome']);
$executa->bindParam (':estado', $_POST['estado']);
$executa->bindParam (':cidade', $_POST['cidade']);
$executa->bindParam (':bairro', $_POST['bairro']);
$executa->bindParam (':rua', $_POST['rua']);
$executa->bindParam (':numero', $_POST['numero']);
$resultado = $executa->execute();

    if($resultado){
        $ret['status'] = 1;
        $ret['mensagem'] = 'Dados alterados com sucesso!';
      
    } else {
        $ret['status'] = 0;
        $ret['mensagem'] = 'Erro ao alterar';
    }


    echo json_encode($ret);
    exit;

}catch(Exception $e){
    $ret['status'] = 0;
    $ret['mensagem'] = 'Erro ao inserir';
    echo json_encode($ret);
//    echo $e->getMessage();
//send errors to system error reporting
}

