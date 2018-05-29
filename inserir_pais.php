<?php
try {
    include ("conexao.php");
    include  ("seguranca.php");


    $pdo = $db;

    if(!$db){
        die('Erro ao criar a conexão');
    }

    $executa = $db->prepare("INSERT INTO responsavel (nome, data_nasc, telefone, cpf, rg) VALUES (:nome, :data, :telefone, :cpf, :rg)");
    $executa->bindParam (':nome', $_POST['nome']);
    $executa->bindParam (':data', $_POST['data']);
    $executa->bindParam (':telefone', $_POST['telefone']);
    $executa->bindParam (':cpf', $_POST['cpf']);
    $executa->bindParam (':rg', $_POST['rg']);
    $resultado = $executa->execute();

    if($resultado){
        echo 'Dados inseridos com sucesso!';
        echo' <a href="menu_adm.php">Visualizar relatorio</a>';
    } else {
        print_r($db->errorInfo ());
        echo $resultado;
    }


    exit;

} catch(Exception $e){
    echo $e->getMessage();
//send errors to system error reporting
}

