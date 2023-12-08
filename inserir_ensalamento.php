<?php
try {
    include ("conexao.php");
    include  ("seguranca_adm.php");



    $pdo = $db;

    if(!$db){
        die('Erro ao criar a conexão');
    }

    $executa = $db->prepare("INSERT INTO aluno_turma (aluno, turma) values (:aluno, :turma)");
    $executa->bindParam (':aluno', $_POST['cod_cad_aluno']);
    $executa->bindParam (':turma', $_POST['cod_turma']);

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

