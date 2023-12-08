<?php
try {
    include ("conexao.php");
    include  ("seguranca_adm.php");



    $pdo = $db;

    if(!$db){
        die('Erro ao criar a conexão');
    }

    $executa = $db->prepare("INSERT INTO turma_has_professor (turma, professor, horario) values (:cod_turma, :cod_professor, :horario)");
    $executa->bindParam (':cod_turma', $_POST['cod_turma']);
    $executa->bindParam (':cod_professor', $_POST['cod_professor']);
    $executa->bindParam (':horario',$_POST['horario'] );

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
    $ret['mensagem'] = 'Professor já cadastrado em outra turma';
    echo json_encode($ret);
//    echo $e->getMessage();
//send errors to system error reporting
}