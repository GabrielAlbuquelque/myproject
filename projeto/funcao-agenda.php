<!-- 
	função que acessa o banco de dados e retira os valores
	para serem colocados no menu

 **************************************************************				-->
<?php
function nomes_agenda ($db, $area, $dsemana, $periodo)
{
$pessoal="	SELECT   *
			FROM	usuarios
			WHERE tipo_login LIKE 'vd' AND area LIKE '$area' AND ((dsemana1='$dsemana' AND periodo1='$periodo') OR (dsemana2='$dsemana' AND periodo2='$periodo'))
			";	
$query=mysqli_query($db,$pessoal);
$i=0;

if ($query && mysqli_num_rows($query) > 0) {
	while($row = mysqli_fetch_array($query))
		{$pess[$i][0]=$row['nome'];
		$pess[$i][1]=$row['login'];
		$login_pessoa=$pess[$i][1];
		echo "<input type=\"radio\" value=\"$login_pessoa\" name=\"login_pessoa\" checked=\"checked\">  ".$row['nome'];
		echo "<br />";  
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