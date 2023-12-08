
	
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
$senha = $_POST['senha'];
$csenha = $_POST['csenha'];
   $senha_criptografada = criptografia($_POST['senha']);
    $senha_criptografada1 = criptografia($_POST['csenha']);
session_start();
  if ($senha_criptografada==$senha_criptografada1){
    $executa = $db->prepare("UPDATE professor SET senha=:senha WHERE cod_professor=:cod_professor");
$executa->bindParam (':cod_professor', $_SESSION['cod_professor']);
$executa->bindParam (':senha', $senha_criptografada);


$resultado = $executa->execute();
if ($executa->rowCount()==1) {
  $executa = $db->prepare("UPDATE professor set login_primeira='2' where cod_professor=:cod_professor");
  $executa->bindParam (':cod_professor', $_SESSION['cod_professor']);
  $resultado = $executa->execute();
  $_SESSION['login_primeira']=2;

  }
}else {
    echo 'Nenhum dado alterado';
}
header("location: inicio_prof.php");
?>

