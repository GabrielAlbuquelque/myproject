<?php 

require("procura3.php");
require("08-configBD.php");


$area='apoioclinico';
$resposta=search3($link,$area);
$tamanho=count($resposta);

for($i=0; $i<$tamanho; $i++)
{
    $nome[$i]=$resposta[$i][0];
	$telefone[$i]=$resposta[$i][1];
	$email[$i]=$resposta[$i][2];

	echo" $nome[$i] $telefone[$i] $email[$i] <br>";
	
}






?>