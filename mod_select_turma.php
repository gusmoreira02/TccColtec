<?php
//include('seguranca.php');
	include 'connect.php';
	

$q = "SELECT * from turma_professor where";

$where = " 1 ";

if ($_POST['searchPhrase']!=''){
	$where .= " AND (nome LIKE '%{$_POST['searchPhrase']}%' OR ano LIKE '%{$_POST['searchPhrase']}%' OR horario LIKE '%{$_POST['searchPhrase']}%' )";
}

$get_data['rows'] = array();

$mod_select = $pdo->prepare('SELECT COUNT(*) as total FROM turma_professor WHERE ' . $where);
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