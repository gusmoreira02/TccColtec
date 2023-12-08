<?php
//include('seguranca.php');
	include 'connect.php';
	

$q = "SELECT cod_cad_aluno, nome,DATE_FORMAT(data_nasc, '%d/%m/%Y') as data_nasc, sexo, estado FROM aluno WHERE ";

$where = " 1 ";

if ($_POST['searchPhrase']!=''){
	$where .= " AND (nome LIKE '%{$_POST['searchPhrase']}%' OR sexo LIKE '%{$_POST['searchPhrase']}%' OR cod_cad_aluno LIKE '%{$_POST['searchPhrase']}%' )";
}

$get_data['rows'] = array();

$mod_select = $pdo->prepare('SELECT COUNT(*) as total FROM aluno WHERE ' . $where);
$mod_select->execute();
$mod_count = $mod_select->fetch(PDO::FETCH_OBJ); 
//print_r($mod_count);
$get_data['total'] = $mod_count->total;


if ($_POST['rowCount']!=-1){
	$limit = ($_POST['current']-1)*$_POST['rowCount'];
	$q_limit = " LIMIT {$limit}, {$_POST['rowCount']}";
}else{
	$q_limit = '';
}

if (isset($_POST['sort'])){
	$orderby = ' ORDER BY ';
	foreach($_POST['sort'] as $campo => $ordem){
		if ($campo=='data'){
            $campo = 'data_nasc';
        }
		$orderby .= "{$campo} {$ordem}, ";
	}
	
	$orderby = substr($orderby, 0, -2);
	
}else{
	$orderby = '';
}
$mod_sel = $pdo->prepare($q . $where . $orderby . $q_limit);
$mod_sel->execute();

$get_data['rows'] = $mod_sel->fetchAll();

$get_data['current'] = $_POST['current'];
$get_data['rowCount'] = $mod_sel->rowCount();
$get_data['searchPhrase'] = $_POST['searchPhrase'];

echo json_encode($get_data);

?>