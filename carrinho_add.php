<?php
include ("conectar.php");
$produto_id= $_GET['idProd'];
$page = $_GET['page'];
session_start();
if(isset($_SESSION['carrinho']['id'])){
$tamanhoCarrinho = $i=0;$i<sizeof($_SESSION['carrinho']['id']);
		for($i=0;$i<$tamanhoCarrinho;$i++){
			if($_SESSION['carrinho']['id'][$i] == $produto_id){
				$_SESSION['carrinho']['quantidade'][$i]++;
				break;
			} 
		}
		if($i==$tamanhoCarrinho){
		$_SESSION['carrinho']['id'][$tamanhoCarrinho] = $produto_id;
		$_SESSION['carrinho']['quantidade'][$tamanhoCarrinho] = 1;
		}
}else{
$tamanhoCarrinho =0;
$_SESSION['carrinho']['id'][$tamanhoCarrinho] = $produto_id;
$_SESSION['carrinho']['quantidade'][$tamanhoCarrinho] = 1;
}

header("Location: carrinho.php?page=".$page);

?>
