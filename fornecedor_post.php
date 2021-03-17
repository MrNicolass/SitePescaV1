<?php
include ("conectar.php");
	session_start();
	if(isset($_GET['id'])){
	$id= $_GET['id'];
	if(isset($_SESSION['idUsuario'])){
		if($_SESSION['idUsuario'] != $id && $_SESSION['tipoUsuario'] != "admin"){
			header("location:index.php?erro=permissao");
		}
		}
		}

$nome = $_POST['nome'];
$CNPJ = $_POST['CNPJ'];
$foto = $_FILES['imagem'];
$id = (isset($_POST['id']) ? $_POST['id'] : "");

if(isset($id) && $id != ""){
$sqlQuery = "update fornecedor set nome='$nome', CNPJ='$CNPJ' where id=$id";	
}else{
$sqlQuery =
"insert into fornecedor(nome,CNPJ)
values('$nome','$CNPJ')";
}
if (!empty($foto["name"])) {
		if( !preg_match( '/^image\/(jpeg|jpg|png|gif|bmp|svg)$/' , $foto[ 'type' ] ) ){
			echo "IMAGEM INVÁLIDA";
			}else{
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
			mysqli_query($conexao, $sqlQuery); 
			$id = ($id != "" ? $id : mysql_insert_id());
			
			$nome_imagem = $id." - fornecedor.";
			$nome_imagem_delete = $nome_imagem."*";
			$nome_imagem = $nome_imagem .  $ext[1];
			$sqlQuery = "update fornecedor set foto='$nome_imagem' where id=$id";
			mysqli_query($conexao,$sqlQuery);
			$caminho_imagem = "imagens/fornecedor/" . $nome_imagem;
			$caminho_imagem_delete = "imagens/fornecedor/" . $nome_imagem_delete;
			if (file_exists($nome_imagem_delete)) {
				unlink(glob($nome_imagem_delete));
			}
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		}
		if(isset($_SESSION['idUsuario']) && $_SESSION['idUsuario'] == $id || !(isset($_POST['id']))){
			$_SESSION['fotoFornecedor'] = $nome_imagem;
		}
		}else{
		$id = ($id != "" ? $id : mysql_insert_id());
	}
$mysqlQuery = mysqli_query($conexao,$sqlQuery); 
header("location:lista_fornecedor.php");
?>