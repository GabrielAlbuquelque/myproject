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

<div class="largo-div">

<h2>
Incluir Voluntário
<br><br>
</h2>

<ft>
<?php
	//id pessoa na tabela 'nv'//
	
	$id_pessoa	=$_REQUEST['id_pessoa'];
	
echo "<form action=\"incluirnovo-2.php\" method = \"post\">";
echo"<tr>
	<p3>_____________________________</p3>Área: ";
	echo"<select name=\"area\">";
		echo "<option value=\"brinquedoteca\"		>	Brinquedoteca		</option>
		<option value=\"apoioescolar\"			>	Apoio  Escolar</option>
		<option value=	\"apoioclinico\"		>	Apoio Clínico			</option>	
		<option value=	\"artesanato\"			>	Artesanato </option>		
		<option value=	\"estoque\"			>	Estoque			</option>
		<option value=	\"bazar\"			>	Bazar 		</option>
		<option value=	\"eventos\"			>	Eventos			</option>
		<option value=	\"espacoculinario\"	>	Espaço culinário	</option>	
	</select>
	</td>
</tr>	
</ft><br><br>
<tr>
	<td><p3>_____________________________</p3>Horários: </td>
	<td><br><p3>_____________________________</p3>1o dia: </td>
	<td>";
echo "<select name=\"dsemana1\">
	<option value=\"segunda\"		>	Segunda-feira	</option>
	<option value=\"terca\"		>	Terça-feira	</option>	
	<option value=\"quarta\"		>	Quarta-feira	</option>	
	<option value=\"quinta\"		>	Quinta-feira	</option>
	<option value=\"sexta\"		>	Sexta-feira	</option>
	</select>
	<select name=\"periodo1\">
	<option value=\"manha\"		>	Tarde	</option>
	<option value=\"tarde\"		>	Manhã	</option>	
	</select>
	</td>
	
	<td><br><p3>_____________________________</p3>2o dia: </td>
	<td>";
echo "<select name=\"dsemana2\">
	<option value=\"segunda\"		>	Segunda-feira	</option>
	<option value=\"terca\"		>	Terça-feira	</option>	
	<option value=\"quarta\"		>	Quarta-feira	</option>	
	<option value=\"quinta\"		>	Quinta-feira	</option>
	<option value=\"sexta\"		>	Sexta-feira	</option>
	</select>	
	<select name=\"periodo2\">
	<option value=\"manha\"		>	Tarde	</option>
	<option value=\"tarde\"		>	Manhã	</option>	
	</select>
	</td>
</tr><br><br>";

echo"<p3>_____________________________</p3>Login:<input type=\"text\" size=\"20\" maxlength=\"20\" name=\"login\"><br />
<br> <p3>_____________________________</p3>Senha: <input type=\"text\" size=\"15\" maxlength=\"15\" name=\"senha\"><br /><br>
<br><br>";

echo "<input type=\"hidden\" name=\"id_pessoa\" value=\"$id_pessoa\">
<input type=\"submit\" value=\"Incluir\">";
?>
</ft>
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



