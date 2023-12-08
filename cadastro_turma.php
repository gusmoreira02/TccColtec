<?php
include('menu_adm.php');
?>
<link href="css/jquery.growl.css" rel="stylesheet" />

<script src="js/jquery.form.js"></script>
<script src="js/jquery.growl.js"></script>
      <script src="js/bootstrap-typeahead.js"></script>

      
<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Cadastro</a></li>
              <li><i class="fa fa-laptop"></i>Turma</li>
            </ol>
          </div>
        </div>
        </div>
      </div>
    
          <section class="panel">

              <header class="panel-heading">

                Cadastro Turma
              </header>
          
              <div class="panel-body">
             <form class="form-horizontal " method="post" action="inserir_turma.php" id="jsonForm">
<!-- terminar aaaaaaaaaaaaaaaaaaaaaaaaa -->
       <div class="form-group">
                    <div class="col-sm-12"> 
                        <input id="turma" type="text" class="col-md-12 form-control" name="turma" placeholder="Turma" autocomplete="off" /> 
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12"> 
                        <input id="turma" type="number" name="ano" maxlength="4" class="col-md-12 form-control" placeholder="Ano" autocomplete="off" />
                    </div>
                  </div>
                
               <input type="submit" class="btn btn-primary btn-lg btn-block"> 
                </form>
              
              
                  
              </div>

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

                  

    </section>
  </section>