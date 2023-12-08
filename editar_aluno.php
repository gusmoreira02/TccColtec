

<?php
include('menu_adm.php');
include_once ("conexao.php");
if (!isset($_GET['cod_cad_aluno'])){
    header("Location: listar.php");
    
}

$executa = $db->prepare("SELECT * FROM aluno WHERE cod_cad_aluno=:cod_cad_aluno");
$executa->bindParam(':cod_cad_aluno', $_GET['cod_cad_aluno']);

$executa->execute();

$linha = $executa->fetch(PDO::FETCH_OBJ);
?>
<link href="css/jquery.growl.css" rel="stylesheet" />

<script src="js/jquery.form.js"></script>
<script src="js/jquery.growl.js"></script>
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
                <a class="glyphicon glyphicon-remove" href="relatorio_aluno.php"> </a>  Editar informações
                </style>
              </header>
              
             <div class="panel-body">
                <form class="form-horizontal " action="editar_aluno_inf.php" method="post" class="jsonForm">
                <input type="hidden" name="cod_cad_aluno" value="<?php echo $linha->cod_cad_aluno ?>">

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="nome">Nome Completo</label>
                    <div class="col-sm-10">
                      <input type="text" name="nome" id="nome" readonly="true" class="form-control" value="<?php echo $linha->nome ?>" title="Duplo clique para editar" data-placement="left" >
                    </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label" for="estado">Estado</label>
                    <div class="col-sm-10">
                      <input type="text" name="estado" id="estado" readonly="true" class="form-control" value="<?php echo $linha->estado ?>" title="Duplo clique para editar" data-placement="left" >
                    </div>

                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label" for="cidade">Cidade</label>
                    <div class="col-sm-10">
                      <input type="text" name="cidade" id="cidade" readonly="true" class="form-control telefone" value="<?php echo $linha->cidade ?>" title="Duplo clique para editar" data-placement="left" >
                    </div>

                  </div> 
                    <div class="form-group">
                     <label class="col-sm-2 control-label" for="bairro">Bairro</label>
                    <div class="col-sm-10">
                      <input type="text" name="bairro" id="bairro" readonly="true" class="form-control telefone" value="<?php echo $linha->bairro ?>" title="Duplo clique para editar" data-placement="left" >
                    </div>
                  </div>  
                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="rua">Rua</label>
                    <div class="col-sm-10">
                      <input type="text" name="rua" id="rua" readonly="true" class="form-control telefone" value="<?php echo $linha->rua ?>" title="Duplo clique para editar" data-placement="left" >
                    </div>
                    </div>   
                  <div class="form-group">
                     <label class="col-sm-2 control-label" for="numero">Número</label>
                    <div class="col-sm-10">
                      <input type="text" name="numero" id="numero" readonly="true" class="form-control telefone" value="<?php echo $linha->numero ?>" title="Duplo clique para editar" data-placement="left" >
                    </div>

                  </div>                

                  
            <input type="submit" value="Salvar" disabled id="submit" class="btn btn-primary btn-lg btn-block"> 
                 </form>



</form>
<script>
    $(document).ready(function(){
      $("#nome").on("dblclick", function(){
        $(this).removeAttr("readonly");
        $("#submit").removeAttr("disabled");
      });

      $("#nome").tooltip();
    });
    $(document).ready(function(){
      $("#estado").on("dblclick", function(){
        $(this).removeAttr("readonly");
        $("#submit").removeAttr("disabled");
      });

      $("#estado").tooltip();
    });
    $(document).ready(function(){
      $("#cidade").on("dblclick", function(){
        $(this).removeAttr("readonly");
        $("#submit").removeAttr("disabled");
      });

      $("#cidade").tooltip();
    });
    $(document).ready(function(){
      $("#bairro").on("dblclick", function(){
        $(this).removeAttr("readonly");
        $("#submit").removeAttr("disabled");
      });

      $("#bairro").tooltip();
    });
     $(document).ready(function(){
      $("#rua").on("dblclick", function(){
        $(this).removeAttr("readonly");
        $("#submit").removeAttr("disabled");
      });

      $("#rua").tooltip();
    });
      $(document).ready(function(){
      $("#numero").on("dblclick", function(){
        $(this).removeAttr("readonly");
        $("#submit").removeAttr("disabled");
      });

      $("#numero").tooltip();
    });

  </script>
    <script type="text/javascript">
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



</body>




</html>
