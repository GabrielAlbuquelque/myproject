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
if ($_SESSION['nivel'] == 'vd') {
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

<!-- primeira coluna: menu  ******************************************************************** -->
	<div class='largo-div'>  <!-- classe topo-div (CSS) define a área da esquerda para o menu -->
	

	<br>
	<br><br>
	<h2>
	<br>Acesso ao registro de Faltas <br><br>
	</h2>


<?php 
echo"<ft><br><br>";
echo "<table width='70%'  border='0' align='center' >
    <tr>
        <th align=\"center\" ><p><b>Faltas individuais</p></b><br></th>
        <th align=\"center\" ><p><b>Faltas da área</p></b><br></th>
    </tr>
	<tr>";
	echo"<td><p3>____________</p3><i>Selecione a area<br>";
	echo "<form action='menufaltas2.php' method='post'>";
	echo "<p3>____________</p3><select name='var1'>";
		echo"<option value= brinquedoteca>	Brinquedoteca		</option>	";
		echo"<option value= apoioescolar>	Apoio  Escolar</option>";
		echo"<option value= apoioclinico>	Apoio Clínico			</option>	";
		echo"<option value= artesanato>	Artesanato </option>		";
		echo"<option value=	estoque>	Estoque			</option>";
		echo"<option value=	bazar>	Bazar 		</option>";
		echo"<option value= eventos>	Eventos			</option>";
		echo"<option value= espacoculinario	>	Espaço culinário	</option>";	
	echo"</select>";
	echo "<input type='submit' value='Continua' >";
	echo "</form>";
	echo"</td>";
	echo"<td><p3>____________</p3><i>Selecione a area<br>";
	echo "<form action='faltas_da_area.php' method='post'>";
	echo "<p3>____________</p3><select name='var1'>";
		echo"<option value= brinquedoteca>	Brinquedoteca		</option>	";
		echo"<option value= apoioescolar>	Apoio  Escolar</option>";
		echo"<option value= apoioclinico>	Apoio Clínico			</option>	";
		echo"<option value= artesanato>	Artesanato </option>		";
		echo"<option value=	estoque>	Estoque			</option>";
		echo"<option value=	bazar>	Bazar 		</option>";
		echo"<option value= eventos>	Eventos			</option>";
		echo"<option value= espacoculinario	>	Espaço culinário	</option>";	
	echo"</select>";
	echo "<input type='submit' value='Continua' >";
	echo "</form>";
	echo"</td>";
echo"</tr>
</table>";
	
echo "<br><br><input type=\"button\" value =\"Voltar\" onclick=\"history.go(-1);return true;\" />";	
echo"</ft><br><br><br>";
?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</div>  <!--  fecha div  -->
	
	


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
