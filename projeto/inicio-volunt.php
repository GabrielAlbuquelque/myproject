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
if ($_SESSION['nivel'] != 'vd') {
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
	<div class='esq-div'>  <!-- classe topo-div (CSS) define a área da esquerda para o menu -->
	<h3>Voluntário</h3>
	<br>
	<br>
	<ul class='menu01'>  <!-- a classe menu01 é um estilo css -->
		<!-- é uma lista sem ordem (ul) e cada linha é um link para um arquivo diferente (li)-->
		<li><a 	onclick="window.location.href='logout.php'"	target='blank'	>	Logout	</a></li>
		<li><a 	onclick="window.location.href='v-presenca.php'"	target='blank'	>	Cadastrar Presença	</a></li>
		<li><a 	onclick="window.location.href='faltas-v.php'"	target='blank'	>	Ver Faltas	</a></li>
		<li><a 	onclick="window.location.href='altcadastro.php'"	target='blank'	>	Alterar Cadastro	</a></li>
		<li><a 	onclick="window.location.href='11-upload_aponta_arquivo.htm'"	target='blank'	>	Incluir Foto	</a></li>
	</ul>

	</div>  <!--  fecha esq  -->
	
	
<!-- segunda coluna com largura ******************************************************************* -->
<div class="dir-div">

	<br>
	<br><br>
	<p>
	<br>Selecione a opção desejada no menu ao lado<br><br>
	</p>

	<?php require("aniversariantes.php"); ?>
	
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
