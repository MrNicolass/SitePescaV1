<html>
	<head>
	 	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<title>Registro - Categoria</title>
	</head>
	<body style="background-color:#E0FFFF;color:white;">
<?php 
	include ("menu.php");
	echo "<center>";
	if(isset($_GET['id'])){
	include ("conectar.php");
	$id= $_GET['id'];
	if($_SESSION['idUsuario'] != $id && $_SESSION['tipoUsuario'] != "admin"){
		header("location:index.php?erro=permissao");
	}

	
$sqlQuery = "select * from categoria where id=$id";
$mysqlQuery = mysqli_query($conexao,$sqlQuery);
while($search=mysqli_fetch_assoc($mysqlQuery)){

$resultadoRegistro[0] = $id;
$resultadoRegistro[1] = $search["categoria"];

}

}else{
$resultadoRegistro[0] = "";
$resultadoRegistro[1] = "";
}

echo "<div class='register1'>";
echo "<p  class='p2'>Cadastro de Categorias</p>";
echo "<form action=categoria_post.php method=post  enctype='multipart/form-data'>";
if(isset($id)){
	echo "ID:<BR>";
	echo "<input placeholder='ID' class='input' readonly name=id value=$id><br><br>";
	}
			if(isset($_GET['erro'])){
		if($_GET['erro']=="login"){
			echo "LOGIN JÁ EM USO<br>";
		}
		}
		echo "Categoria:<br>";
		echo "<input placeholder=Categoria class='input' name=categoria value='$resultadoRegistro[1]'><br><br>";
		echo " <input class='sub' type=submit value=Enviar></div>";
		?>
		</body>
		</html>