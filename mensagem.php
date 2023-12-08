<?php
include('menu_pais.php');
?>
<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Caixa De Entrada </h3></ol>
             <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="mensagem_php.php">Mensagens</a></li>
              <li><i class="fa fa-laptop"></i>Caixa de entrada</li>
            </ol>
            </div>
            </div>
            </section>
            
            </li>      
                  
<?php   

              $executa = $db->prepare("SELECT * FROM professor");
              $executa->bindParam(':cod_professor',$_SESSION['cod_professor']);
              $executa->execute();
 ?>
<table class="table table-striped table-advance table-hover">
<thead>
  
                  <tr>
                 
                    <th><i class="icon_profile"></i> Nome do professor</th>
                   
                     <th></i>&nbsp</th>
                  

                  </tr>
</thead>
                <tbody>
                  <?php while($linha=$executa->fetch(PDO::FETCH_OBJ)){ ?>
                  <tr class="prof" data-target="dialogo_responsavel.php?cod_professor=<?php echo $linha->cod_professor?>" >
                    
                    <td><img border="0"  width="30" height="30"> <?php echo $linha->nome; ?></td>

                       </tr>
                      <?php }  ?>
                    </tbody>
            </table>  
        </div>
        </div>
    </section>
  </section>
  <script src="jquery-3.3.1.min.js"></script>
  <script>
  $('.prof').on('click', function(event) {
    event.preventDefault(); 
    var url = $(this).data('target');
    location.replace(url);
}); 
</script>



