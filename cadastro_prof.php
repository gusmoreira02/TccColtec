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
              <li><i class="fa fa-laptop"></i>Professores</li>
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
                <form class="form-horizontal " action="inserir_prof.php" method="post" id="jsonForm" >

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome Completo</label>
                    <div class="col-sm-10">
                      <input type="text" name="nome" class="form-control" placeholder="Nome Completo">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Usuario</label>
                    <div class="col-sm-10">
                      <input type="text" name="usuario" class="form-control" placeholder="Usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-10">
                      <input type="password" name="senha" class="form-control" placeholder="Senha">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Data de Nascimento</label>
                    <div class="col-sm-10">
                      <input type="date" name="data_nasc" class="form-control" max="<?php echo date('Y-m-d'); ?>" placeholder="Data de Nascimento">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">telefone</label>
                    <div class="col-sm-10">
                      <input type="text" name="telefone" class="form-control telefone" maxlength="15" placeholder="telefone">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">CPF</label>
                    <div class="col-sm-10">
                      <input class="form-control cpf" name="cpf"  type="text" maxlength="14" placeholder="CPF">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">RG</label>
                    <div class="col-sm-10">
                      <input class="form-control rg" name="rg"  type="text" maxlength="9" placeholder="RG">
                    </div>
                    </div>
                    
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Rua</label>
                    <div class="col-sm-10">
                      <input class="form-control" name="rua" id="disabledInput" type="text" placeholder="Rua" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Número</label>
                    <div class="col-sm-10">
                      <input type="text" name="numero" class="form-control" placeholder="Número">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bairro</label>
                    <div class="col-sm-10">
                      <input type="text" name="bairro" class="form-control" placeholder="Bairro">
                    </div>
                  </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Cidade</label>
                    <div class="col-sm-10">
                      <input type="text" name="cidade" class="form-control" placeholder="Cidade">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"  >Estado</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="estado" required="" placeholder="Estado">
                      <option value="">-----------</option>
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

                
              </div>

            </section>
            <input type="submit" class="btn btn-primary btn-lg btn-block"> 
                 </form>

    </section>

  </section>

  <script type="text/javascript">
    $('.telefone').mask('(00) 0000-00009');
    $('.cpf').mask('000.000.000-00');
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
