<?
include "conexao.php";

$q=strtolower ($_GET["q"]);

$sql = "SELECT nome from aluno like '%" . $q . "%'";

$query = mysql_query($sql);// or die ("Erro". mysql_query());

while($reg=mysql_fetch_array($query)){

	//if (srtpos(strtolower($reg['nome']),$q !== false){
		echo $reg["nome"]."|".$reg["nome"]."\n";
//	}
}
?>