<?php
		session_start();
	if($_SESSION['idUsuario'] != $id){
		header("location:index.php?erro=permissao");
	}
include ("conectar.php");

$id = $_GET['id'];

$sqlQuery = "delete from vara where id=$id";

$mysqlQuery = mysql_query($sqlQuery); 
header("location:lista_varas.php");
?>