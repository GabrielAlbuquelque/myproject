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
if ($_SESSION['nivel'] != 'rh') {
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
	<div class='largo-div'>  <!-- classe topo-div (CSS) define a área da esquerda para o menu -->



<h2><br><br>
Dados Cadastrais
<br><br><br>
</h2>
<?php
	require("08-configBD.php");
	$login	=$_REQUEST['d_login'];

	$result=mysqli_query($link,"SELECT * FROM 	usuarios WHERE login='$login'");
	echo "<form action=\"deslig.php\" method=\"post\">";
	while($row = mysqli_fetch_array($result))
	{
		echo "<b><p>Nome: </b>".$row['nome']."<br/>";
		echo "<b>Endereço: </b>".$row['endereco']."<br/>";
		echo "<b>Telefone: </b>".$row['telefone']."<br/>";
		echo "<b>E-mail: </b>".$row['email']."<br/>";
		echo "<b>Login: </b>".$row['login']."<br/>";
		echo "<b>Área: </b>".$row['area']."<br/>";
		echo "<b>1º horário: </b>".$row['dsemana1']."-".$row['periodo1']."<br/>";
		echo "<b>2º horário: </b>".$row['dsemana2']."-".$row['periodo2']."<br/>";
		echo "<br/>";
		$nome=$row['nome'];
		$endereco=$row['endereco'];
		$telefone=$row['telefone'];
		$email=$row['email'];
		$area=$row['area'];
	}

	echo "<input type=\"hidden\" name=\"nome\" value=\"$nome\">
	<input type=\"hidden\" name=\"endereco\" value=\"$endereco\">
	<input type=\"hidden\" name=\"telefone\" value=\"$telefone\">
	<input type=\"hidden\" name=\"email\" value=\"$email\">
	<input type=\"hidden\" name=\"login\" value=\"$login\">
	<input type=\"hidden\" name=\"area\" value=\"$area\">";
	
	mysqli_close($link);
	echo "<input type=\"submit\" value=\"Desligar\">";
	echo"     ";
	echo "<input type=\"button\" value =\"Cancela\" onclick=\"window.location.href='inicio-rh.php'\" />";
	echo "</form>";
?>
</p>
<!-- DIRECIONAR PARA TABELA DE FALTAS -->



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




</div> <!-- fecha dir aqui -->

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

