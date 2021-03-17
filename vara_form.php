<html>
	<head>
	<meta charset="UTF-8">
	 	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="style.css"/>
	<title>Pesca.com</title>
	</head>
	<body style="background-color:#E0FFFF;color:white;">
<?php
	include('menu.php');
	if(!(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] == "admin")){
		header("location:index.php?erro=permissao");
	}
	include ("conectar.php");
	
	
	if(isset($_GET['id'])){
		
		$id= $_GET['id'];
		
		$sqlQuery = "select * from vara where id=$id";
        
	
		$mysqlQuery = mysqli_query($conexao,$sqlQuery);
		
		while($search=mysqli_fetch_assoc($mysqlQuery)){
			
			$resultadoRegistro[0] = $id;
			$resultadoRegistro[1] = $search["nome"];
			$resultadoRegistro[2] = $search["preco"];
			$resultadoRegistro[3] = $search["descricao"];
			$resultadoRegistro[4] = $search["tamanho"];
			$resultadoRegistro[5] = $search["peso"];
			$resultadoRegistro[6] = $search["libragem"];
			$resultadoRegistro[7] = $search["lure"];
			$resultadoRegistro[8] = $search["canico"];
			$resultadoRegistro[9] = $search["categoria_id"];
			$resultadoRegistro[10] = $search["fornecedor_id"];
			$resultadoRegistro[11] = $search["foto"];
			$resultadoRegistro[12] = $search["quantidade"];
		}
		}else{
		$resultadoRegistro[0] = "";
		$resultadoRegistro[1] = "";
		$resultadoRegistro[2] = "";
		$resultadoRegistro[3] = "";
		$resultadoRegistro[4] = "";
		$resultadoRegistro[5] = "";
		$resultadoRegistro[6] = "";
		$resultadoRegistro[7] = "";
		$resultadoRegistro[8] = "";
		$resultadoRegistro[9] = "";
		$resultadoRegistro[10] = "";
		$resultadoRegistro[11] = "";
		$resultadoRegistro[12] = "";
	}
if($resultadoRegistro[11] == ""){
			$resultadoRegistro[11] = "nada.jpg";
		}
		echo "
<form action='vara_post.php' method='post'  enctype='multipart/form-data'>
";
echo "<center>";
echo "<div class='register5'>";
echo "<p class='p2' style='margin: 0;'>Cadastro de Varas</p>";

	if(isset($id)){
	echo "<div class='inpuname'>";
	echo"ID:<br>";
		echo "<input class='input' readonly  name=id value=$id>";
		echo "</div>";
	}
	echo "<br>";
	echo "<div class='inpuname'>";
	echo "Nome:<br>";
	echo "<input placeholder=Nome class='input' name=nome value='$resultadoRegistro[1]'>";
	echo "</div>";
	echo "<div class='inpuname'>";
	echo "Preço:<br>";
 	echo "<input placeholder=Preço type='number' class='input' name=preco value='$resultadoRegistro[2]'>";
	echo "</div>";
	echo "<div class='inpuname'>";
	echo "Descrição:<br>";
	echo"<textarea rows='5' cols='19.7' placeholder=Descrição id='textarea' required type=text name=descricao value='$resultadoRegistro[3]'></textarea>";
	echo "</div>";
	echo "<div class='inpuname'>";
	echo "Tamanho:<br>";
	echo"<input placeholder=Tamanho class='input' name=tamanho value='$resultadoRegistro[4]'>";
	echo "</div>";
	echo "<div class='inpuname'>";
	echo "Peso:<br>";
	echo"<input placeholder=Peso class='input' name=peso value='$resultadoRegistro[5]'>";
	echo "</div>";
	echo "<div class='inpuname'>";
	echo "Libragem:<br>";
	echo"<input placeholder=Libragem class='input' name=libragem value='$resultadoRegistro[6]'>";
	echo "</div>";
	echo "<div class='inpuname'>";
	echo "Caniço:<br>";
	echo"<input placeholder=Caniço class='input' name=canico value='$resultadoRegistro[8]'>";
	echo "</div>";
	echo "<div class='inpuname'>";
	echo "Quantidade:<br>";
	echo"<input placeholder=Quantidade class='input' name=quantidade value='$resultadoRegistro[12]'>";
	echo "</div>";
	echo "<div class='inpuname'>";
	echo "Lure:<br>";
	echo"<input placeholder=Lure class='input' name=lure value='$resultadoRegistro[7]'>";
	echo "</div>";
	echo "Fornecedor:<br>";
	echo "<div style='margin-bottom: 20px;'><select name='fornecedor_id' class='input'>";
	
	$sqlQuery2 = "select * from fornecedor";
		$mysqlQuery2 = mysqli_query($conexao,$sqlQuery2);
		while($search2=mysqli_fetch_assoc($mysqlQuery2)){
	
		echo "<option ".($resultadoRegistro[10] == $search2["id"] ? "selected" : "")." value=".$search2["id"].">".$search2["id"]." - ".$search2["nome"]."</option>";
		}
	
	echo"</select></div>";
	echo "Categoria:<br>";
	echo "<div style='margin-bottom: 10px;'><select name='categoria_id' class='input'>";
	
	$sqlQuery2 = "select * from categoria";
		$mysqlQuery2 = mysqli_query($conexao,$sqlQuery2);
		while($search2=mysqli_fetch_assoc($mysqlQuery2)){
	
		echo "<option ".($resultadoRegistro[9] == $search2["id"] ? "selected" : "")." value=".$search2["id"].">".$search2["id"]." - ".$search2["categoria"]."</option>";
		}
	echo "</select></div>";
	echo "Imagem:";
		echo "<br><img width=50 height=50 src='imagens/usuario/$resultadoRegistro[7]'>";
	echo "<div style='margin-top: 10px;' class='input_file'>
                    <label for='file' class='file_label'>
                        <i class='fa fa-upload' aria-hidden='true'></i>
                        Selecione uma imagem
                    </label>
                    <input type=file name=imagem id='file'>
                </div>";
	echo " <input style='margin-top: 20px;' class='sub' type=submit value=Enviar></form>";
	echo "</div>";
?>
    </body>
</html>