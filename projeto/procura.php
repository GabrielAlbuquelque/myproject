<!-- 
	função que acessa o banco de dados e retira os valores
	para serem colocados no menu

 **************************************************************				-->
<?php
function search ($db)
{
$pessoal="	SELECT   *
			FROM	usuarios
			";	
$query=mysqli_query($db,$pessoal);
$i=0;
while($row = mysqli_fetch_array($query))
  {
  $pess[$i][0]=$row['login'];
  $pess[$i][1]=$row['nome'];

  $i++;
  }
return $pess;
}

/*
retorna lista dos nomes na tabela usuarios
*/
?>