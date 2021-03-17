<html>
	<head>
        <link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
	<title>Login</title>
	</head>
	<body style="background-color:#E0FFFF;">
		<div id='alpha'>
		<center>
   <form id="borda" action=validar.php method=post>
<input class="campo" name=login placeholder="            Login"><br><br>
<input class="campo" name=senha type=password placeholder="            Senha"><br><br>
       <input class="botao" type=submit value=Entrar>
	   <div style='margin-top: 10px;'>
    <a class='lin' href=usuario_form.php>Registrar-se</a><a class='lin' href='#'>Esqueci minha senha</a>
	</div>
</form>
</div>
<?php
	if(isset($_GET['erro'])){
		if($_GET['erro']=="permissao"){
		?>
	<div class='alert'>
  <span class='closebtn' onclick="this.parentElement.style.display='none';">&times;</span>
 <strong>Erro !</strong> Alguma coisa está Errada!</div>
 <?php
		}else{
		?>
			<div class='alert'>
  <span class='closebtn' onclick="this.parentElement.style.display='none';">&times;</span>
 <strong>Erro !</strong> Alguma coisa está Errada!</div>
 <?php
		}
	}
	?>
	   </body>
	   </html>