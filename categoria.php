<?php
	include ("menu.php");
	?>
<html>
	<head>
  	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<title>Categorias</title>
	</head>
	<body style="background-color:#E0FFFF;color:black;">
<?php
$page = (isset($_GET['page']) ? $_GET['page']:1);

$sqlQuery = "select * from categoria limit ".(($page-1)*10).",10";	

$mysqlQuery = mysqli_query($conexao,$sqlQuery); 
echo "<div style='text-align: center;margin-bottom: 30px;'><h2>CATEGORIAS</h2> <a href=categoria_form.php><button class='botao'>NOVO</button></a></div>";
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
</style>
";
echo "<div id='da'>";
echo "<table style='margin-bottom: 25px;'>";
echo "<tr>";
echo "<th>";
echo "ID";
echo "</th>";
echo "<th>";
echo "CATEGORIA";
echo "</th>";
echo "<th colspan=2>";
echo "AÇÕES";
echo "</th>";
echo "</tr>";

	
while($search=mysqli_fetch_assoc($mysqlQuery)){ 

$resultadoRegistro[0]=$search["id"];
$resultadoRegistro[1]=$search["categoria"];
echo "<tr>";
echo "<td>";
echo $resultadoRegistro[0];
echo "</td>";
echo "<td bordercolor=black>";
echo $resultadoRegistro[1];
echo "</td>";
		echo "</td>";
echo "<td bordercolor=black>";
echo "<a href='categoria_form.php?id=".$resultadoRegistro[0]."'><button>Alterar</button>"; 
echo "</td>";
echo "<td bordercolor=black>";
echo "<a href='categoria_delete.php?id=".$resultadoRegistro[0]."'><button>Excluir</button>";
echo "</td>";
echo "</tr>";


}
echo "</table></div>";
?>

</body>
</html>