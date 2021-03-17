<?php
	include ("menu.php");
	?>
<html>
	<head>
		 	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<title>Carrinho</title>
	</head>
<?php
	echo "
<style>
table {
    border-collapse: collapse;
    width: 100%;
	color: black;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr{
background-color: #c4c4c4
}

th {
    background-color: #66ccff;
    color: black;
}
#da tr:hover{
background: #444;
color: white;
}
</style>
";

                echo "<table>";	
				echo "<h2>Carrinho</h2>";
                if(isset($_SESSION['carrinho']['id'][0])){
				
                   echo "<tr>";
						echo "<th>";
		                echo "Nome";
		                echo "</th>";
						echo "<th>";
		                echo "Quantidade";
		                echo "</th>";
						echo "<th>";
		                echo "Opções";
		                echo "</th>";
		                echo "</tr>";      
									
                		for($i=0;$i<sizeof($_SESSION['carrinho']['id']);$i++){
						
						$sqlQuery = "select * from vara where id=".$_SESSION['carrinho']['id'][$i];
						$mysqlQuery = mysqli_query($conexao, $sqlQuery);
						$search= mysqli_fetch_assoc($mysqlQuery);
						$resultadoRegistro[0]=$search["id"];
                        $resultadoRegistro[1]=$search["nome"];	
						
							echo "<tr>";
							echo "<td>";
							echo $resultadoRegistro[1];
							echo "</td>";		
							echo "<td>";
							echo $_SESSION['carrinho']['quantidade'][$i];
							echo "</td>";							
							echo "<td>";
							echo "<a href='carrinho_remove.php?idProd=$resultadoRegistro[0]&page=".@$page."'><button>Remover</button></a>";
							echo "</td>";
							echo "</tr>";
							}
                }else{
				echo "<tr>
						<td>
						<p><a class='lt'>SEM REGISTROS</a></p>
						</td>
					</tr>";
				
                }		
				
				
				echo "</table>";
				echo "<footer>";
include("rodape.php");
echo "</footer>"
?>
</body>
</html>