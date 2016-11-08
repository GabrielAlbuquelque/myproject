<!-- 
	função que acessa o banco de dados e retira os valores
	para serem colocados no menu

 **************************************************************				-->
<?php
function search3 ($db,$area)
{
$pessoal="	SELECT   *
			FROM	usuarios
			WHERE area='$area'
			";	
$query=mysqli_query($db,$pessoal);
$i=0;
while($row = mysqli_fetch_array($query))
  {
  $pess[$i][0]=$row['nome'];
  $pess[$i][1]=$row['telefone'];
  $pess[$i][2]=$row['email'];

  $i++;
  }
return $pess;
}

/*
retorna lista dos nomes na tabela usuarios
*/
?>