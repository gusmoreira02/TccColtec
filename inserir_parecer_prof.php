
<?php


try {
    include ("conexao.php");
    include  ("seguranca_prof.php");

    $pdo = $db;
   

    if(!$db){
        die('Erro ao criar a conexão');
    }

    $executa = $db->prepare("INSERT INTO parecer (texto, aluno_cod_cad_aluno, professor_cod_professor, bimestre, turma) VALUES (:texto,:aluno_cod_cad_aluno, :professor_cod_professor, :bimestre, :turma)");
    $executa->bindParam (':texto', $_POST['texto']);
    $executa->bindParam (':aluno_cod_cad_aluno' ,$_POST['aluno']); 
        $executa->bindParam (':professor_cod_professor',   $_SESSION['cod_professor']);
    $executa->bindParam (':bimestre' ,$_POST['bimestre']); 
      $executa->bindParam (':turma' ,$_POST['turma']); 


    
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


