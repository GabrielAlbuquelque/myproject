<!-- 
	120419 - versão 19 abril 2012
	Menu exemplo
	
 **************************************************************				-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php
session_start();
if (isset($_SESSION['usuario']) == FALSE) {
    //Redireciona para login se não estiver logado
    header("Location: Login.html");
    exit();
}
if ($_SESSION['nivel'] == 'vd') {
    //Redireciona para outra página que todos tem acesso ou de erro
    header("Location: index.html");
    exit();
}?>
<!-- Aqui é colocado o ícone proico.gif com o logo do PRO na aba da página
	está destacado aqui porque TODAS as páginas da aplicação possuem este ícone -->
<link rel="shortcut icon" href="estilo_arquivos/canguru.jpeg" type="image/x-icon" />

<!-- Aqui é definida a folha de estilo chamada query_estilo			-->			
<link type="text/css"   rel="stylesheet"  href="estilo_arquivos/exemplo_estilo.css"/>

<!-- Aqui é definido o conjunto de caracteres			-->			
<meta content="text/html; charset=UTF-8" http-equiv="content-type">

</head>
<body>
    <div class="global-div"> <!-- classe global-div (CSS) define o tamanho total da página-->

	<div class='topo-div'> <!-- classe topo-div (CSS) define a área do cabeçalho  -->
		<head>
		<!-- aqui define o texto que vai na aba da página (orelha)-->
		<title> Voluntariado GRENDACC </title>
		</head>
		<h1>
			<!-- define o topo da página-->
			<!-- primeirament o logo esquerdo logo_pro.gif-->
<a href="index.html"><img src="estilo_arquivos/gradient1.png" alt ='blank' align="left"	width="980" 	height="240"/>	</a>		
		</h1>
	</div>

<!-- primeira coluna: menu  ******************************************************************** -->

<!-- primeira coluna: menu  ******************************************************************** -->
	<div class='largo-div'>  <!-- classe topo-div (CSS) define a área da esquerda para o menu -->
	

	<br>
	<br><br>


<?php
require("procura2.php");
require("08-configBD.php");
$d=$_POST['var1'];
if ($d=='brinquedoteca'){
	$area='Brinquedoteca';
}
else if ($d=='apoioclinico'){
	$area='Apoio Clinico';
}
else if ($d=='apoioescolar'){
	$area='Apoio Escolar';
}
else if ($d=='artesanato'){
	$area='Artesanato';
}
else if ($d=='estoque'){
	$area='Estoque';
}
else if ($d=='bazar'){
	$area='Bazar';}
else if ($d=='eventos'){
	$area='Eventos';}
else{
	$area='Espaço Culinário';
}


echo "<h2>
	<br>Registro de faltas - $area<br><br>
	</h2>";
echo "<form action=\"faltas.php\" method=\"post\">";
echo "<select name=\"login_pessoa\">";
	$pessord = search2 ($link,$d);
	// observe que a variável $pessord recebe um array com o nome das pessoas
	// a serem apresentadas no menu drop down
	// é necessário saber quantos itens existem e isso é feito com a função php count()
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{			
		$login_pessoa=$pessord[$i][0];
		$nome_da_pessoa=$pessord[$i][1];
		echo "<option value=$login_pessoa>  $nome_da_pessoa	</option>'";
	} 
echo "</select>";
echo "<br/><br/><br/><br/>";
echo "<input type=\"submit\" value=\"Ver cadastro\">";
echo "</form>";
echo "<br><br><input type=\"button\" value =\"Voltar\" onclick=\"history.go(-1);return true;\" />";
?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</div>  <!--  fecha div  -->
	
	


<!-- Parte inferior: rodapé  ******************************************************************** -->
<div class='rodape-div'>   <!-- classe rodapé (CSS) está definida na folha de estilo -->
<p2>
<hr>
Grupo em Defesa da Criança com Câncer - Grendacc | www.grendacc.org.br
</p2>
</div> <!-- div do rodapé -->
</div> <!-- DIV GLOBAL fecha aqui-->
</body>
</html>
