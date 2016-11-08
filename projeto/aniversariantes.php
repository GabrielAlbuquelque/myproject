<?php 

require("procura4.php");
require("08-configBD.php");

$agora=time(); $semana=345600;
$resposta=search4($link);
$tamanho=count($resposta);

for($i=0; $i<$tamanho; $i++)
{
    $login[$i]=$resposta[$i][0];
	$nome[$i]=$resposta[$i][1];
	$aniversario[$i]=$resposta[$i][2];
	
}

echo"<ft><br><br>";
echo "<table width='70%'  border='0' align='right' >";
   echo"<tr>";
	echo"<td><p3>____________</p3><i><br>";
	echo"</td>";
	echo"<td><p3></p3><i>Aniversariantes da semana:<br><br><br>";
	echo"</td>";
	echo"</tr>";

for($i=0; $i<$tamanho; $i++)
{
 $d=strtotime($aniversario[$i]);

 $dia[$i]=date("d",$d);
 $mes[$i]=date("m",$d);
 
 $time[$i]=mktime(0,0,0,$mes[$i],$dia[$i],'2014');
 
if(($time[$i]+$semana>=$agora)&&($time[$i]-$semana<=$agora))
{
    echo"<tr>";
	echo"<td><p3>____________________________</p3><i><br>";
	echo"</td>";
	$foto='arquivos/'.$login[$i].'.jpg';
    echo"<td>";
	echo'<img src="'.$foto.'" width="27" height="36"/>';
	echo" <h4> $dia[$i]/$mes[$i] - $nome[$i] </h4>";
   echo"</td></tr>";
}

}


echo"</table>";






?>