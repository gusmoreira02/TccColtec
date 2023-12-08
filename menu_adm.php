<?php
include ("conexao.php");
include ("seguranca_adm.php");

if ($_SESSION['login_primeira']==1){
	header("Location: primeiro_login_form.php");
	exit;
}

 	
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Clementina Lona Costa</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- bootstrap theme -->
  <!-- <link href="css/bootstrap-theme.css" rel="stylesheet"> -->
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
<?php /*
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
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet"> */ ?>

  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">Escola <span class="lite">Clementina Lona Costa</span></a>
      <!--logo end-->

        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          </li>
          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/usuario.png">
                            </span>
                            <span class="username"><?php echo $_SESSION['usuario'] ; ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
                <a href="logoff.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="inicio_adm.php">
                          <i class="icon_house_alt"></i>
                          <span>Início</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Cadastro</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="cadastro_responsavel.php">Responsável</a></li>
              <li><a class="" href="cadastro_prof.php">Professores</a></li>
                  <li><a class="" href="cadastro_aluno.php">Alunos</a></li>
                  <li><a class="" href="cadastro_parentesco.php">Parentesco</a></li>
                  <li><a class="" href="cadastro_turma.php">Turma</a></li>
                      <li><a class="" href="cadastro_regente.php">Regente</a></li>
                      <li><a class="" href="cadastro_ensalamento.php">Ensalamento</a></li>


            </ul>
            <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Relatórios</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="relatorio_responsavel.php">Responsável</a></li>
              <li><a class="" href="relatorio_aluno.php">Alunos</a></li>
              <li><a class="" href="relatorio_turma.php">Turmas</a></li> 
                 <li><a class="" href="relatorio_professor.php">Professores</a></li>       </ul>
                 <li class="active">

        <!-- sidebar menu end-->
      </div>
    </aside>



    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <!-- <script src="js/jquery.js"></script> -->
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  



    <!--custome script for all page-->
  <script src="js/scripts.js"></script>
      <script src="js/jquery.mask.js"></script>

    

  




</body>

</html>
