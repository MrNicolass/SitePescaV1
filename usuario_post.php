<?php
	
	include ("conectar.php");
	session_start();
	if(isset($_SESSION['idUsuario'])){
		if($_SESSION['idUsuario'] != $_POST['id'] && $_SESSION['tipoUsuario'] != "admin"){
			header("location:index.php?erro=permissao");
		}
	}
	
	$nome = $_POST['nome'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$telefone = $_POST['telefone'];
	$endereco = $_POST['endereco'];
	$tipo = (isset($_POST['tipo']) ? $_POST['tipo'] : "usuario");
	$id = (isset($_POST['id']) ? $_POST['id'] : "");
	$foto = $_FILES['imagem'];
	
	
	if(isset($id) && $id != ""){
		$sqlQuery = "update usuario set nome='$nome', login='$login', senha='$senha', telefone='$telefone', endereco='$endereco', tipo='$tipo' where id=$id";	
		}else{
		$sqlQuery =
		"select login from usuario where login='$login'";
		$mysqlQuery = mysqli_query($conexao,$sqlQuery);
		if(mysqli_num_rows($mysqlQuery) != 0){
			header("location:usuario_form.php?erro=login");
			exit();
			}else{
			$sqlQuery =
			"insert into usuario(nome,login,senha,telefone,endereco,tipo)
			values('$nome','$login','$senha','$telefone','$endereco','usuario')";
		}
	}
	
	
	if (!empty($foto["name"])) {
		
		if( !preg_match( '/^image\/(jpeg|jpg|png|gif|bmp|svg)$/' , $foto[ 'type' ] ) ){
			echo "IMAGEM INVÁLIDA"; 
			}else{
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
			mysqli_query($conexao,$sqlQuery); 
			$id = ($id != "" ? $id : mysqli_insert_id());
			$nome_imagem = $id." - usuario.";
			$nome_imagem_delete = $nome_imagem."*";
			$nome_imagem = $nome_imagem .  $ext[1];
			$sqlQuery = "update usuario set foto='$nome_imagem' where id=$id";
			mysqli_query($conexao,$sqlQuery);
			$caminho_imagem = "imagens/usuario/" . $nome_imagem;
			$caminho_imagem_delete = "imagens/usuario/" . $nome_imagem_delete;
			if (file_exists($nome_imagem_delete)) {
				unlink(glob($nome_imagem_delete));
			}
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		}
		if(isset($_SESSION['idUsuario']) && $_SESSION['idUsuario'] == $id || !(isset($_POST['id']))){
			$_SESSION['fotoUsuario'] = $nome_imagem;
		}
		}else{
		mysqli_query($conexao,$sqlQuery);
		$id = ($id != "" ? $id : mysqli_insert_id());
	}
	if(isset($_SESSION['idUsuario']) && $_SESSION['idUsuario'] == $id || !(isset($_POST['id']))){
		$_SESSION['idUsuario'] = $id;
		$_SESSION['nomeUsuario'] = $nome;
		$_SESSION['loginUsuario'] = $login;
		$_SESSION['senhaUsuario'] = $senha;
		$_SESSION['tipoUsuario'] = $tipo;
	}
	header("location:index.php");
?>	