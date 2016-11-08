<!-- Aqui � colocado o �cone proico.gif com o logo do PRO na aba da p�gina
	est� destacado aqui porque TODAS as p�ginas da aplica��o possuem este �cone -->
<link rel="shortcut icon" href="estilo_arquivos/canguru.jpeg" type="image/x-icon" />

<!-- Aqui � definida a folha de estilo chamada query_estilo			-->			
<link type="text/css"   rel="stylesheet"  href="estilo_arquivos/exemplo_estilo.css"/>

<!-- Aqui � definido o conjunto de caracteres			-->			
<meta content="text/html; charset=UTF-8" http-equiv="content-type">

</head>
<body>
    <div class="global-div"> <!-- classe global-div (CSS) define o tamanho total da p�gina-->

	<div class='topo-div'> <!-- classe topo-div (CSS) define a �rea do cabe�alho  -->
		<head>
		<!-- aqui define o texto que vai na aba da p�gina (orelha)-->
		<title> Voluntariado GRENDACC </title>
		</head>
		<h1>
			<!-- define o topo da p�gina-->
			<!-- primeirament o logo esquerdo logo_pro.gif-->
<a href="index.html"><img src="estilo_arquivos/gradient1.png" alt ='blank' align="left"	width="980" 	height="240"/>	</a>		
		</h1>
	</div>

<!-- primeira coluna: menu  ******************************************************************** -->
	<div class='largo-div'>  <!-- classe topo-div (CSS) define a �rea da esquerda para o menu -->
<h3>	
<?php
/* 20120420 - 20 abril 2012
	componente para fazer upload de arquivos 
***********************************************************
	Adaptado do seguinte endere�o:
	 http://blog.thiagobelem.net/upload-de-arquivos-com-php/
***************************************************************  */

session_start();
if (isset($_SESSION['usuario']) == FALSE) {
    //Redireciona para login se n�o estiver logado
    header("Location: Login.html");
    exit();
}
if ($_SESSION['nivel'] != 'vd') {
    //Redireciona para outra p�gina que todos tem acesso ou de erro
    header("Location: index.html");
    exit();
	
	
}
$login=$_SESSION['usuario'];

// Pasta onde o arquivo vai ser salvo - elea deve existir no servidor
$_UP['pasta'] = 'arquivos/';

// Tamanho m�ximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

// Array com as extens�es permitidas
$_UP['extensoes'] = array('pdf', 'doc', 'docx', 'xls','jpg');

// Renomeia o arquivo? (Se true, o arquivo ser� salvo como .jpg e um nome �nico)
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'N�o houve erro';
$_UP['erros'][1] = 'O arquivo no upload � maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'N�o foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("N�o foi poss�vel fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execu��o do script
}

// Caso script chegue a esse ponto, n�o houve erro com o upload e o PHP pode continuar

// Faz a verifica��o da extens�o do arquivo
$auxiliar = explode('.', $_FILES['arquivo']['name']);
$extensao = strtolower(end($auxiliar));
if (array_search($extensao, $_UP['extensoes']) === false) {
echo "Por favor, envie arquivos com as seguintes extens�es: jpg, png ou gif";
}

// Faz a verifica��o do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado � muito grande, envie arquivos de at� 2Mb.";
}

// O arquivo passou em todas as verifica��es, hora de tentar mov�-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extens�o .jpg
$nome_final = time().'.jpg';
} else {
// Mant�m o nome original do arquivo
$nome_final = $login.'.jpg';
}
echo "<br><br><br> Nome do arquivo = ".$nome_final."<br>";

###############################

// Depois verifica se � poss�vel mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "<br><br>Upload efetuado com sucesso!<br>";
echo '<br /><a target="_blank"   href= "' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
} else {
// N�o foi poss�vel fazer o upload, provavelmente a pasta est� incorreta
echo "N�o foi poss�vel enviar o arquivo, tente novamente";

}
echo "</p>";
}
echo"<br> <br> <br> <br>";
echo "<input type=\"button\" value =\"Voltar\" onclick=\"window.location.href='inicio-volunt.php'\">";
?>
</h3>
</div> <!-- fecha dir aqui -->

<!-- Parte inferior: rodap�  ******************************************************************** -->
<div class='rodape-div'>   <!-- classe rodap� (CSS) est� definida na folha de estilo -->
<p2>
<hr>
Grupo em Defesa da Crian�a com C�ncer - Grendacc | www.grendacc.org.br
</p2>
</div> <!-- div do rodap� -->
</div> <!-- DIV GLOBAL fecha aqui-->
</body>
</html>
