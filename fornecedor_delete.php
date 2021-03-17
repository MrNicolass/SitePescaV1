<?php
		session_start();
	if($_SESSION['idUsuario'] != $id){
		header("location:index.php?erro=permissao");
	}
include ("conectar.php");

$id = $_GET['id'];

$sqlQuery = "delete from fornecedor where id=$id";

$mysqlQuery = mysqli_query($conexao,$sqlQuery); 
header("location:lista_fornecedor.php");
?>