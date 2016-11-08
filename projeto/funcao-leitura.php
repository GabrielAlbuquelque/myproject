<!-- 
	função que acessa o banco de dados e retira os valores
	para serem colocados no menu

 **************************************************************				-->
<?php
function leitura ($db,$teste)
{
$pessoal="	SELECT   *
			FROM	presenca 
			WHERE login='$teste'";	
$query=mysqli_query($db,$pessoal);
$i=0;
$pess[0]=0;
$pess[1]=0;
while($row = mysqli_fetch_array($query))
  {
  $pess[$i]=$row['timestamp']; 
  $i++;
  }

return $pess;
}
?>