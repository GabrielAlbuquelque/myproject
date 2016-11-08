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
		<li><a 	onclick="window.location.href='index.html'"	target='blank'	>	Página inicial	</a></li>
		<li><a 	onclick="window.location.href='novovoluntario.php'"	target='blank'	>	Quero ser voluntário	</a></li>
		<li><a 	onclick="window.location.href='Fale Conosco.html'"	target='blank'	>	Fale conosco	</a></li>
		<li><a 	onclick="window.location.href='Login.html'"	target='blank'	>	Login	</a></li>
		
	</ul>

	</div>  <!--  fecha esq  -->
	
	
<!-- segunda coluna com largura ******************************************************************* -->
<div class="dir-div">

	<h1>Envio de Cadastro</h1>
		<p>
		<?php
		require("08-configBD.php");
		$nome=$_POST['nome'];
		$endereco=$_POST['endereco'];
		$telefone=$_POST['telefone'];
		$profissao=$_POST['profissao'];
		$email=$_POST['email'];
		$horario=$_POST['horario'];
		$direto=$_POST['direto'];
		if ($nome==''or $endereco=='' or $telefone=='' or $profissao=='' or $direto==''or $email=='' or $horario==''){
			echo "Favor preencher todos os campos! <br><br><br><br><br><br>";
			echo "<input type=\"button\" value=\"Voltar\" onclick=\"window.location.href='cadastro.php'\" />";			
		}
		else if ($telefone==0){
			echo "Favor preencher com um telefone válido! <br><br><br><br><br><br>";
			echo "<input type=\"button\" value=\"Voltar\" onclick=\"window.location.href='cadastro.php'\" />";			
		}
		else{
			$prepara="INSERT INTO nv (nome, endereco, telefone, profissao, direto, email, horario) VALUES('$nome','$endereco','$telefone','$profissao','$direto','$email','$horario')";
			$result = mysqli_query($link,$prepara);
		
			if (!$result)
			{	echo "Erro de gravação!<br>";
				return; 
			}
			else  {	echo ("gravado com sucesso!<br>");}
							 
			mysqli_close($link);

			echo "<br/><br/>";
			echo "<form action=\"index.html\" method=\"post\">";
			echo "<input type=\"submit\" value=\"voltar à página inicial\">";
			echo "</form>";
		}
			
		?>
		</p>
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
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

