<?php
	session_start();
	if($_SESSION['idUsuario'] != $id &&$_SESSION['tipoUsuario'] != "admin"){
		header("location:index.php?erro=permissao");
	}
include ("conectar.php");

$id = $_GET['id'];

$sqlQuery = "delete from usuario where id=$id";

$mysqlQuery = mysql_query($sqlQuery);
header("location:lista_de_usuarios.php");
?>