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
    //Redireciona para login se n�o estiver logado
    header("Location: Login.html");
    exit();
}
if ($_SESSION['nivel'] != 'vd') {
    //Redireciona para outra p�gina que todos tem acesso ou de erro
    header("Location: index.html");
    exit();
}?>
<!-- Aqui é colocado o ícone proico.gif com o logo do PRO na aba da página
	está destacado aqui porque TODAS as páginas da aplicação possuem este ícone -->
<link rel="shortcut icon" href="estilo_arquivos/canguru.jpeg" type="image/x-icon" />

<!-- Aqui é definida a folha de estilo chamada query_estilo			-->			
<link type="text/css"   rel="stylesheet"  href="estilo_arquivos/exemplo_estilo.css"/>

<!-- Aqui é definido o conjunto de caracteres			-->			
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">

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
	<div class='largo-div'> 
	<h2><br><br><br>
	<br><br><br>Registrar presen�a
	</h2><br><br><br><br><br><br><br><br><br>
<?php
	require("08-configBD.php");

	$login	=$_SESSION['usuario'];
	
	
	$prepara="INSERT INTO presenca (`timestamp`, `id`, `login`) VALUES (CURRENT_TIMESTAMP, NULL, '$login')";
	$result = mysqli_query($link,$prepara);
	if (!$result)
	{	echo "Erro de grava��o!<br>";
		return; 
	}
	else  {	echo ("<br>");}
						 
	mysqli_close($link);
	
	echo "<br/><br/>";
	echo "<form action=\"inicio-volunt.php\" method=\"post\">";
	echo "<p3>__________________</p3>";
	echo "<input type=\"submit\" value=\"Registrar\">";
	echo "</form>";
	?>
	
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</div>  <!--  fecha esq  -->
	
	


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
