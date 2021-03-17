<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<title>Registro - Usuário</title>
	</head>
	<body style="background-color:#E0FFFF;color:white;color:white;">
<?php 
	include('menu.php');
	if(isset($_GET['id'])){
	include ("conectar.php");
	$id= $_GET['id'];
	if($_SESSION['idUsuario'] != $id && $_SESSION['tipoUsuario'] != "admin"){
		header("location:index.php?erro=permissao");
	}
	

	
$sqlQuery = "select * from usuario where id=$id";
$mysqlQuery = mysqli_query($conexao,$sqlQuery);
while($search=mysqli_fetch_assoc($mysqlQuery)){

$resultadoRegistro[0] = $id;
$resultadoRegistro[1] = $search["nome"];
$resultadoRegistro[2] = $search["login"];
$resultadoRegistro[3] = $search["senha"];
$resultadoRegistro[4] = $search["telefone"];
$resultadoRegistro[5] = $search["endereco"];
$resultadoRegistro[6] = $search["tipo"];
$resultadoRegistro[7] = $search["foto"];

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
}

if($resultadoRegistro[7] == ""){
			$resultadoRegistro[7] = "usuario.jpg";
		}

echo "
<form action=usuario_post.php method=post  enctype='multipart/form-data'>
";
echo "<center>";
echo "<div class='register0'>";
echo "<p class='p2' >Cadastro de Usuário</p>";
if(isset($id)){
	echo "<div class='inpuname'>";
	echo "ID:<br>";
	echo "<input class='input' readonly name=id value=$id>";
	echo "</div>";
	}
	echo "<div class='inpuname'>";
	echo "Nome:<br>";
	echo "<input class='input' required name=nome value='$resultadoRegistro[1]' placeholder=Nome>";
	echo "</div>";
			if(isset($_GET['erro'])){
		if($_GET['erro']=="login"){
			echo "LOGIN JÁ EM USO<br>";
		}
		}
		echo "<div class='inpuname'>";
		echo "Login:<br>";
     echo" <input class='input' required name=login placeholder=Login value='$resultadoRegistro[2]'>";
	 echo "</div>";
	 echo "<div class='inpuname'>";
	 echo "Senha:<br>";
       echo" <input placeholder=Senha class='input' required type=password name=senha value='$resultadoRegistro[3]'>";
	  echo "</div>";
	  echo "<div class='inpuname'>";
	  echo "Telefone:<br>";
	echo"	<input placeholder=Telefone class='input' required type=text name=telefone value='$resultadoRegistro[4]'>";
	echo "</div>";
	echo "<div class='inpuname'>";
	echo "Endereço:<br>";
	echo"<textarea rows='5' cols='19.7' placeholder=Endereço id='textarea' required type=text name=endereco value='$resultadoRegistro[5]'></textarea>";
	echo "</div>";
	echo "<div class='inpuname'>";
	if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] == "admin"){
		echo "Tipo:<br>";
		echo "<div style='margin-bottom: 10px;'><select name='tipo' class='input'>";
		echo "<option value='admin' ".($resultadoRegistro[6] == "admin" ? "selected" : "").">Admin</option>";
		echo "<option value='usuario' ".($resultadoRegistro[6] == "usuario" ? "selected" : "").">Usuario</option>";
		echo "</select></div>";
		echo "</div>";
		}
		echo "<div class='inpuname'>";
	echo "Imagem:";
	echo "<br><img width=50 height=50 src='imagens/usuario/$resultadoRegistro[7]'><br>";
	echo "</div>";
	echo "<div style='margin-top: 10px;' class='input_file'>
                    <label for='file' class='file_label'>
                        <i class='fa fa-upload' aria-hidden='true'></i>
                        Selecione uma imagem
                    </label>
                    <input type=file name=imagem id='file'>
                </div>";
	echo " <input style='margin-top: 20px;' class='sub' type=submit value=Enviar></form>";
	echo "</div>";
		
		echo "</div>";	
		echo "</div></form>";
		?>