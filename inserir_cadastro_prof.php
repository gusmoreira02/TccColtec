<?php
try {
    include ("conexao");

    $pdo = $db;

    if(!$db){
        die('Erro ao criar a conexão');
    }

    $senha= $_POST['senha'];
    $senha1= $_POST['csenha'];
    if($senha <>  $senha1) {
        die('Confirmar senha e senha diferentes!');

    }
    $codificada = md5($senha);


    $executa = $db->prepare("INSERT INTO cadastro_prof (usuario, nome, sobrenome, email, senha, telefone, cpf) VALUES (:usuario, :nome, :sobrenome, :email, :senha, :telefone, :cpf)");
    $executa->bindParam (':usuario', $_POST['usuario']);
    $executa->bindParam (':nome', $_POST['nome']);
    $executa->bindParam (':sobrenome', $_POST['sobrenome']);
    $executa->bindParam (':email', $_POST['email']);
    $executa->bindParam (':senha',  $codificada);
    $executa->bindParam (':telefone', $_POST['telefone']);
        $executa->bindParam (':cpf', $_POST['cpf']);



    $resultado = $executa->execute();

    if($resultado){
        echo 'Dados inseridos com sucesso!';
        echo' <a href="pagina_inicial_offline.php">Voltar ao Menu</a>';
    } else {
        print_r($db->errorInfo ());
        echo $resultado;
    }


    exit;

} catch(Exception $e){
    echo $e->getMessage();
//send errors to system error reporting
}