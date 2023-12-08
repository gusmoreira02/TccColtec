<?php 
include('menu_professores.php');
?>
<link href="css/jquery.growl.css" rel="stylesheet" />

<script src="js/jquery.form.js"></script>
<script src="js/jquery.growl.js"></script>
    <section id="main-content">

        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Caixa De Entrada </h3></ol>
            <section class="panel">
              
              <div class="panel-body">
                <form class="form-horizontal" action="inserir_parecer_prof.php"  method="post" id="jsonForm">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Enviar Para</label>
                    <div class="col-sm-10">
                      <select name="aluno" class="form-control" id="nome" required="">
                      <option value="">-------</option>
                        
                        <?php
                        $resultado = $db->prepare("SELECT cod_cad_aluno,nome,nome_aluno,cod_professor, ano FROM relatorio_turma where cod_professor=:cod_professor and ano=YEAR(CURDATE()) order by nome_aluno ");

                        $resultado->bindParam(':cod_professor', $_SESSION['cod_professor']);
                        $resultado->execute();

                        while($linha=$resultado->fetch(PDO::FETCH_OBJ)){
                          

                         echo "<option value='{$linha->cod_cad_aluno}'>{$linha->nome_aluno} - {$linha->nome} - {$linha->ano}</option>"   ;
                           }
                        ?>

                      </select>
                    </div>
                   
  
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Bimestre</label>
                    <div class="col-sm-10">
                      <select name="bimestre" class="form-control" id="bimestre" required="">
                      <option value="">-------</option>
                      <option value="1">1º</option>
                      <option value="2">2º</option>
                      <option value="3">3º</option>
                      <option value="4">4º</option>
                      
                      </select>
                    </div>
                    <?php $executa = $db->prepare("SELECT cod_turma FROM turma_professor WHERE cod_professor=:cod_professor");
$executa->bindParam(':cod_professor', $_SESSION['cod_professor']);
$executa->execute();
$linha = $executa->fetch(PDO::FETCH_OBJ);
?>
                    <input type="hidden" name="turma" value="<?php echo $linha->cod_turma ?>">
                
                   
  
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Relatório</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="relatorio" cols="200" rows="6" placeholder="Relatorio" name="texto"></textarea>
                    </div>
                  </div>
                  </div>
            </div>
        </div>
        </div>
      </div>
    </section>
        <input id='button' type="submit" class="btn btn-primary btn-lg btn-block">
    <!--main content end-->
  </section>
<script>
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
    }); 

    $("#nome").on("change", busca_dados);
    $("#bimestre").on("change", busca_dados);

});

function busca_dados(){
  cod_cad_aluno = $("#nome").val();
  bimestre = $("#bimestre").val();

  if (cod_cad_aluno!='' && bimestre!=''){
    $.post('bimestre.php', { cod_cad_aluno: cod_cad_aluno, bimestre : bimestre }, function(data){
      data = JSON.parse(data);

      //esta preenchido
      if (data.status==1){
        $("#relatorio").val(data.relatorio);
        //if (confirm('aaaa')){
        //  $("#relatorio").removeAttr("readonly");
        //}else{
          $("#relatorio").attr("readonly", "true");
       // }
      }else{
        $("#relatorio").val('').removeAttr("readonly");
      }

    });    
  }


}
</script>
