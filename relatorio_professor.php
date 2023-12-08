<?php
include('menu_adm.php');
?>
<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
           
             <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Relatório</a></li>
              <li><i class="fa fa-laptop"></i>Alunos</li>
            </ol>
            </div>
            </div>
            </section>

            <body>
            <table id="grid-data-api" class="table table-condensed table-hover table-striped" >
    <thead>
      <tr>
        <th data-column-id="cod_professor" data-type="numeric" id='identifier'> ID</th>
        <th data-column-id="nome">Nome</th>
        <th data-column-id="data_nasc">Data de nascimento</th>
        <th data-column-id="cpf">CPF</th>
        <th data-column-id="telefone">Telefone</th>
        <th data-column-id="commands" data-formatter="commands" data-sortable="false" ></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mais Informações de </h4>
      </div>
      <div class="modal-body" id="conteudoModal">     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" rel="stylesheet">
<script src="js/jquery.bootgrid.min.js"></script>
<script src="js/jquery.bootgrid.fa.min.js"></script>


<script>
  var id;
  $(document).ready(function(){
      var grid = $("#grid-data-api").bootgrid({
          ajax: true,
          url: "mod_select_professor.php",
          formatters: {
              "commands": function(column, row)
              {
                  return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.cod_professor + "\"><span class=\"glyphicon glyphicon-plus\"></span></button> " +
                  "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.cod_professor + "\"><span class=\"glyphicon glyphicon-list-alt\"></span></button>";
              }
          }
      }).on("loaded.rs.jquery.bootgrid", function()
      {
          grid.find(".command-edit").on("click", function(e)
          {
             id = $(this).data("row-id");
             $("#myModal").modal();
          }).end().find(".command-delete").on("click", function(e)
          {
              document.location = 'pdf/pfd_professor.php?cod_professor=' + $(this).data("row-id")//+ $(
          });
      });

      $('#myModal').on('show.bs.modal', function (event) {
          var url = "relatorio_professor_json.php?id=" + id;

            
          modal = $(this)
          $.getJSON(url, function(data){
            
              modal.find('.modal-title').text('Mais Informações de ' + data.firstName)
              modal.find('.modal-body').html('RG: ' + data.resultado)

              
            });
        });


  });
</script>
  
</body>
</html>
            </li>     
            </tbody>
            </table>  
        </div>
        </div>

      </div>
<div class="btn-group">
                        
                        
                      </div>
                      
 