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
<?php
// inclui o acesso ao banco de dados
require("08-configBD.php");
// tela de fundo
require("funcao-nomes_nv.php");
?>
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

<div class="largo-div">

<h2>
Candidatos a Voluntários
<br><br>
</h2>
 
<p>
	
<br><br><br></p>
<?php echo "<form action=\"ficha-novo.php\" method=\"post\">";
echo "<select name=\"id_pessoa\">";
	$pessord = nomes_nv ($link);
	// observe que a variável $pessord recebe um array com o nome das pessoas
	// a serem apresentadas no menu drop down
	// é necessário saber quantos itens existem e isso é feito com a função php count()
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{			
		$id_pessoa=$pessord[$i][0];
		$nome_da_pessoa=$pessord[$i][1];
		echo "<option value=$id_pessoa>  $nome_da_pessoa	</option>'";
	} 
echo "</select>";
echo "<br/><br/><br/><br/>";
if ($nome_da_pessoa=='-nenhum-'){
	echo "<input type=\"button\" value =\"Voltar\" onclick=\"window.location.href='inicio-rh.php'\">";
}

else{
	echo "<input type=\"submit\" value=\"Ver cadastro\">";
}
echo "</form>";
?>



</ft>
<?php echo "<br><br><input type=\"button\" value =\"Voltar\" onclick=\"history.go(-1);return true;\" />"; ?>
<br><br><br><br><br><br><br><br>

</div> <!-- fecha dir aqui -->


<!-- Parte inferior: rodapé  ******************************************************************** -->
<div class='rodape-div'><!-- classe rodapé (CSS) está definida na folha de estilo -->

<hr>
<p2>
Grupo em Defesa da Criança com Câncer - Grendacc | www.grendacc.org.br
</p2>
</div> <!-- div do rodapé -->
</div> <!-- DIV GLOBAL fecha aqui-->
</body>
</html>