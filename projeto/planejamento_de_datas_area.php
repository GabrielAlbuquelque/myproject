<?php 
require("funcao-faltas.php");


$now=time();
$i=0;
$j=0;

while(($datas_planejadas[$i]<=$now)||($datas_planejadas2[$i]<=$now))
{
      $planejadas[$j]=$datas_planejadas[$i];
	  $planejadas[$j+1]=$datas_planejadas2[$i];
	  
	  $faltou[$j]=$faltas[$i];
	  $faltou[$j+1]=$faltas2[$i];

	  
    $i++;
	$j=$j+2;	
	
	
}

//**********************************Utilizando as últimas datas do mês (as últimas 6 datas serão mostradas na tela****************
$td=count($planejadas);

if($ultimotime+86400>=$now)
{
$td1=$td-2;
$td2=$td-3;
$td3=$td-4;
$td4=$td-5;
$td5=$td-6;
$td6=$td-7;
}

else {
$td1=$td-1;
$td2=$td-2;
$td3=$td-3;
$td4=$td-4;
$td5=$td-5;
$td6=$td-6;
}


?>