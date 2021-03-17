<html>
	<head>
	 	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<title>Registro</title>
	</head>
	<body style="background-color:#E0FFFF;color:white;">
	<center>
<?php 
	include('menu.php');
	if(isset($_GET['id'])){
	include ("conectar.php");
	$id= $_GET['id'];
	
	session_start();
	if($_SESSION['idUsuario'] != $id && $_SESSION['tipoUsuario'] != "admin"){
		header("location:index.php?erro=permissao");
	}

	
$sqlQuery = "select * from fornecedor where id=$id";
$mysqlQuery = mysqli_query($conexao,$sqlQuery);
while($search=mysqli_fetch_assoc($mysqlQuery)){

$resultadoRegistro[0] = $id;
$resultadoRegistro[1] = $search["nome"];
$resultadoRegistro[2] = $search["CNPJ"];
$resultadoRegistro[3] = $search["foto"];
}
}else{
$resultadoRegistro[0] = "";
$resultadoRegistro[1] = "";
$resultadoRegistro[2] = "";
$resultadoRegistro[3] = "";
}

if($resultadoRegistro[3] == ""){
			$resultadoRegistro[3] = "usuario.jpg";
		}
echo "<div class='register2'>";
	echo "<p style='text-align: left;width: 600px;height: 58px;' class='p2'>Cadastro de Fornecedor</p>";
echo "
<form action=fornecedor_post.php method=post enctype='multipart/form-data'>
";
	echo " <form action=lista_fornecedor.php method=post>";
	echo "<div class='inpuname'>";
	echo "Nome:<br>";
		echo "<input placeholder=Nome class='input' name=nome value='$resultadoRegistro[1]'>";
		echo "</div>";
		echo "<div class='inpuname'>";
		echo "CNPJ:<br>";
        echo "<input placeholder=CNPJ class='input' type=text name=CNPJ value='$resultadoRegistro[2]'>";
	echo "</div>";
	echo "Imagem:";
	if($resultadoRegistro[0] != ""){
	echo "<br><img width=50 height=50 src='imagens/usuario/$resultadoRegistro[3]'>
	<br>";
	}else{
	echo "<br><img width=50 height=50 src='imagens/usuario/$resultadoRegistro[3]'>";
	}
	echo "<div class='input_file'>
                    <label for='file' class='file_label'>
                        <i class='fa fa-upload' aria-hidden='true'></i>
                        Selecione uma imagem
                    </label>
                    <input type=file name=imagem id='file'>
                </div>";
	echo " <input class='sub' type=submit value=Enviar></form>";
	echo "</div>";

		echo "</form>";
		?>