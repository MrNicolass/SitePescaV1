<?php
	include ("menu.php");
	?>
<html>
	<head>
  	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<title>Pesquisa</title>
	</head>
	<body style="background-color:#E0FFFF;color:black;">
<?php


echo "<div class='id'>";
		echo "<h1 style='text-align: center;color: #68c2ff;'>Resultados</H1>";
 $a = $_GET['a'];
	if ($a == "buscar") {
	$palavra = trim($_POST['palavra']);
	
	$sql= mysqli_query($conexao,"SELECT * FROM vara WHERE nome LIKE '%".$palavra."%' ORDER BY nome");
	
	$numRegistros = mysqli_num_rows($sql);
		while($search=mysqli_fetch_assoc($sql)){
		
			echo" <div class='div3'>
		 <a href=produto.php?id=".$search["id"]."><img style='border: 1px solid black;border-radius: 5px;margin-top: 5px;' width=160 height=160 src='/imagens/produto/".$search["foto"]."'></a>
		 <div >".$search["nome"]."</div>
		 <div style='margin-top: 5px;'> R$".$search["preco"].",00</div>
			<a href='produto.php?id=".$search["id"]."'><input type='button' class='botao2' value='Ver mais'></a></div>";	 
		 }
    }else{
		echo "Nenhum produto foi encontrado com a palavra ".$palavra."";
	
    }
echo "</div>";

include("rodape.php");
?>
</body>
</html>