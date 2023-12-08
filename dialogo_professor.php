<?php
include('menu_professores.php');
include_once('conexao.php');
?>
<section id="main-content">
      <section class="wrapper">
      <br>
      <?php   
      $codigo=$_GET['cod_responsavel'];

//buscar nome do responsavel
              $executa = $db->prepare("SELECT * FROM professor_responsavel where cod_professor=:cod_professor and cod_responsavel=:cod_responsavel LIMIT 1");
              $executa->bindParam(':cod_responsavel',$_GET['cod_responsavel']);
                     $executa->bindParam(':cod_professor',$_SESSION['cod_professor']);
              $executa->execute();

              $responsavel=$executa->fetch(PDO::FETCH_OBJ)




 ?>

        <div class="row">
          <div class="col-md-12 portlets">
            <!-- Widget -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left"><?php echo $responsavel->nome_responsavel ?></div>
                <div class="widget-icons pull-right">
                  <a href="mensagem_prof.php" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>

              <div class="panel-body">
                <!-- Widget content -->
                <div class="padd sscroll">

                  <ul class="chats">
       

                    <!-- Chat by us. Use the class "by-me". -->
<?php
              $executa = $db->prepare("SELECT *,DATE_FORMAT(data, '%d/%m/%Y %H:%i') as 'data_certa' FROM mensagem_nome where cod_professor=:cod_professor and cod_responsavel=:cod_responsavel");
              $executa->bindParam(':cod_responsavel',$_GET['cod_responsavel']);
                     $executa->bindParam(':cod_professor',$_SESSION['cod_professor']);
              $executa->execute();

                while($linha=$executa->fetch(PDO::FETCH_OBJ)){

                	if ($linha->tipo=='P'){
                		$tipo = 'by-other';
                	}else{
                		$tipo = 'by-me';
                	}
?>

                    <li class="<?php echo $tipo; ?>">
                      <!-- Use the class "pull-left" in avatar -->

                      <div class="chat-content">
                        <!-- In meta area, first include "name" and then "time" -->
                        <div class="chat-meta"> <span class="pull-right"><?php echo $linha->data_certa ?></span></div>
                        <?php echo $linha->mensagem ?>
                        <div class="clearfix"></div>
                      </div>
                    </li>
<?php 
}
 ?>
                

                  </ul>

                </div>

                <!-- Widget footer -->

                <div class="widget-foot">

                  <form class="form-inline" action="#" id="formulario" method="post" >
                    <div class="form-group">
                      <input type="text" class="form-control" id="msg" name="mensagem" placeholder="Escreva sua mensagem">
                    </div>
                    <input type="hidden" name="responsavel_cod_responsavel" id="codigo" value="<?php echo $codigo ?>">
                    <button type="button" class="btn btn-info leu">Enviar</button>
                  </form>


                </div>
              </div>


            </div>
          </div>

<style type="text/css">
	.leu{
		margin-right: 3px
	}
    .sscroll{
    height: 70vh;
    overflow-x: hidden;
   overflow-y: scroll;
  }
</style>
<script type="text/javascript">
	 $('.leu').click(function(){

console.log($( "#formulario" ).serialize());
    
    $.post("inserir_mensagem_prof.php",$("#formulario").serialize()) , function(data){


    }
    location.reload();
  });
</script>
