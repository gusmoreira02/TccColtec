<?php
try {
    include ("conexao.php");
    include  ("seguranca_adm.php");


    $pdo = $db;

    if(!$db){
        die('Erro ao criar a conexão');
    }

    $executa = $db->prepare("INSERT INTO turma (nome, ano) VALUES (:nome, :ano)");
    $executa->bindParam (':nome', $_POST['turma']);
    $executa->bindParam (':ano', $_POST['ano']);
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