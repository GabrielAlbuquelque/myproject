<!-- 
	120419 - versão 19 abril 2012
	Menu exemplo
	
 **************************************************************				-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

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
	<div class='esq-div'>  <!-- classe topo-div (CSS) define a área da esquerda para o menu -->
	<h3>menu</h3>
	<br>
	<br>
	<ul class='menu01'>  <!-- a classe menu01 é um estilo css -->
		<!-- é uma lista sem ordem (ul) e cada linha é um link para um arquivo diferente (li)-->
		<li><a 	onclick="window.location.href='index.html'"	target='blank'	>	Página Inicial	</a></li>
		<li><a 	onclick="window.location.href='novovoluntario.php'"	target='blank'	>	Quero ser voluntário	</a></li>
		<li><a 	onclick="window.location.href='Fale Conosco.html'"	target='blank'	>	Fale conosco	</a></li>
		<li><a 	onclick="window.location.href='Login.html'"	target='blank'	>	Login	</a></li>
		
	</ul>

	</div>  <!--  fecha esq  -->
	
	
<!-- segunda coluna com largura ******************************************************************* -->
<div class="dir-div">

<h2>
Cadastro:
<br><br>
</h2>
<ft>

<form action="Cadastro Enviado.php" method = "post">
Nome:<input type="text" size="55" maxlength="55" name="nome"><br />
<br>

Endereço:<input type="text" size="55" maxlength="55" name="endereco"><br />
<br>
Telefone Residencial: <input type="text" size="15" maxlength="15" name="telefone"><br />
<br>
Profissão: <input type="text" size="35" maxlength="35" name="profissao"><br />
<br>
Email: <input type="text" size="35" maxlength="35" name="email"><br />
<br>
Você gostaria de ter contato direto com os pacientes?:<br /><br>
<select name="direto">
		<option value=	"sim"		>	Sim		</option>	
		<option value=	"nao"			>	Não</option>
	</select>
<br /><br>
Cite os dias e horários de sua preferência para o trabalho voluntário:<br>(Favor citar pelo menos dois, por exemplo: sexta-manha, segunda-tarde)<br>
<textarea rows="3" cols="40" name="horario" wrap="physical"></textarea>:<br />

<br><br>
		<input type="reset" name="cancela" value="Apagar">
		<input type="submit">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</form>

</ft>
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