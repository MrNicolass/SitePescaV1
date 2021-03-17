<?php
	include ("conectar.php");
	$produto_id= $_GET['idProd'];
	$page = $_GET['page'];
	session_start();
	if(isset($_SESSION['carrinho']['id'])){
		$tamanhoCarrinho = sizeof($_SESSION['carrinho']['id']);
		for($i=0;$i<sizeof($_SESSION['carrinho']['id']);$i++){
			if($_SESSION['carrinho']['id'][$i] == $produto_id){
				$_SESSION['carrinho']['quantidade'][$i]--;
				if($_SESSION['carrinho']['quantidade'][$i] == 0){
					unset($_SESSION['carrinho']['quantidade'][$i]);
					unset($_SESSION['carrinho']['id'][$i]);					
					$_SESSION['carrinho']['id'] = array_values($_SESSION['carrinho']['id']);
					$_SESSION['carrinho']['quantidade'] = array_values($_SESSION['carrinho']['quantidade']);
				}
			}
		}
	}
	header("Location: carrinho.php?pat=".$pat);
?>
