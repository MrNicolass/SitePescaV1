<html>
<head>
<title>Espere...</title>
</head>
<?php
	
include ("conectar.php");

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$tamanho = $_POST['tamanho'];
$libragem = $_POST['libragem'];
$peso = $_POST['peso'];
$lure = $_POST['lure'];
$canico = $_POST['canico'];
$quantidade = $_POST['quantidade'];
$categoria_id = $_POST['categoria_id'];
$fornecedor_id = $_POST['fornecedor_id'];
$foto = $_FILES['imagem'];
$id = (isset($_POST['id']) ? $id=$_POST['id'] : $id="");

session_start();
	if(isset($_POST['id']) && $_SESSION['idUsuario'] != $_POST['id'] && $_SESSION['tipoUsuario'] != "admin"){
		header("location:index.php?erro=permissao");
	}
if(isset($id) && $id != ""){
	$sqlQuery = "update vara set nome='$nome', preco='$preco', descricao='$descricao', tamanho='$tamanho', libragem='$libragem',  peso='$peso',lure='$lure', canico='$canico', quantidade='$quantidade', categoria_id='$categoria_id', fornecedor_id='$fornecedor_id' where id=$id";	
}else{
$sqlQuery =
"insert into vara(nome,preco,descricao,tamanho,libragem,peso,lure,canico,quantidade,categoria_id,fornecedor_id)
values('$nome','$preco','$descricao','$tamanho','$libragem','$peso','$lure','$canico','$quantidade','$categoria_id','$fornecedor_id')";
}
$mysqlQuery = mysqli_query($conexao,$sqlQuery);

if (!empty($foto["name"])) {
	
		if( !preg_match( '/^image\/(jpeg|jpg|png|gif|bmp|svg)$/' , $foto[ 'type' ] ) ){
			
			echo "IMAGEM INVÁLIDA";
		}else{
				
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
			
			$id = ($id != "" ? $id : mysqli_insert_id($conexao));
			
			$nome_imagem = $id." - vara.";
			$nome_imagem_delete = $nome_imagem."*";
			$nome_imagem = $nome_imagem .  $ext[1];
			$sqlQuery = "update vara set foto='$nome_imagem' where id=$id";
			mysqli_query($conexao,$sqlQuery);
			$caminho_imagem = "imagens/produto/" . $nome_imagem;
			$caminho_imagem_delete = "imagens/produto/" . $nome_imagem_delete;
			if (file_exists($nome_imagem_delete)) {
				unlink(glob($nome_imagem_delete));
			}
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		}
		if(isset($_SESSION['idUsuario']) && $_SESSION['idUsuario'] == $id || !(isset($_POST['id']))){
			$_SESSION['fotoVara'] = $nome_imagem;
		}
		}else{
		$id = ($id != "" ? $id : mysqli_insert_id($conexao));
	}
header("location:lista_varas.php");
?>