<!--
	140414 - 14 maio 2014
	Revis�o para mysqli
*********************************************
PRO2511 - 10 maio 2011
Exerc�cio de aula
Aplica��o de banco e dados

Parametriza��o (*)
Arquivos desta rotina:
*	08-configBD
	08-acessoBD_aula.htm (abertura)
	08-db1.php (localiza��o dos dados)
	08-listar-php (lista os dados)
	08-entrar.php (entrada de dados)
	08-alterar.php (altera��o de dados-localiza registro)
	08-alterar2.php (altera��o de dados-altera��o)
	08-apagar.php (apaga registro)
	
A parametriza��o � importante para colocar em um �nico lugar os dados 
"oficiais" como banco de dados, senha, localiza��o de arquivos, etc 
*******************************************-->



			<?php
			$servidor="localhost";
			$username="root";
			$password="";
			$database="pro3151";

			$link=mysqli_connect($servidor,$username,$password,$database);

			if (mysqli_connect_errno())
			{	echo "Erro de conex�o!";	exit;}


			?>