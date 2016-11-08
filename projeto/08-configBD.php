<!--
	140414 - 14 maio 2014
	Revisão para mysqli
*********************************************
PRO2511 - 10 maio 2011
Exercício de aula
Aplicação de banco e dados

Parametrização (*)
Arquivos desta rotina:
*	08-configBD
	08-acessoBD_aula.htm (abertura)
	08-db1.php (localização dos dados)
	08-listar-php (lista os dados)
	08-entrar.php (entrada de dados)
	08-alterar.php (alteração de dados-localiza registro)
	08-alterar2.php (alteração de dados-alteração)
	08-apagar.php (apaga registro)
	
A parametrização é importante para colocar em um único lugar os dados 
"oficiais" como banco de dados, senha, localização de arquivos, etc 
*******************************************-->



			<?php
			$servidor="localhost";
			$username="root";
			$password="";
			$database="pro3151";

			$link=mysqli_connect($servidor,$username,$password,$database);

			if (mysqli_connect_errno())
			{	echo "Erro de conexão!";	exit;}


			?>