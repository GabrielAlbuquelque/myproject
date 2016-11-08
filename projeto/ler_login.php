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
<br><br><h2>
<?php
require '08-configBD.php';
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$query = 'SELECT * FROM usuarios WHERE login = "' . $usuario . '"';
$resultado = mysqli_query($link, $query);

if ($resultado == FALSE) {
    echo "Tem algum erro no código SQL, reveja seu código!";
}
 
if ($resultado && mysqli_num_rows($resultado) == 1) {
    while ($row = mysqli_fetch_array($resultado)) {
        if ($senha == $row['senha']) {
            session_start();
			
			$_SESSION['usuario'] = $row['login'];
            $_SESSION['nivel'] = $row['tipo_login'];
			
			if ($row ['tipo_login'] == 'vd') {
				header('Location: inicio-volunt.php');}
			if ($row ['tipo_login'] == 'cd') {
				header('Location: inicio-coord.php');}
			if ($row ['tipo_login'] == 'rh') {
				header('Location: inicio-rh.php');}
        } else {
            echo "Senha incorreta";
			echo "<br><br><br><input type=\"button\" value =\"Voltar\" onclick=\"window.location.href='Login.html'\">";
        }
    }
} else {
    echo "Usuario nao encontrado";
	echo "<br><br><br><input type=\"button\" value =\"Voltar\" onclick=\"window.location.href='Login.html'\">";
}

mysqli_close($link); ?>
</h2>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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