<!-- 
	função que acessa o banco de dados e retira os valores
	para serem colocados no menu

 **************************************************************				-->
<?php
function search2 ($db,$teste)
{
$pessoal="	SELECT   *
			FROM	usuarios
			WHERE area='$teste'
			";	
$query=mysqli_query($db,$pessoal);
$i=0;
if ($query && mysqli_num_rows($query) > 0) {
	while($row = mysqli_fetch_array($query))
	{
		$pess[$i][0]=$row['login'];
		$pess[$i][1]=$row['nome'];
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


?>