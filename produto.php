<html>
<head>
	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
<title>Produto</title>
	</head>
<?php
	include ("menu.php");
	if(isset($_GET['id'])){
		$id= $_GET['id'];
		
echo"	<div class='id1'> ";
$sqlQuery = "select * from vara where id=$id ";
	$mysqlQuery = mysqli_query($conexao, $sqlQuery); 
		while($search=mysqli_fetch_assoc($mysqlQuery)){ 
echo"	<h1 style='text-align: center;color: #68c2ff;'>".$search['nome']."</H1>";
echo"	<span class='desc1'><p>".$search['descricao']."</p>
<p>Tamanho: ".$search['tamanho']."</p>
<p>Peso: ".$search['peso']."</p>
<p>Libragem: ".$search['libragem']."</p>
<p>Lure: ".$search['lure']."</p>
<p>Caniço: ".$search['canico']."</p>
 </span>";
}
		$sqlQuery = "select * from vara where id=$id ";
	$mysqlQuery = mysqli_query($conexao, $sqlQuery); 
		while($search=mysqli_fetch_assoc($mysqlQuery)){ 
			echo "<div id='ima'><img class='image' src='imagens/produto/".$search["foto"]."'</div>";
				 echo"	<div class='desc'><h4>".$search['nome']."</h4></div>";
						echo"<div style='margin-top: 10px;' class='price'>"."R$ ".$search['preco'].",00</div>";
						$resultadoID = $search['id'];
			 echo" <div><a href='carrinho_add.php?idProd=".$resultadoID."&page=".@$page."'><button class='botao3'><span id='span'>Comprar</span></button></a></div>";
	} 
	}
	echo "</div>";
	echo "</div>";
	include("rodape.php");
	?>