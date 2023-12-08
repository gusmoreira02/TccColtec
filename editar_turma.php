

<?php
include('menu_adm.php');
include_once ("conexao.php");?>
<link href="css/jquery.growl.css" rel="stylesheet" />

<script src="js/jquery.form.js"></script>
<script src="js/jquery.growl.js"></script>
      <script src="js/bootstrap-typeahead.js"></script>

<?php
if (!isset($_GET['cod_turma_professor'])){
    header("Location: listar.php");
    
}
?>

      <?php

$executa = $db->prepare("SELECT * FROM relatorio_turma WHERE cod_turma_professor=:cod_turma_professor");
$executa->bindParam(':cod_turma_professor', $_GET['cod_turma_professor']);

$executa->execute();

$linha = $executa->fetch(PDO::FETCH_OBJ);
?>

<section id="main-content">

      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Cadastro</a></li>
              <li><i class="fa fa-laptop"></i>Professores</li>
            </ol>
          </div>
        </div>
        </div>
      </div>
       <section class="panel">

              <header class="panel-heading">
                <a class="glyphicon glyphicon-remove" href="relatorio_turma.php"> </a>  Editar informações
                </style>
              </header>
              
             <div class="panel-body">
                <form class="form-horizontal " action="remover_aluno.php" method="post" id="jsonForm">
                <input type="hidden"  value="<?php echo $linha->cod_cad_aluno ?>">

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="nome">Turma</label>
                    <div class="col-sm-10">
                      <input type="text"  id="nome" readonly="true" class="form-control" value="<?php echo $linha->nome ?>"  data-placement="left" >
                    </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label" for="estado">Horário</label>
                    <div class="col-sm-10">
                      <input type="text" id="estado" readonly="true" class="form-control" value="<?php echo $linha->horario ?>"  data-placement="left" >
                    </div>

                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label" for="cidade">Ano</label>
                    <div class="col-sm-10">
                      <input type="text"  id="cidade" readonly="true" class="form-control telefone" value="<?php echo $linha->ano ?>" data-placement="left" >
                    </div>

                  </div> 
                    <div class="form-group">
                     <label class="col-sm-2 control-label" for="bairro">Regente</label>
                    <div class="col-sm-10">
                      <input type="text"  id="bairro" readonly="true" class="form-control telefone" value="<?php echo $linha->nome_professor ?>"  data-placement="left" >
                    </div>
                  </div>  
                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="rua">Aluno</label>
                    <div class="col-sm-10">
                      <input id="aluno" type="text" class="col-md-12 form-control" required="" placeholder="Aluno" autocomplete="off" />    <input id="cod_cad_aluno" type="hidden" class="col-md-12 form-control" name="cod_cad_aluno" autocomplete="off" />
                    </div>
                    </div>   

                  </div>                

                  
            <input type="submit" value="Remover Aluno" id="submit" class="btn btn-primary btn-lg btn-block"> 
                 </form>
                    <script>
            $(function() {
                $('#aluno').typeahead({
                    ajax: 'editar_turma_json.php',
                    onSelect: function(item){
            $("#cod_cad_aluno").val(item.value);
          },
                    displayField: 'nome_aluno',
                    valueField: 'cod_cad_aluno'
                });

            });
  $(document).ready(function() { 
    // bind form using ajaxForm 
    $('#jsonForm').ajaxForm({ 
        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   function(data){
            if (data.status==1){
              $.growl.notice({ title:'Status:', message: data.mensagem });
              $("#jsonForm").trigger("reset");
            }else{
              $.growl.error({ message: data.mensagem });
            }
        } 
    })
  }); 
  </script>

        </div>
        </section>

        


     



</body>




</html>
