<?php
	session_start();
	if($_SESSION['idUsuario'] != $id &&$_SESSION['tipoUsuario'] != "admin"){
		header("location:index.php?erro=permissao");
	}
include ("conectar.php");

$id = $_GET['id'];

$sqlQuery = "delete from categoria where id=$id";

$mysqlQuery = mysqli_query($conexao,$sqlQuery);
header("location:categoria.php");
?>