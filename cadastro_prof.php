<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<form action="inserir_cadastro_prof.php" method="post">




  <div class="col-xs-3">
 <div class="input-group">
  <label for="ex1"></label>
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" placeholder="Usuario" name="usuario"  class="form-control" required><br>
</div>
</div>
<br>
<br>

 <div class="col-xs-3">
 <div class="input-group">
 <label for="ex1"></label>
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" placeholder="Nome" name="nome" class="form-control" required><br>
</div>
</div>
<br><br>


  <div class="col-xs-3">
 <div class="input-group">
  <label for="ex1"></label>
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" placeholder="Sobrenome" name="sobrenome"  class="form-control" required><br>
</div>
</div>
<br>
<br>


   <div class="col-xs-3">
 <div class="input-group">
   <label for="ex1"></label>
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input type="Email" name="email" placeholder="Email" class="form-control" required><br>
</div>
</div>
<br>
<br>

  <div class="col-xs-3">
  <div class="input-group">
  <label for="ex1"></label>
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" name="senha" placeholder="Senha" class="form-control" required><br>
</div>
</div>
<br>
<br>
  
  <div class="col-xs-3">
  <div class="input-group">
    <label for="ex1"></label>
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" name="csenha" placeholder="Confirmar Senha" class="form-control" required><br>
</div>
</div>
<br>
<br>

<div class="col-xs-3">
 <div class="input-group">
  <label for="ex1"></label>
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
<input type="text" maxlength="14" name="telefone" placeholder="Telefone" class="form-control" required><br>
</div>
</div>
<br>
<br>

<div class="col-xs-3">
 <div class="input-group">
  <label for="ex1"></label>
    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
<input type="text" maxlength="14" name="cpf" placeholder="CPF" class="form-control" required><br>
</div>
</div>
</div>
<br>
<br>
 <button class="btn btn-success" id="botao" type="submit">Cadastrar</button>

 <style type="text/css"> 
body{
		  background: -webkit-gradient(linear, left top, left bottom, from(#F5F5F5), to(#FFE4B5));
	}
#botao{
	width: 310px;
}
</style>
</form>




<?php

?>