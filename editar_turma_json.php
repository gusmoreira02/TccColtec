<?php

	include 'conexao.php';

$q = "SELECT nome_aluno, cod_cad_aluno FROM relatorio_turma WHERE";

$where = " 1 ";

if ($_GET['query']!=''){
	$where .= " AND (nome LIKE '%{$_GET['query']}%')";
}


$mod_sel = $db->prepare($q . $where);
$mod_sel->execute();

$resp = $mod_sel->fetchAll();

echo json_encode($resp);