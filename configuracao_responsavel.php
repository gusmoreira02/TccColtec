<?php 
include('menu_pais.php');

$executa = $db->prepare("SELECT * FROM responsavel WHERE cod_responsavel=:cod_responsavel");
$executa->bindParam(':cod_responsavel', $_SESSION['cod_responsavel']);
$executa->execute();
$linha = $executa->fetch(PDO::FETCH_OBJ);


?>
<link href="css/jquery.growl.css" rel="stylesheet" />

<script src="js/jquery.form.js"></script>
<script src="js/jquery.growl.js"></script>

<section id="main-content">
      <section class="wrapper ">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Configurações</a></li>
            </ol>
          </div>
        </div>
        </div>
      </div>
       <section class="panel">

              <header class="panel-heading">

                Cadastro
              </header>
              
              <div class="panel-body">
                <form class="form-horizontal " action="editar_responsavel.php" method="post"  id="jsonForm">

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="nome">Nome Completo</label>
                    <div class="col-sm-10">
                      <input type="text" name="nome" id="nome" readonly="true" class="form-control" value="<?php echo $linha->nome ?>" title="Duplo clique para editar" data-placement="left" >
                    </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label" for="nome">Usuário</label>
                    <div class="col-sm-10">
                      <input type="text" name="usuario" id="usuario" readonly="true" class="form-control" value="<?php echo $linha->usuario ?>" title="Duplo clique para editar" data-placement="left" >
                    </div>

                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label" for="nome">Telefone</label>
                    <div class="col-sm-10">
                      <input type="text" name="telefone" id="telefone" readonly="true" class="form-control telefone" value="<?php echo $linha->telefone ?>" title="Duplo clique para editar" data-placement="left" >
                    </div>

                  </div>                 

                  
            <input type="submit" value="Salvar" disabled id="submit" class="btn btn-primary btn-lg btn-block"> 
                 </form>


    </section>
       <section class="panel">

              <header class="panel-heading">
              <a name="senha"></a>

                Alterar senha
              </header>
              
              <div class="panel-body">
                <form class="form-horizontal " data-spy="scroll" data-target="#senha" action="alterar_senha_responsavel.php" method="post" id="jsonForm2">

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Senha atual</label>
                    <div class="col-sm-10">
                      <input type="password" name="senha" required="" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label" >Nova senha</label>
                    <div class="col-sm-10">
                      <input type="password" name="alterar_senha" required="" class="form-control">
                    </div>

                  </div>
                      <div class="form-group">
                     <label class="col-sm-2 control-label" for="nome">Confirmar noma senha</label>
                    <div class="col-sm-10">
                      <input type="password" name="confirmar_senha" required="" class="form-control">
                    </div>

                  </div>
                  
            <input type="submit" value="Salvar"  id="submit-senha" class="btn btn-primary btn-lg btn-block"> 
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
      $("#usuario").on("dblclick", function(){
        $(this).removeAttr("readonly");
        $("#submit").removeAttr("disabled");
      });

      $("#usuario").tooltip();
    });
    $(document).ready(function(){
      $("#telefone").on("dblclick", function(){
        $(this).removeAttr("readonly");
        $("#submit").removeAttr("disabled");
      });

      $("#telefone").tooltip();
    });

    $('.telefone').mask('(00) 0000-00009');

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
              setTimeout(function(){ location.reload(); }, 1500);


            }else{
              $.growl.error({ message: data.mensagem });
            }
        } 
    }); 
    $('#jsonForm2').ajaxForm({ 
        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   function(data){
            if (data.status==1){
              $.growl.notice({ title:'Status:', message: data.mensagem });
              setTimeout(function(){ location.reload(); }, 1500);


            }else{
              $.growl.error({ message: data.mensagem });
            }
        } 
    }); 
  });

  </script>
