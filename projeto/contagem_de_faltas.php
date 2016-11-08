<?php		
function resposta_faltas($log)
{
  
    //**************************** REQUIRES ************************************************************		
		
		require("08-configBD.php");    //banco de dados 
		
  
		
	//**************************** LEITURA DAS PRESENÇAS ************************************************************	
		$login_teste=$log;
		
		$now=time();
		$pessord = leitura ($link,$login_teste);	
		$tamanho=count($pessord);    // le o tamanho de pessord, para delimitar o tamnho do for
		
		
if(($pessord[0]==0)||($pessord[1]==0)) {$erro=1;

return 0;


}
		
		else{ $erro=0;
		
		for ($i=0; $i<$tamanho; $i++)
		{			
			$time=$pessord[$i];
		 
			$ano=$time[0].$time[1].$time[2].$time[3]; 
			$mes=$time[5].$time[6];                       // coloca os caracteres do vetor time, nos parametros dia, mes e ano
			$dia=$time[8].$time[9];

			$presenca[$i]=mktime(0,0,0,$mes,$dia,$ano);   // cria um numero de timestamp para a presença
           
		} 
		
		$k=count($presenca);
		
		
		$presenca[$k]=0;      //truncar a leitura do vetor no último dado  
	    
		
	
	//**************************** DATAS PLANEJADAS ************************************************************
	
	  $agora=time();                                            //definicoes iniciais para fazermos as datas planejadas
	  $semana=604800;
	  $datas_planejadas[0]=$presenca[0];
	  $j=0;
	  
	  for($i=$presenca[0]; $i<$agora; $i=$i+$semana)
	  { 
	    $datas_planejadas[($j+1)]=($datas_planejadas[$j]+$semana);	    // Aqui é definido o vetor datas planejadas
		$j++;	
	  }
	  
	  
	  
	 	//**************************** VETOR FALTAS ************************************************************ 
  
	$i=0;         //definir variaveis antes para nao ocorrer erro

	while($i<count($datas_planejadas)-1)    //AQUI SERÁ DEFINIDO O VETOR FALTAS
	{
		$j=0;
		while(($presenca[$j]<=$datas_planejadas[$i]+43200)&&($presenca[$j]!=0))
		{
			if(($datas_planejadas[$i]-43200<=$presenca[$j])&&($presenca[$j]<=$datas_planejadas[$i]+43200))  //vetor faltas com 1 se a pessoa esteve presente
			{$faltas[$i]=1;}                             
			
			else {$faltas[$i]=0;}                     //vetor faltas com 0 se a pessoa esteve ausente
			$j++;		
		}
	                                                                                            
	  $i++;
	}	
	
		//**************************** DATAS PLANEJADAS ************************************************************
	
	  $agora=time();                                            //definicoes iniciais para fazermos as datas planejadas
	  $semana=604800;
	  $datas_planejadas2[0]=$presenca[1];
	  $j=0;
	  
	  for($i=$presenca[0]; $i<$agora; $i=$i+$semana)
	  {
	    $datas_planejadas2[($j+1)]=($datas_planejadas2[$j]+$semana);	    // Aqui é definido o vetor datas planejadas
		$j++;	
	  }
	  
	  
	  
	 	//**************************** VETOR FALTAS ************************************************************ 
  
	$i=0;         //definir variaveis antes para nao ocorrer erro

	
	while($i<count($datas_planejadas2)-1)    //AQUI SERÁ DEFINIDO O VETOR FALTAS
	{
		$j=0;
		while(($presenca[$j]<=$datas_planejadas2[$i]+43200)&&($presenca[$j]!=0))
		{
			if(($datas_planejadas2[$i]-43200<=$presenca[$j])&&($presenca[$j]<=$datas_planejadas2[$i]+43200))  //vetor faltas com 1 se a pessoa esteve presente
			{$faltas2[$i]=1;}                             
			
			else {$faltas2[$i]=0;}                     //vetor faltas com 0 se a pessoa esteve ausente
			$j++;		
		}
	
	 
		
		 $ultimotime= $datas_planejadas2[$i];	                                                                                         
	  $i++;
	}	
	}
	
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

$cont=contar($faltou);

if($ultimotime+86400>=$now) {$cont--;}

return $cont;
}
	
?>

