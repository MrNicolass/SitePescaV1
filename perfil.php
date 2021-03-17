<?php
include ("menu.php");
?>
<html>
	<head>
  	<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<title>Perfil</title>
	</head>
      <?php
	  echo "<div id='perf'>";
	  if(isset($_SESSION['idUsuario'])){
	  echo "<h4> Bem-vindo ".$_SESSION['nomeUsuario']." !</h4>";
	  echo "<br><img style='border:black solid 2px;' width=206 height=200 src='imagens/usuario/".($_SESSION['fotoUsuario'] != "" ? $_SESSION['fotoUsuario'] : "usuario.jpg")."'>
		<br>";
		}
	echo "<span style='margin-right: 10px;'><a href='usuario_form.php?id=".$_SESSION['idUsuario']."'><button class='sub'>Editar</button></a></span>";
	echo "<span><a href='deslogar.php'><button class='sub'>Deslogar</button></a></span></div>";
	
		echo "<span id='perf2'>";
	echo "<h3 style='text-align: center;margin: auto;'>Calendário de Pesca</h3>";
	echo "<img style='margin-top: 25px;' width=650 height=700 src='map.jpg'>";
	
	echo "</span>";
	?>
</body>
</html>