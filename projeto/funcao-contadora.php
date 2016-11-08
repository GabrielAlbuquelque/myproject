<!-- 
	função que acessa o banco de dados e retira os valores
	para serem colocados no menu

 **************************************************************				-->
<?php
function faltadores ($db,$area)
{

require("funcao-leitura.php"); //funcao que lê uma coluna de uma tabela
require("contagem_de_faltas.php");
require("conta-faltas.php");


$pessoal="	SELECT   *
			FROM	usuarios
			WHERE area='$area'
			
			";	
$query=mysqli_query($db,$pessoal);
$i=0;

if ($query && mysqli_num_rows($query) > 0) {
	while($row = mysqli_fetch_array($query))
		{$pess[$i][0]=$row['nome'];
		$pess[$i][1]=$row['login'];
		$login_pessoa=$pess[$i][1];
		
     $contador=resposta_faltas($login_pessoa);
		
		if($contador>1){
		echo "<input type=\"radio\" value=\"$login_pessoa\" name=\"login_pessoa\">   ".$row['nome'];
		echo " ($contador)<br />";  }
		$i++;}
}
else{
	$pess[$i][0]='-nenhum-';
	$pess[$i][1]='-nenhum-';
	echo '-nenhum-';
	echo "<br />";  
}
return $pess;






		
		
        
		
	






}

/*
retorna lista dos nomes na tabela usuarios
*/
?>