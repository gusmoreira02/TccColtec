
	
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Primeiro Login</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
<?php
include('conexao.php');
session_start();


 //$executa1 = $db->prepare("SELECT * FROM usuario WHERE usuario=:usuario");
 //$executa1->bindParam (':usuario',$_SESSION['usuario']);
 //$linha1 = $executa1->fetch(PDO::FETCH_OBJ);
  //if ($linha1->login_primeira!= 1) {
  //	header("location:  menu_pais.php");
  //	exit;
  	# code...
  //}
 
$executa = $db->prepare("UPDATE responsavel SET senha=:senha WHERE cod_responsavel=:cod_responsavel");
$executa->bindParam (':cod_responsavel', $_SESSION['cod_responsavel']);
$executa->bindParam (':senha', $_POST['senha']);


$resultado = $executa->execute();
if ($executa->rowCount()==1) {
	$executa = $db->prepare("UPDATE responsavel set login_primeira='2' where cod_responsavel=:cod_responsavel");
	$executa->bindParam (':cod_responsavel', $_SESSION['cod_responsavel']);
	$resultado = $executa->execute();
	$_SESSION['login_primeira']=2;


}else {
    echo 'Nenhum dado alterado';
}
header("location: menu_pais.php");
?>

