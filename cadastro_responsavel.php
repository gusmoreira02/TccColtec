<?php
include('menu_adm.php');
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
              <li><i class="fa fa-laptop"></i>Responsavel</li>
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
                <form class="form-horizontal " method="post" action="inserir_pais.php" id="aaa">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Nome Completo</label>
                    <div class="col-sm-10"> 
                      <input type="text" class="form-control" name="nome" placeholder="Nome Completo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Usuario</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="usuario" placeholder="Usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Email</label>
                    <div class="col-sm-10"> 
                      <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Senha</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"  >Data de Nascimento</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="data" max="<?php echo date('Y-m-d'); ?>" placeholder="Data de Nascimento">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"  >telefone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control telefone" name="telefone" maxlength="14" placeholder="telefone" ">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" >CPF</label>
                    <div class="col-sm-10">
                      <input class="form-control cpf" id="focusedInput" name="cpf" type="text" maxlength="14" placeholder="CPF">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" >RG</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="disabledInput" name="rg" maxlength="9" type="text" placeholder="RG" >
                    </div>
                    </div>

                    


              </section>
               <input type="submit" class="btn btn-primary btn-lg btn-block"> 
                </form>
              
              
                  
              </div>
           
                  

    </section>
  </section>
 <script type="text/javascript">
    $('.telefone').mask('(00) 0000-00009');
    $('.cpf').mask('000.000.000-00');




  </script>
  <script>
  $(document).ready(function() { 
    // bind form using ajaxForm 
    $('#aaa').ajaxForm({ 
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
  }); </script>