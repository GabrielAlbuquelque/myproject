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
Desligamento
<br><br><br>
</h2><p>


<?php
	require("08-configBD.php");
	
	$manter=$_REQUEST['manter'];
	$nome	=$_REQUEST['nome'];
	$endereco	=$_REQUEST['endereco'];
	$telefone	=$_REQUEST['telefone'];
	$email	=$_REQUEST['email'];
	$login	=$_REQUEST['login'];
	$area	=$_REQUEST['area'];
	$motivo	=$_REQUEST['motivo'];
if ($motivo==''){
	echo "Insira o motivo do desligamento!";
	echo "<form action=\"menudeslig.php\" method=\"post\">";
	echo "<input type=\"submit\" value=\"Voltar\">";
}
else{
if ($manter=='sim'){
	$prepara="INSERT INTO indiretos (login, nome, area, email, telefone, endereco, motivo) 
		VALUES('$login','$nome','$area', '$email', '$telefone', '$endereco', '$motivo')";
	$result = mysqli_query($link,$prepara);
	if (!$result)
	{	echo "Erro de gravação!<br>";
		return; 
	}
	else  {	echo ("<br>");}
						 
	mysqli_close($link);

}

require("08-configBD.php");
$query="DELETE FROM usuarios WHERE login='$login'";
mysqli_query($link,$query);
mysqli_close($link); 
echo "<p>O voluntário foi desligado.</p>";	
echo "<br/><br/>";
echo "<form action=\"inicio-rh.php\" method=\"post\">";
echo "<input type=\"submit\" value=\"voltar ao início\">";
echo "</form>";

}

	
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

