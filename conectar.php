<html>
<head>
<meta charset="UTF-8">
</head>
<?php
	
	$host = "localhost";
	$user = "root";
	$passwd = "";
	$base = "phpbanco01";
	$conexao = @mysqli_connect($host,$user, $passwd);


if (!$conexao) {
	$mensagem = "Nao foi possivel estabelecer a conexão";
	echo $mensagem . "<hr>";
	die("Connection failed: " . mysqli_connect_error());
	}
	
$db = mysqli_select_db($conexao,$base); 
mysqli_set_charset($conexao, 'utf8'); 


if (!$db) {
 	$mensagem = "Nao foi possivel encontrar o banco de dados";
	echo $mensagem . "<hr>";
	die(mysqli_error());
	}
?> 