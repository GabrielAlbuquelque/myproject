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

<div class="largo-div">

<h2>
Cadastro:
<br><br>
</h2>
<ft>
	<p>
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
}

	require("08-configBD.php");
	
	$login	= $_SESSION['usuario'];

	$result=mysqli_query($link,"SELECT * FROM usuarios WHERE login='$login'");
	while($row = mysqli_fetch_array($result))
	{
		echo "<b>Valores atuais dos registros:</b><br/><br/>";
		echo "<b>Nome: </b>".$row['nome']."<br/>";
		echo "<b>Endereço: </b>".$row['endereco']."<br/>";
		echo "<b>Telefone: </b>".$row['telefone']."<br/>";
		echo "<b>E-mail: </b>".$row['email']."<br/>";
		echo "<b>Login: </b>".$row['login']."<br/>";
		echo "<b>Senha: </b>".$row['senha']."<br/>";
		echo "<br/>";
	}
			
	mysqli_close($link);
	echo "<form action=\"altcadastro-2.php\" method=\"post\">";
	?>
<table width='80%'  border='0' align='center'>
	<tr><td><i>Selecione o dado que deseja alterar:</i></td><td></td></tr>
	<tr></tr>
	<tr><td><i><select name="alterar">
	<option value="nome">Nome</option>
	<option value="endereco">Endereço</option>
	<option value="telefone">Telefone</option>
	<option value="email">E-mail</option></select>
	</i></td>
	<td></td></tr>
	<tr><td>Novo dado:</td></tr>
	<tr><td><input type="text" name="valor"></td></tr>
	<tr><td></td></tr>
	<tr><td><?php echo "<input type=\"button\" value =\"Voltar\" onclick=\"window.location.href='inicio-volunt.php'\">";
	echo "<input type=\"hidden\" name=\"login\" value=$login>";
	echo "<input type=\"submit\">";
	?></td></tr></table>
	</form>
	</p>

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