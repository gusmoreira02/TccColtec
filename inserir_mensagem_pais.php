
<?php


try {
    include ("conexao.php");
    include  ("seguranca.php");

    $pdo = $db;
   

    if(!$db){
        die('Erro ao criar a conexão');
    }

    $executa = $db->prepare("INSERT INTO mensagem (data, mensagem, responsavel_cod_responsavel, professor_cod_professor, destinatario) VALUES (now(),:mensagem, :responsavel_cod_responsavel, :professor_cod_professor, 'professor')");
    $executa->bindParam (':mensagem', $_POST['mensagem']);
    $executa->bindParam (':responsavel_cod_responsavel',$_SESSION['cod_responsavel']);
    $executa->bindParam (':professor_cod_professor', $_POST['professor_nome']);

    
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


