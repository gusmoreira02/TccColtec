<?php 
include('menu_adm.php');
?><link href="css/jquery.growl.css" rel="stylesheet" />

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
              <li><i class="fa fa-laptop"></i>Regente</li>
            </ol>
          </div>
        </div>
        </div>
      </div>
       <section class="panel">

              <header class="panel-heading">

                Cadastro de Ensalamento de turma
              </header>
          
              <div class="panel-body">
             <form class="form-horizontal " method="post" action="inserir_ensalamento.php" id="jsonForm">

                               <div class="form-group">
                    <div class="col-sm-12"> 
                        <input id="aluno" type="text" class="col-md-12 form-control" placeholder="Aluno" autocomplete="off" />    <input id="cod_cad_aluno" type="hidden" class="col-md-12 form-control" name="cod_cad_aluno" autocomplete="off" />
                    </div>
                  </div>
                    <div class="form-group">
                    <div class="col-sm-12"> 
                        <input id="turma" type="text" class="col-md-12 form-control" placeholder="Turma" autocomplete="off" />    <input id="cod_turma" type="hidden" class="col-md-12 form-control" name="cod_turma" autocomplete="off" />
                    </div>
                  </div>
                                          
                        

                  
                                          
                        
                    </div>

            </div>
        </div>
                     

        <script>
            $(function() {
                $('#aluno').typeahead({
                    ajax: 'cadastro_parentesco_aluno_json.php',
                    onSelect: function(item){
						$("#cod_cad_aluno").val(item.value);
					},
                    displayField: 'nome',
                    valueField: 'cod_cad_aluno'
                });

            });
        </script>
           <script>
            $(function() {
                $('#turma').typeahead({
                    ajax: 'cadastro_regente_turma_json.php',
                    onSelect: function(item){
            $("#cod_turma").val(item.value);
          },
                    displayField: 'turma_ano',
                    valueField: 'cod_turma'
                });

            });
        </script>

        </div>
</header>
</section>
 <input type="submit" class="btn btn-primary btn-lg btn-block"> 
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
