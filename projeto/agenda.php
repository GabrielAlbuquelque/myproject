<!-- 
	120419 - versão 19 abril 2012
	Menu exemplo
	
 **************************************************************				-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php
/*
 * Exemplo 1
 * Como verificar se o usuário está logado e autorizado a ver
 * a página
 *
 * incluir no começo de todas as páginas
 * que precisarem estar logado para acessar
 *
 * $_SESSION só funciona se utilizar session_start();
 */
 
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
}
require("08-configBD.php");
$area	=$_REQUEST['area'];

require("funcao-agenda.php");



?>
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

<div class="largo-div">


<h2><br><br><br><br><br><br>
Agenda:
<br><br>
</h2>
<Br><BR>


<!-- estilo tabela -->
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#bbb;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#594F4F;background-color:#E0FFEB;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#493F3F;background-color:#9DE0AD;}
.tg .tg-4t3w{background-color:#f1fff6;text-align:center}
.tg .tg-2tk4{font-size:16px;background-color:#b9ffb8;color:#000000;text-align:center}
.tg .tg-vgk7{background-color:#f4f4f4}
.tg .tg-lufz{font-size:16px;background-color:#dee0ff;color:#000000}
</style>
<form action="fichas.php" method="post">
<table class="tg">
  <tr>
    <th class="tg-vgk7"></th>
    <th class="tg-e191">  Segunda-feira  </th>
    <th class="tg-e191">   Terca-feira   </th>
    <th class="tg-e191">   Quarta-feira    </th>
    <th class="tg-e191">   Quinta-feira   </th>
    <th class="tg-e191">   Sexta-feira   </th>
  </tr>
  <tr>
    <td class="tg-ji7c">Manha</td>
    <td class="tg-4t3w"><?php 	$pessord = nomes_agenda ($link, $area, 'segunda', 'manha');
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{	$nome_da_pessoa=$pessord[$i][0];
		$login_pessoa=$pessord[$i][1];
		
	}; ?>
    <td class="tg-4t3w"><?php 	$pessord = nomes_agenda ($link, $area, 'terca', 'manha');
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{	$nome_da_pessoa=$pessord[$i][0];
		$login_pessoa=$pessord[$i][1];
		
	}; ?></td>
    <td class="tg-4t3w"><?php 	$pessord = nomes_agenda ($link, $area, 'quarta', 'manha');
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{	$nome_da_pessoa=$pessord[$i][0];
		$login_pessoa=$pessord[$i][1];
		
	}; ?></td>
    <td class="tg-4t3w"><?php 	$pessord = nomes_agenda ($link, $area, 'quinta', 'manha');
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{	$nome_da_pessoa=$pessord[$i][0];
		$login_pessoa=$pessord[$i][1];
		
	}; ?></td>
    <td class="tg-4t3w"><?php 	$pessord = nomes_agenda ($link, $area, 'sexta', 'manha');
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{	$nome_da_pessoa=$pessord[$i][0];
		$login_pessoa=$pessord[$i][1];
		
	}; ?></td>
  </tr>
  <tr>
    <td class="tg-ji7c">Tarde</td>
    <td class="tg-4t3w"><?php 	$pessord = nomes_agenda ($link, $area, 'segunda', 'tarde');
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{	$nome_da_pessoa=$pessord[$i][0];
		$login_pessoa=$pessord[$i][1];
		
	}; ?></td>
    <td class="tg-4t3w"><?php 	$pessord = nomes_agenda ($link, $area, 'terca', 'tarde');
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{	$nome_da_pessoa=$pessord[$i][0];
		$login_pessoa=$pessord[$i][1];
		
	}; ?></td>
    <td class="tg-4t3w"><?php 	$pessord = nomes_agenda ($link, $area, 'quarta', 'tarde');
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{	$nome_da_pessoa=$pessord[$i][0];
		$login_pessoa=$pessord[$i][1];
		
	}; ?></td>
    <td class="tg-4t3w"><?php 	$pessord = nomes_agenda ($link, $area, 'quinta', 'tarde');
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{	$nome_da_pessoa=$pessord[$i][0];
		$login_pessoa=$pessord[$i][1];
		
	}; ?></td>
    <td class="tg-4t3w"><?php 	$pessord = nomes_agenda ($link, $area, 'sexta', 'tarde');
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{	$nome_da_pessoa=$pessord[$i][0];
		$login_pessoa=$pessord[$i][1];
		
	};
	?></td>
  </tr>
</table>
<p><br><br>
Clique no voluntario para exibir seu cadastro</p>
<br><br><input type="submit" value="Ver cadastro">
</form><br>
<input type="button" value ="Voltar" onclick="history.go(-2);return true;" />


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