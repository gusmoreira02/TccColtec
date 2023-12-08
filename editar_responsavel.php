<?php

include "seguranca.php";

include ("conexao.php");
$executa = $db->prepare("UPDATE  responsavel SET nome=:nome, usuario=:usuario, telefone=:telefone WHERE cod_responsavel=:cod_responsavel");
$executa->bindParam(':cod_responsavel', $_SESSION['cod_responsavel']);
$executa->bindParam (':nome', $_POST['nome']);
$executa->bindParam (':telefone', $_POST['telefone']);
$executa->bindParam (':usuario', $_POST['usuario']);
$resultado = $executa->execute();

    if($resultado){
        $ret['status'] = 1;
        $ret['mensagem'] = 'Dados alterados com sucesso!';
        $_SESSION['usuario']=$_POST['usuario'];
      
    } else {
        $ret['status'] = 0;
        $ret['mensagem'] = 'Erro ao alterar dados';
    }


    echo json_encode($ret);
    exit;

