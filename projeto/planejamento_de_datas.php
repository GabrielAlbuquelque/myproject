<?php 
require("funcao-faltas.php");

if($erro==0){ 
$planejadas[0]=0;
$planejadas[1]=0;
$planejadas[2]=0;
$planejadas[3]=0;
$planejadas[4]=0;
$planejadas[5]=0;

$now=time();
$n=date('d/m',$now);
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

$td1=$td-1;
$td2=$td-2;
$td3=$td-3;
$td4=$td-4;
$td5=$td-5;
$td6=$td-6;


for($i=0; $i<$td; $i++)
{  if($planejadas[$i]!=0){
    $tplanejadas[$i]=$planejadas[$i];
	$planejadas[$i]=date('d/m',$planejadas[$i]);
    
}
   else{$tplanejadas[$i]=0;}

} 



}
else{

$planejadas[0]=0;
$planejadas[1]=0;
$planejadas[2]=0;
$planejadas[3]=0;
$planejadas[4]=0;
$planejadas[5]=0;
$faltou[0]=0;
$faltou[1]=0;
$faltou[2]=0;
$faltou[3]=0;
$faltou[4]=0;
$faltou[5]=0;
$td1=5;
$td2=4;
$td3=3;
$td4=2;
$td5=1;
$td6=0;
$td=7;
$ultimotime=0;
}


?>