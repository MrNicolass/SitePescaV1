<?php
	include ("menu.php");
	?>
<html>
	<head>
  	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
<title>Produto</title>
	</head>
	<body style="background-color:#E0FFFF;color:black;">
	
<div class='id'>
	<?php	
	$resultado = $_GET['fornecedor_id'];
	$sqlQuery = "select * from fornecedor where id=".$resultado."";
	$mysqlQuery = mysqli_query($conexao, $sqlQuery);
		while($search=mysqli_fetch_assoc($mysqlQuery)) { 
			echo "<h1 style='color: #68c2ff;'>".$search['nome']."</H1>";
		}
	?>	
	
	<?php
	
	$resultado = $_GET['fornecedor_id'];
  $sqlQuery = "select * from vara where fornecedor_id=".$resultado."";
	$mysqlQuery = mysqli_query($conexao, $sqlQuery);
	
		while($search=mysqli_fetch_assoc($mysqlQuery))  { 
	echo " <div class='div'>
				<img class='image' src='imagens/produto/".$search["foto"]."'/>";
				 echo"	<div style='margin-top: 10px;' class='desc'>".$search['nome']."</div>";
						echo"<div class='price'>"."R$ ".$search['preco']."</div>";
						$resultadoID = $search['id'];
			 echo" <div><a href=produto.php?id=".$resultadoID."><button class='botao2'><span id='span'>Exibir</span></button></a></div></div>";
	}
	echo "</div>";
	
			echo "<span style='
			width: 50%;
			height: 20%;
			float: bottom;
			position: relative;
			'>";
	echo "</span>";
	echo "";
	include("rodape.php");
		?>
</center>
</body>
</html>