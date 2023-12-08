<?php
try {
    include ("conexao.php");
    include  ("seguranca_adm.php");



    $pdo = $db;

    if(!$db){
        die('Erro ao criar a conexão');
    }
     $senha = $_POST['senha']; 
$codificada = md5($senha);

    $executa = $db->prepare("INSERT INTO responsavel (nome,usuario, senha, data_nasc, telefone, cpf, rg, email) VALUES (:nome, :usuario, :senha, :data, :telefone, :cpf, :rg, :email)");
    $executa->bindParam (':nome', $_POST['nome']);
    $executa->bindParam (':usuario', $_POST['usuario']);
    $executa->bindParam (':senha',$codificada );
    $executa->bindParam (':data', $_POST['data']);
    $executa->bindParam (':telefone', $_POST['telefone']);
    $executa->bindParam (':cpf', $_POST['cpf']);
    $executa->bindParam (':rg', $_POST['rg']);
     $executa->bindParam (':email', $_POST['email']);

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
    $ret['mensagem'] = 'Erro ao inserir: ' . $e->getMessage();
    echo json_encode($ret);
//    echo $e->getMessage();
//send errors to system error reporting
}


