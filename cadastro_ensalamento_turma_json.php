<?php

	include 'conexao.php';

$q = "SELECT cod_turma, concat(nome_turma, '-', ano, '-', horario) as turma_ano FROM turma_professor WHERE ";

$where = " 1 ";

if ($_GET['query']!=''){
	$where .= " AND (nome LIKE '%{$_GET['query']}%')";
}


$mod_sel = $db->prepare($q . $where);
$mod_sel->execute();

$resp = $mod_sel->fetchAll();

echo json_encode($resp);