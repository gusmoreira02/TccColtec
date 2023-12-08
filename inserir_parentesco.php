<?php
try {
    include ("conexao.php");
    include  ("seguranca_adm.php");



    $pdo = $db;

    if(!$db){
        die('Erro ao criar a conexão');
    }

    $executa = $db->prepare("INSERT INTO responsavel_has_aluno (responsavel_cod_responsavel, aluno_cod_cad_aluno, grau_parentesco) values (:cod_responsavel, :cod_cad_aluno, :grau_parentesco)");
    $executa->bindParam (':cod_responsavel', $_POST['cod_responsavel']);
    $executa->bindParam (':cod_cad_aluno', $_POST['cod_cad_aluno']);
    $executa->bindParam (':grau_parentesco',$_POST['grau_parentesco'] );

    $resultado = $executa->execute();

    if($resultado){
        $ret['status'] = 1;
        $ret['mensagem'] = 'Dados inseridos com sucesso!';
      
    } else {
        $ret['status'] = 0;
        $ret['mensagem'] = 'Erro ao inserir';
    }


    echo json_encode($ret);
    exit;

} catch(Exception $e){
    $ret['status'] = 0;
    $ret['mensagem'] = 'Erro ao inserir';
    echo json_encode($ret);
//    echo $e->getMessage();
//send errors to system error reporting
}

