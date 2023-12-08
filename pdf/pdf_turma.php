<?php
include ('../conexao.php');
include('../seguranca_adm.php');
$cod_turma = $_GET['cod_turma_professor'];
$titulo = "RELATÓRIO DE TURMA";
@define(PDF_HEADER_LOGO, "");

ob_start();

$q = "SELECT * from relatorio_turma WHERE
  ";

$where = " 1 ";
$where .= " AND cod_turma_professor=:cod_turma_professor ";


//filtro na variavel where
/*if (isset($_POST['a_destino']) AND $_POST['a_destino']<>''){
    $where .= " AND destino LIKE '%{$_POST['a_destino']}%' ";
}
if (isset($_POST['empresa']) AND $_POST['empresa']<>''){
    $where .= " AND empresa='{$_POST['empresa']}' ";
}
if (isset($_POST['veiculo']) AND $_POST['veiculo']<>''){
    $where .= " AND veiculo LIKE '%{$_POST['veiculo']}%' ";
}*/

$orderby = ' ORDER BY cod_turma_professor DESC';

$mod_sel = $db->prepare($q . $where . $orderby);
$mod_sel->bindParam(":cod_turma_professor", $cod_turma );   

$mod_sel->execute();

/*
?>
    <table class="table table-condensed table-hover table-striped" border="1">
        <thead>
        <tr>
            <th data-column-id="destino">Destino</th>
            <th data-column-id="destinatario">Destinatário</th>
            <th data-column-id="data_cadastro">Data de cadastro</th>
            <th data-column-id="data_hora_est_said_f">Data/hora estimada de saida</th>
            <th data-column-id="data_hora_est_cheg_f">Data/hora estimada de chegada</th>
            <th data-column-id="carga_descricao" data-visible="false">Descrição da carga</th>
            <th data-column-id="carga_fechada" data-visible="false">Carga fechada?</th>
            <th data-column-id="peso_estimado" data-visible="false">Peso estimado</th>
            <th data-column-id="empresa">Cliente</th>
            <th data-column-id="veiculo">Veículo</th>
        </tr>
        </thead>
        <tbody>
        </tbody></table>
        <?php
        if ($mod_sel->rowCount()==0){
            echo '<tr><td colspan="4">Nenhum dado encontrado</td>';
        }
*/
       
          $linha=$mod_sel->fetch();

            echo "<div><b>Turma:</b> {$linha->nome}</div>";
            echo "<div><b>Ano:</b> {$linha->ano}</div>";
            echo "<div><b>Professor regente:</b> {$linha->nome_professor}</p>";
            echo "<hr>";
           ?>
            <br>
          <?php
            echo "<div><b>Alunos:</b></div>";
             $mod_sel->execute();
        while($linha=$mod_sel->fetch()){
/*            echo '<tr>';
            echo "<td>{$linha->destino}</td>";
            echo "<td>{$linha->destinatario}</td>";
            echo "<td>{$linha->data_cadastro}</td>";
            echo "<td>{$linha->data_hora_est_said_f}</td>";
            echo "<td>{$linha->data_hora_est_cheg_f}</td>";
            echo "<td>{$linha->carga_descricao}</td>";
            echo "<td>{$linha->carga_fechada}</td>";
            echo "<td>{$linha->peso_estimado}</td>";
            echo "<td>{$linha->empresa}</td>";
            echo "<td>{$linha->veiculo}</td>";
            echo '</tr>';
*/echo "<div> {$linha->nome_aluno}</div>";
            continue;
}
              
        
//        </tbody>
//    </table>
        ?>
<hr>

<style>
    div {
        font-size: 12px;
        margin: 0;
        padding: 0;
    }
</style>

<?php


$html = ob_get_contents();
ob_clean();

// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf_include.php');
require_once('TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle($titulo);
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $titulo);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output(uniqid(). '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
