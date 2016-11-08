<!-- 
	função que acessa o banco de dados e retira os valores
	para serem colocados no menu

 **************************************************************				-->
<?php
function nomes_nv ($db)
{
$pessoal="	SELECT   *
			FROM	nv";	
$query=mysqli_query($db,$pessoal);
$i=0;
if ($query && mysqli_num_rows($query) > 0) {
	while($row = mysqli_fetch_array($query))
		{$pess[$i][0]=$row['ID'];
		$pess[$i][1]=$row['nome'];
		echo $row['ID']. " " . $row['nome'];
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
retorna lista dos nomes na tabela nv
*/
?>