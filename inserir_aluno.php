<?php
try {
    include ("conexao.php");
    include  ("seguranca_adm.php");


    $pdo = $db;

    if(!$db){
        die('Erro ao criar a conexão');
    }

    $executa = $db->prepare("INSERT INTO aluno (nome, data_nasc, sexo, rua, numero, cidade, bairro, estado) VALUES (:nome, :data, :sexo, :rua, :numero, :cidade, :bairro, :estado)");
    $executa->bindParam (':nome', $_POST['nome']);
    $executa->bindParam (':data', $_POST['data']);
    $executa->bindParam (':sexo', $_POST['sexo']);
    $executa->bindParam (':rua', $_POST['rua']);
    $executa->bindParam (':numero', $_POST['numero']);
    $executa->bindParam (':cidade', $_POST['cidade']);
    $executa->bindParam (':bairro', $_POST['bairro']);
    $executa->bindParam (':estado', $_POST['estado']);
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

