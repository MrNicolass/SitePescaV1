<?php
	include ("conectar.php");
	$login= $_POST['login'];
	$senha= $_POST['senha'];
	
	$sqlQuery = "select * from usuario where login='$login' and senha='$senha'";
	
	$mysqlQuery = mysqli_query($conexao, $sqlQuery);
	if(mysqli_num_rows($mysqlQuery) > 0){
		while($search=mysqli_fetch_assoc($mysqlQuery)){
			session_start();
			$_SESSION['idUsuario'] = $search["id"];
			$_SESSION['nomeUsuario'] = $search["nome"];
			$_SESSION['loginUsuario'] = $search["login"];
			$_SESSION['tipoUsuario'] = $search["tipo"];
			$_SESSION['fotoUsuario'] = $search["foto"];
		}	
		header("location:index.php");
	}else{
		header("location:login.php?erro=true");
	}
