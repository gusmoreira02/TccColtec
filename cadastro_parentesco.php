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
              <li><i class="fa fa-laptop"></i>Parentesco</li>
            </ol>
          </div>
        </div>
        </div>
      </div>
       <section class="panel">

              <header class="panel-heading">

                Cadastro de Parentesco
              </header>
          
              <div class="panel-body">
             <form class="form-horizontal " method="post" action="inserir_parentesco.php" id="jsonForm">

                  <div class="form-group">
                    <div class="col-sm-12"> 
                        <input id="responsavel" type="text" class="col-md-12 form-control" placeholder="Responsavel" autocomplete="off" />    <input id="cod_responsavel" type="hidden" class="col-md-12 form-control" name="cod_responsavel" autocomplete="off" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12"> 
                        <input id="aluno" type="text" class="col-md-12 form-control" placeholder="Aluno" autocomplete="off" />    <input id="cod_cad_aluno" type="hidden" class="col-md-12 form-control" name="cod_cad_aluno" autocomplete="off" />
                    </div>
                  </div>
                    <div class="form-group">
                    <div class="col-sm-12">
                      <select class="form-control" name="grau_parentesco" required="">
                      <option value=""  >- Selecione o grau de parentesco -</option>
                      <option value="pai">Pai</option>
                      <option value="mae">Mãe</option>
                      <option value="avô">Avô</option>
                      <option value="tio">Tio</option>
                      <option value="tia">Tia</option>
                      <option value="padrinho">Padrinho</option>
                      <option value="madrinha">Madrinha</option>
                      </select>
                    </div>
                    </div>
                   
                                          
                        

                  
                                          
                        
                    </div>

            </div>
        </div>
                     

        <script>
            $(function() {
                $('#responsavel').typeahead({
                    ajax: 'cadastro_parentesco_pai_json.php',
                    onSelect: function(item){
            $("#cod_responsavel").val(item.value);
          },
                    displayField: 'nome',
                    valueField: 'cod_responsavel'
                });

            });
        </script>
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
