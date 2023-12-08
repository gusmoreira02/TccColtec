
<?php


try {
    include ("conexao.php");
    include  ("seguranca_prof.php");

    $pdo = $db;
   

    if(!$db){
        die('Erro ao criar a conexão');
    }

    $executa = $db->prepare("INSERT INTO mensagem (data, mensagem, responsavel_cod_responsavel, professor_cod_professor, tipo, destinatario, remetente) VALUES (now(),:mensagem,:responsavel_cod_responsavel, :professor_cod_professor,  'P', :destinatario, :remetente)");
    $executa->bindParam (':mensagem', $_POST['mensagem']);
        $executa->bindParam (':professor_cod_professor',   $_SESSION['cod_professor']);
    $executa->bindParam (':responsavel_cod_responsavel' ,$_POST['responsavel_cod_responsavel']); 
    $executa->bindParam (':destinatario' ,$_POST['responsavel_cod_responsavel']); 
    $executa->bindParam (':remetente' ,$_SESSION['cod_professor']); 


    
    $resultado = $executa->execute();

    if($resultado){
        echo 'Dados inseridos com sucesso!';


 
    } else {
        print_r($db->errorInfo ());
        echo $resultado;
    }


    exit;

} catch(Exception $e){
    echo $e->getMessage();
//send errors to system error reporting
}


