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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Menu Inicial</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Cadastro</a></li>
              <li><i class="fa fa-laptop"></i>Alunos</li>
            </ol>
          </div>
        </div>
       <section class="panel">
            <header class="panel-heading">
                Cadastro
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="post" action="inserir_aluno.php" id="jsonForm">
                  <div class="form-group">
                   <input type="hidden" name="cod_cad_aluno">
                    <label class="col-sm-2 control-label" >Nome Completo</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nome" placeholder="Nome Completo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"  >Data de Nascimento</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="data" max="<?php echo date('Y-m-d'); ?>" placeholder="Data de Nascimento">
                    </div>
                    </div>
                      <div class="form-group">
                    <label class="col-sm-2 control-label"  >Sexo</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="sexo" required="" placeholder="Sexo">
                      <option value=""></option>
                      <option value="masculino">Masculino</option>
                      <option value="feminino">Feminino</option>
                      </select>
                    </div>
                    </div>
              <div class="form-group">
                    <label class="col-sm-2 control-label"  >Estado</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="estado" required="" placeholder="Estado">
                      <option value=""></option>
                  <option value="AC">Acre</option>
  <option value="AL">Alagoas</option>
  <option value="AP">Amapá</option>
  <option value="AM">Amazonas</option>
  <option value="BA">Bahia</option>
  <option value="CE">Ceará</option>
  <option value="DF">Distrito Federal</option>
  <option value="ES">Espírito Santo</option>
  <option value="GO">Goiás</option>
  <option value="MA">Maranhão</option>
  <option value="MT">Mato Grosso</option>
  <option value="MS">Mato Grosso do Sul</option>
  <option value="MG">Minas Gerais</option>
  <option value="PA">Pará</option>
  <option value="PB">Paraíba</option>
  <option value="PR">Paraná</option>
  <option value="PE">Pernambuco</option>
  <option value="PI">Piauí</option>
  <option value="RJ">Rio de Janeiro</option>
  <option value="RN">Rio Grande do Norte</option>
  <option value="RS">Rio Grande do Sul</option>
  <option value="RO">Rondônia</option>
  <option value="RR">Roraima</option>
  <option value="SC">Santa Catarina</option>
  <option value="SP">São Paulo</option>
  <option value="SE">Sergipe</option>
  <option value="TO">Tocantins</option>
                      </select>
                    </div>
                    </div> 
                    <div class="form-group">
                    <label class="col-sm-2 control-label"  >Cidade</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="cidade" placeholder="Cidade">
                    </div>
                    </div>  
                    <div class="form-group">
                    <label class="col-sm-2 control-label"  >Bairro</label>
                    <div class="col-sm-10">
                      <input type="tex" class="form-control" name="bairro" placeholder="Bairro">
                    </div>
                    </div>     
                    <div class="form-group">
                    <label class="col-sm-2 control-label"  >Rua</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="rua" placeholder="Rua">
                    </div>
                    </div>  

                    <div class="form-group">
                    <label class="col-sm-2 control-label"  >Número</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="numero" placeholder="Número">
                    </div>
                    </div>



                    

    </section>
    <input type="submit" id="button" onclick="myFunction()" class="btn btn-primary btn-lg btn-block">
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
  }); 
    </script>