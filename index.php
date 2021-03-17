<?php
	include ("menu.php");
	?>
<html>
	<head>
  	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<title>Home</title>
	</head>
	<body style="background-color:#E0FFFF;color:black;">
	
<?php
		echo "<center>";
	echo "<div id='sliderid'>";
	include("slide.php");
	echo "</div>";
?>
<div class='id'>
	<h1 style='color: #68c2ff;'>DESTAQUE</H1>
	<?php
	
	
	
	include ("conectar.php");
	$page = (isset($_GET['page']) ? $_GET['page']:1);
		$sqlQuery = "select * from vara limit ".(($page-1)*5).",3";
	$mysqlQuery = mysqli_query($conexao, $sqlQuery); 
		while($search=mysqli_fetch_assoc($mysqlQuery)){ 
	echo " <div class='div'>
				<img class='image' src='imagens/produto/".$search["foto"]."'/>";
				 echo"	<div style='margin-top: 10px;' class='desc'>".$search['nome']."</div>";
						echo"<div class='price'>"."R$ ".$search['preco'].",00</div>";
						$resultadoID = $search['id'];
			 echo" <div><a href=produto.php?id=".$resultadoID."><button class='botao2'><span id='span'>Exibir</span></button></a></div></div>";
	}
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
		</div>
		<?php
		
	$sqlQuery = "select count(id) as nrRegistros from vara";
$mysqlQuery = mysqli_query($conexao, $sqlQuery);
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
			echo "<a href=index.php?page=$i><button class='pagenation'>$i</button></a> ";
			}
	}
}
}	
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