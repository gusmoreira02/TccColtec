    <?php 
    include('menu_adm.php');
  ?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>

            </ol>
          </div>
        </div>
        <div class="row">
<?php $executa2 = $db->prepare("SELECT * FROM turma");
$executa2->execute();

//for ($i=0; $i == $executa2->Rowcount() ; $i+$executa2->Rowcount()) {  


 
       
       $executa = $db->prepare("SELECT * FROM numero_aluno");


$executa->execute();


while($linha=$executa->fetch(PDO::FETCH_OBJ)){ 
?>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
 <div class="count"><?php echo $linha->nome ?></div>
              <div class="title"><?php echo $linha->alunos ?>/30</div>

              
            </div>
            <!--/.info-box-->
          </div>  
 <?php }// } 
 ?>

           </div>  
