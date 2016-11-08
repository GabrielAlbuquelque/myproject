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
<h3>


<?php
	require("08-configBD.php");
	//id pessoa na tabela 'nv'//
	$id_pessoa	=$_REQUEST['id_pessoa'];
	$dsemana1	=$_REQUEST['dsemana1'];
	$periodo1	=$_REQUEST['periodo1'];
	$dsemana2	=$_REQUEST['dsemana2'];
	$periodo2	=$_REQUEST['periodo2'];
	$area	=$_REQUEST['area'];
	$login	=$_REQUEST['login'];
	$senha	=$_REQUEST['senha'];
	$tipo_login='vd';
	
if(($dsemana1==$dsemana2)&&($periodo1==$periodo2)){
	echo "Insira dois horários distintos<br><br>";
	echo "<form action=\"menuincluir.php\" method=\"post\">";
	echo "<input type=\"submit\" value=\"voltar\">";
}

else{
		
$query = 'SELECT * FROM usuarios WHERE login = "' . $login . '"';
$resultado = mysqli_query($link, $query);

if ($resultado == FALSE) {
    echo "Tem algum erro no código SQL, reveja seu código!";
}
 
if ($resultado && mysqli_num_rows($resultado) == 1) {
	echo "Este login já existe!";
	echo "<br/><br/>";
	echo "<form action=\"menuincluir.php\" method=\"post\">";
	echo "<input type=\"submit\" value=\"voltar\">";
	echo "</form>";
}
	else
	
	{
	mysqli_close($link);
	require("08-configBD.php");
	$prepara="INSERT INTO usuarios (login, senha, area, tipo_login, dsemana1, periodo1, dsemana2,periodo2) 
		VALUES('$login','$senha','$area','$tipo_login', '$dsemana1', '$periodo1', '$dsemana2', '$periodo2')";
	$result = mysqli_query($link,$prepara);
	if (!$result)
	{	echo "Erro de gravação!<br>";
		return; 
	}
	else  {	echo ("<br>");}
						 
	mysqli_close($link);
	require("08-configBD.php");
	$prepara= "UPDATE usuarios 
			SET nome = (SELECT nome FROM nv WHERE ID='$id_pessoa'), telefone = (SELECT telefone FROM nv WHERE ID='$id_pessoa'), email = (SELECT email FROM nv WHERE ID='$id_pessoa'), endereco = (SELECT endereco FROM nv WHERE ID='$id_pessoa')
			WHERE login='$login'";  
	$result = mysqli_query($link,$prepara);
	
	if (!$result)
	{	echo "Erro de gravação!<br>";
	
		return; 
	}
	else  {	echo ("Gravado com sucesso!<br>");}
						 
	mysqli_close($link);
	
	require("08-configBD.php");
	$query="DELETE FROM nv WHERE ID='$id_pessoa'";
	mysqli_query($link,$query);
	mysqli_close($link); 
	
	
	echo "<br/><br/>";
	echo "<form action=\"inicio-rh.php\" method=\"post\">";
	echo "<input type=\"submit\" value=\"voltar ao início\">";
	echo "</form>";
	}
}
	?>
</h3>
	


<br><br>
		

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

