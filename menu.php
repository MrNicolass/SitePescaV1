<?php
include ("conectar.php");
	session_start();
	echo "<div style='height: 45%;'>";
	echo "<div id='lados'>";
	echo "<div id='lado'>";
  echo "<img  width=98 height=98 src='Capturar.png'>";
echo "<h2 style='font-size: 45px;: ;color: #87CEFA;float: right;text-shadow: -1px 0 #006666, 0 1px #006666, 1px 0 #006666, 0 -1px #006666;'>Pesca Alternativa</h2>";
echo "</div>";
echo "<div id='lado1'>";
	if(isset($_SESSION['idUsuario'])){
	echo "<h4 style='color: #68c2ff;float: right;'>";
	echo "Bem-Vindo ";
	echo $_SESSION['nomeUsuario'];
	echo "</h4>";
	echo "<span><a href='deslogar.php'><button class='button' style='margin-right: 10px;'><span>Deslogar</span></button></a></span>";
	echo "<a href='carrinho.php'>";
	echo "<img border='0' alt='Carrinho'  src='barco.png 'title='Carrinho' width=40 height=40></a>";
	echo "</div>";
	echo "</div>";
	}else{
	echo "<h4 style='color: #68c2ff;float: right;'>";
	echo "Faça o seu Login!";
	echo "</h4>";
	echo "<span><a href='login.php'><button class='button' style='margin-right: 10px;'><span>Login</span></button></a></span>";
	echo "<img border='0' alt='Carrinho'  src='barco.png 'title='Faça o Login para usar!' width=40 height=40></a>";
	echo "</div>";
	echo "</div>";
	}
	?>
	<body style="background-color:#E0FFFF;color:black;">
	<style>
	
#uli {
    list-style-type: none;
    margin: none;
    padding: none;
    overflow: hidden;
    background-color: #68c2ff;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #005087;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body>
<ul id='uli'>
	<?php
	if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] == "admin"){
	echo" <li class='dropdown'>
	<a class='dropbtn'>Admin</a>
	<div class='dropdown-content'>
	<a href='lista_fornecedor.php'>Lista de Fornecedores</a>
      <a href='lista_de_usuarios.php'>Lista de Usuários</a>
	  <a href='lista_varas.php'>Lista de Varas</a>
	  <a href='categoria.php'>Categorias</a>
    </div>
	</li>";
	}
	?>
	<li><a href="index.php">Home</a></li>
	<?php
		if(isset($_SESSION['idUsuario'])){
	echo "<li><a href='perfil.php'>Perfil</a></li>";
	}else{
	echo "<li><a href='login.php'>Perfil</a></li>";
	}
	?>
  <?php
  $sqlQuery = "select * from categoria ";
	$mysqlQuery = mysqli_query($conexao, $sqlQuery);  
   echo " <li class='dropdown'>";
   echo "   <a class='dropbtn'>Varas</a>";
   echo " <div class='dropdown-content'>";
   while($search=mysqli_fetch_assoc($mysqlQuery)){
   echo " <a href='categ.php?categoria_id=".$search['id']."'>".$search['categoria']."</a>";
   }
  echo" </div>
  </li>";
  ?>
  <?php
  $sqlQuery = "select * from fornecedor ";
	$mysqlQuery = mysqli_query($conexao, $sqlQuery);  
   echo " <li class='dropdown'>";
   echo "   <a class='dropbtn'>Marcas</a>";
   echo " <div class='dropdown-content'>";
   while($search=mysqli_fetch_assoc($mysqlQuery)){
   echo " <a href='forn.php?fornecedor_id=".$search['id']."'>".$search['nome']."</a>";
   }
  echo" </div>
  </li>";
 
  ?>
  <li><a href="quem.php">Sobre</a></li>
  <span class='tudo2'><form style='margin: 5px;width:210px;height:25px;' name='frmBusca' method='post' action='testephp.php?a=buscar' >
	  <input style='float:left; border-radius: 5px;border-color: #1884D6;' placeholder='Buscar' type='text' name='palavra' />
    <button alt='Pesquisar' style='float:right; border-radius: 5px;border-color: #1884D6; type='submit'><img alt='Pesquisar' width=15 height=15 src='lupa.png'></button>
	</form></span>
</form>
</ul>
</style>
<style>
#tudo {
	width: 943px;
	height: 120px;
	position:relative;
	float: left;
}
#tudo1 {
	position:relative;
	width: 200px;
	float: left;
}
.tudo2{
width: 225px;
color: black;
float: right;
}
</style>
</div>