<?php
try {
    include ("conexao.php");
    include  ("seguranca_adm.php");
    


    $pdo = $db;

    if(!$db){
        die('Erro ao criar a conexão');
    }
    $executa1 = $db->prepare("SELECT * from professor");
    $executa1->execute();

   if(mysql_errno() == 1062){
   $ret['status'] = 0;
   $ret['msg'] = 'Alguma informação já está cadastrada ';
}else{


    $senha = $_POST['senha']; 
$codificada = md5($senha);

    $executa = $db->prepare("INSERT INTO professor (nome,usuario, senha, data_nasc, telefone, cpf, rg, estado, cidade, bairro, rua, numero, email) VALUES (:nome, :usuario, :senha, :data, :telefone, :cpf, :rg, :estado, :cidade, :bairro, :rua, :numero, :email )");
    $executa->bindParam (':nome', $_POST['nome']);
    $executa->bindParam (':usuario', $_POST['usuario']);
    $executa->bindParam (':senha', $codificada);
    $executa->bindParam (':data', $_POST['data_nasc']);
    $executa->bindParam (':telefone', $_POST['telefone']);
    $executa->bindParam (':cpf', $_POST['cpf']);
    $executa->bindParam (':rg', $_POST['rg']);
     $executa->bindParam (':estado', $_POST['estado']);
      $executa->bindParam (':cidade', $_POST['cidade']);
       $executa->bindParam (':bairro', $_POST['bairro']);
        $executa->bindParam (':rua', $_POST['rua']);
         $executa->bindParam (':numero', $_POST['numero']);
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
    exit;}

} catch(Exception $e){
    $ret['status'] = 0;
    $ret['mensagem'] = 'Erro ao inseriraaaaaaaaaaaaaa';
    echo json_encode($ret);
  //echo $e->getMessage();
//send errors to system error reporting
}

