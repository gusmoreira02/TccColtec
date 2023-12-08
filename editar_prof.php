<?php

include "seguranca_prof.php";

include ("conexao.php");
$executa = $db->prepare("UPDATE  professor SET nome=:nome, usuario=:usuario, telefone=:telefone WHERE cod_professor=:cod_professor");
$executa->bindParam(':cod_professor', $_SESSION['cod_professor']);
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

