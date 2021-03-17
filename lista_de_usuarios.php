<?php
	include ("menu.php");
	?>
<html>
	<head>
  	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<title>LISTA DE USUÁRIOS</title>
	</head>
	<body style="background-color:#E0FFFF;color:black;">

<?php
$page = (isset($_GET['page']) ? $_GET['page']:1);

$sqlQuery = "select * from usuario limit ".(($page-1)*10).",10";
$mysqlQuery = mysqli_query($conexao,$sqlQuery); 
echo "
<center>
<h2 STYLE='color: black;'>TABELA USUÁRIOS</h2> <a href=usuario_form.php><button class='botao'>NOVO</button></a>
";
echo "
<style>
table {
    border-collapse: collapse;
    width: 100%;
	color:white;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr{
background-color: #b6b6b6

}

th {
    background-color: #66ccff;
    color: white;
}
#da tr:hover{
background: #444;
color: white;
}
</style>";
echo "<div id='da'>";
echo "<br><br><table>";
echo "<tr>";
echo "<th>";
echo "ID";
echo "</th>";
echo "<th>";
echo "NOME";
echo "</th>";
echo "<th>";
echo "LOGIN";
echo "</th>";
echo "<th>";
echo "SENHA";
echo "<th>";
echo "TELEFONE";
echo "</th>";
echo "<th>";
echo "ENDEREÇO";
echo "</th>";
echo "</th>";
echo "<th>";
echo "TIPO";
echo "</th>";
	echo "<th>";
	echo "FOTO";
	echo "</th>";
echo "<th colspan=2>";
echo "AÇÕES";
echo "</th>";
echo "</tr>";
while($search=mysqli_fetch_assoc($mysqlQuery)){

$resultadoRegistro[0]=$search["id"];
$resultadoRegistro[1]=$search["nome"];
$resultadoRegistro[2]=$search["login"];
$resultadoRegistro[3]=$search["senha"];
$resultadoRegistro[4]=$search["telefone"];
$resultadoRegistro[5]=$search["endereco"];
$resultadoRegistro[6]=$search["tipo"];
$resultadoRegistro[7]=$search["foto"];

if($resultadoRegistro[7] == ""){
			$resultadoRegistro[7] = "usuario.jpg";
		}

echo "<tr>";
echo "<td>";
echo $resultadoRegistro[0];
echo "</td>";
echo "<td bordercolor=black>";
echo $resultadoRegistro[1];
echo "</td>";
echo "<td bordercolor=black>";
echo $resultadoRegistro[2];
echo "</td>";
echo "<td bordercolor=black>";
echo $resultadoRegistro[3];
echo "</td>";
echo "<td bordercolor=black>";
echo $resultadoRegistro[4];
echo "</td>";
echo "<td bordercolor=black>";
echo $resultadoRegistro[5];
echo "</td>";
echo "<td bordercolor=black>";
echo $resultadoRegistro[6];
echo "</td>";
		echo "</td>";
		echo "<td bordercolor=black>";
		echo "
 <style>
#dropdown {
    position: relative;
    display: inline-block;
	border: 2px solid black;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	border: solid 1px black;
}

.dropdown:hover .dropdown-content {
display: block;
}

</style>

<div class='dropdown'>
  <img src='imagens/usuario/$resultadoRegistro[7]' width='50' height='50'>
  <div class='dropdown-content'>
    <img src='imagens/usuario/$resultadoRegistro[7]' width='400' height='250'>

  </div>
</div>
";
		echo "</td>";
echo "<td bordercolor=black>";
echo "<a href='usuario_form.php?id=".$resultadoRegistro[0]."'><button>Alterar</button>";
echo "</td>";
echo "<td bordercolor=black>";
echo "<a href='usuario_delete.php?id=".$resultadoRegistro[0]."'><button>Excluir</button>";
echo "</td>";
echo "</tr>";
}
echo "</table></div>";
?>
<style>
.pagenation {
margin-top: 0.5%;
  display: inline-block;
  padding: 3px 8px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #87CEFA;
  border: none;
  border-radius: 8px;
  box-shadow: 0 9px #999;
}

.pagenation:hover {background-color: #98F5FF}

.pagenation:active {
  background-color: #87CEFA;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

.pagenation2 {
  margin-top: 0.5%;
  display: inline-block;
  padding: 3px 8px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #009ACD;
  border: none;
  border-radius: 8px;
  box-shadow: 0 9px #999;
}

.pagenation2:hover {background-color: #1E90FF}

.pagenation2:active {
  background-color: #009ACD;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
	</style>
	<?php
	$sqlQuery = "select count(id) as nrRegistros from usuario";
$mysqlQuery = mysqli_query($conexao,$sqlQuery);
while($search=mysqli_fetch_assoc($mysqlQuery)){
$nrPaginas = ceil($search["nrRegistros"]/4);

$total = 50;
$max_links = 10;
$pagina = $page;
$links_laterais = ceil($max_links / 2);
$inicio = $pagina - $links_laterais;
$limite = $pagina + $links_laterais;
echo "<span style='margin-top: 1%;height: 100px;width: 100px;' >";
for ($i = $inicio; $i <= $limite; $i++){
	if ($i == $page){
		echo " <strong class='pagenation2'>" . $i . "</strong> ";
	}else{
		if ($i >= 1 && $i <= $total)
		{
			echo "<a href=lista_produtos.php?page=$i><button class='pagenation'>$i</button></a></span> ";
			}
	}
}
}	
		
?>
</body>
</html>