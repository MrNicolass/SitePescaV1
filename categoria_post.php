<?php
	
include ("conectar.php");

$categoria = $_POST['categoria'];
$id = (isset($_POST['id']) ? $_POST['id'] : "");

session_start();
	if($_SESSION['idUsuario'] != $_POST['id'] && $_SESSION['tipoUsuario'] != "admin"){
		header("location:index.php?erro=permissao");
	}

if(isset($id) && $id != ""){
$sqlQuery = "update categoria set categoria='$categoria' where id=$id";	
}else{
$sqlQuery =
"insert into categoria(categoria)
values('$categoria')";
}
$mysqlQuery = mysqli_query($conexao,$sqlQuery); 
header("location:categoria.php");
?>