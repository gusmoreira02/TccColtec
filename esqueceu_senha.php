<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

  <title>Login</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />


</style>

<body class="login-page" >
  <div class="container">
  <a class="logo">Escola <span class="lite">Clementina Lona Costa</span></a>



    <form class="login-form" method="post" id="jsonForm" action="esqueceu_senha_dados.php">


      <div class="login-wrap">
       <center>Recuperar senha</center>
     
        <p class="login-img"><i class="icon_lock_alt"></i></p>
       

        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input type="text" class="form-control" placeholder="Insira seu email" name="email" autofocus>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
      </div>
    </form>
  </div>

<style>
.login-page
{
  
    


}
</style>
<link href="css/jquery.growl.css" rel="stylesheet" />

<script src="js/jquery.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.growl.js"></script>
      <script src="js/bootstrap-typeahead.js"></script>
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

            }else{
              $.growl.error({ message: data.mensagem });
            }
        } 
    })
  }); 
    </script>
</body>


</html>
