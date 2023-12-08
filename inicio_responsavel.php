 <?php 
    include('menu_pais.php');
  ?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dependentes matriculados</h3>

            </ol>
          </div>
        </div>
  <div class="row">
<?php
$executa = $db->prepare("SELECT
  responsavel_has_aluno.aluno_cod_cad_aluno,
  responsavel_has_aluno.responsavel_cod_responsavel,
  aluno_turma.turma,
  aluno_turma.aluno,
  turma.nome,
  aluno.nome AS nome1,
  turma.ano
FROM
  responsavel_has_aluno
  INNER JOIN aluno ON responsavel_has_aluno.aluno_cod_cad_aluno =
    aluno.cod_cad_aluno
  INNER JOIN aluno_turma ON aluno_turma.aluno = aluno.cod_cad_aluno
  INNER JOIN turma ON aluno_turma.turma = turma.cod_turma
  where responsavel_cod_responsavel =:responsavel_cod_responsavel");
 $executa->bindParam(':responsavel_cod_responsavel', $_SESSION['cod_responsavel']);
$executa->execute();

//for ($i=0; $i == $executa2->Rowcount() ; $i+$executa2->Rowcount()) {  


 
       
while($linha=$executa->fetch(PDO::FETCH_OBJ)){ 
    ?>  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg dependente" data-id="<?php echo " $linha->aluno"; ?> "
             data-ano=" <?php echo $linha->ano;?>" data-turma=" <?php echo "$linha->turma"; ?>">

 <div class="count"><?php echo $linha->nome ?></div>
              <div class="title"><?php echo $linha->ano ?></div>
                  <div class="title"><?php echo $linha->nome1?></div>
              
            </div >
            <!--/.info-box-->
          </div>

 <?php } ?>

     </div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <script type="text/javascript">
  var id;
  var ano;
  var turma;
  var cod_parecer;

  $(document).ready(function() { 
    $('#myModal').on('show.bs.modal', function (event) {
      var url = "relatorio_pareceres_json.php?id=" + id + '&ano=' + ano + '&turma=' + turma;

        
      modal = $(this)
      $.getJSON(url, function(data){
          modal.find('.modal-title').text('Pareceres de: ' + data.firstName)
          modal.find('.modal-body').html(data.resultado)
          $('.botao').on("click",function(){
            cod_parecer = $(this).data("cod_parecer")
            console.log(cod_parecer);
            url2 = 'relatorio_parecer.php?cod_parecer=' + cod_parecer + '&id=' + id + '&ano=' + ano + '&turma=' + turma

            $.getJSON(url2, function(data){
                $( ".modal-body" ).html( data.resultado );
            });
          });
      });
    });

    $(".dependente").on("click", function(){
      id = $(this).data("id");
      ano = $(this).data("ano");
      turma = $(this).data("turma");
   //   document.location = 'exibe_dependente.php?id=' + id + '&ano=' + ano;
      //console.log(id + ' ' + ano);
      $('#myModal').modal();
    });


    });

  </script>
