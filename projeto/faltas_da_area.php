<!-- 
	120419 - versão 19 abril 2012
	Menu exemplo
	
 **************************************************************				-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php

require("procura2.php");
require("08-configBD.php"); 
require("funcao-leitura.php");
session_start();



if (isset($_SESSION['usuario']) == FALSE) {
    //Redireciona para login se não estiver logado
    header("Location: Login.html");
    exit();
}
if ($_SESSION['nivel'] == 'vd') {
    //Redireciona para outra página que todos tem acesso ou de erro
    header("Location: index.html");
    exit();

}?>
<!-- Aqui é colocado o ícone proico.gif com o logo do PRO na aba da página
	está destacado aqui porque TODAS as páginas da aplicação possuem este ícone -->
<link rel="shortcut icon" href="estilo_arquivos/canguru.jpeg" type="image/x-icon" />

<!-- Aqui é definida a folha de estilo chamada query_estilo			-->			
<link type="text/css"   rel="stylesheet"  href="estilo_arquivos/exemplo_estilo.css"/>

<!-- Aqui é definido o conjunto de caracteres			-->			
<meta content="text/html; charset=UTF-8" http-equiv="content-type">

</head>
<body>
    <div class="global-div"> <!-- classe global-div (CSS) define o tamanho total da página-->

	<div class='topo-div'> <!-- classe topo-div (CSS) define a área do cabeçalho  -->
		<head>
		<!-- aqui define o texto que vai na aba da página (orelha)-->
		<title> Voluntariado GRENDACC </title>
		</head>
		<h1>
			<!-- define o topo da página-->
			<!-- primeirament o logo esquerdo logo_pro.gif-->
<a href="index.html"><img src="estilo_arquivos/gradient1.png" alt ='blank' align="left"	width="980" 	height="240"/>	</a>		
		</h1>
	</div>

<!-- primeira coluna: menu  ******************************************************************** -->
	<div class='largo-div'>  <!-- classe topo-div (CSS) define a área da esquerda para o menu -->



<h2><br><br>
Tabela de Faltas
<br><br>
</h2>
<p><p3>_______</p3>


<h3>
<?php
   	$b=$_POST['var1'];


   $pessord = search2 ($link,$b);
	$tamanho=count($pessord);
	for ($m=0; $m<$tamanho; $m++)
	{	
	    
$planejadas[0]=0;
$planejadas[1]=0;
$planejadas[2]=0;
$planejadas[3]=0;
$planejadas[4]=0;
$planejadas[5]=0;

$presenca[0]=0;
$presenca[1]=0;
$presenca[2]=0;
$presenca[3]=0;
$presenca[4]=0;
$presenca[5]=0;
	
	    $erro=1;		
		while(($erro==1)&&($m<$tamanho)){
		$login_pessoa=$pessord[$m][0];
		$nome_da_pessoa=$pessord[$m][1];
		$login_teste=$pessord[$m][0];
		$v=leitura($link,$login_teste);	
		
		if(($v[0]==0)||($v[1]==0)) {$erro=1; $m++;}
		else {$erro=0;}
		
		}
		
		
		
			//**************************** LEITURA DAS PRESENÇAS ************************************************************	
			
	if($erro==0){		
		echo"<h3><br> $nome_da_pessoa";
		$now=time();
		$n=date('d/m',$now);
		
		
		
		$tam=count($v);    // le o tamanho de pessord, para delimitar o tamnho do for
		
		for ($k=0; $k<$tam; $k++)
		{			
			$time=$v[$k];
		 
			$ano=$time[0].$time[1].$time[2].$time[3]; 
			$mes=$time[5].$time[6];                       // coloca os caracteres do vetor time, nos parametros dia, mes e ano
			$dia=$time[8].$time[9];

			$presenca[$k]=mktime(0,0,0,$mes,$dia,$ano);   // cria um numero de timestamp para a presença
           
		} 
		
		$k=count($presenca);
		$presenca[$k]=0;      //truncar a leitura do vetor no último dado  
		
		//**************************** DATAS PLANEJADAS ************************************************************
	
	  $agora=time();                                            //definicoes iniciais para fazermos as datas planejadas
	  $semana=604800;
	  $datas_planejadas[0]=$presenca[0];
	  $j=0;
	  
	  for($l=$presenca[0]; $l<$agora; $l=$l+$semana)
	  { 
		$datas_planejadas[($j+1)]=($datas_planejadas[$j]+$semana);	    // Aqui é definido o vetor datas planejadas
		$j++;	
		
	  }

	  //**************************** VETOR FALTAS ************************************************************ 
  
	$i=0;         //definir variaveis antes para nao ocorrer erro
	$falta;
	
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
	                                                                                           //COM O FORMATO Dia/Mês 
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
	$falta;
	
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
	                                                                                           //COM O FORMATO Dia/Mês 
	  $i++;
	}	
	
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




?>
</h3><p><br></p>
<!-- ******************************************************** -->

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#bbb;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#594F4F;background-color:#E0FFEB;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#493F3F;background-color:#9DE0AD;}
.tg .tg-4t3w{background-color:#f1fff6;text-align:center}
.tg .tg-2tk4{font-size:16px;background-color:#b9ffb8;color:#000000;text-align:center}
.tg .tg-vgk7{background-color:#f4f4f4}
.tg .tg-lufz{font-size:16px;background-color:#dee0ff;color:#000000}
</style>

<table class="tg">
  <tr>
    <th class="tg-vgk7"> Dia </th>   
   <th class="tg-e191">  <?php if(($planejadas[$td6]!=0)&&($tplanejadas[$td6]+86400<$now)) echo "$planejadas[$td6]<br>";  ?>  </th>
    <th class="tg-e191"> <?php if(($planejadas[$td5]!=0)&&($tplanejadas[$td5]+86400<$now)) echo "$planejadas[$td5]<br>"; ?>  </th>
    <th class="tg-e191"> <?php if(($planejadas[$td4]!=0)&&($tplanejadas[$td4]+86400<$now)) echo "$planejadas[$td4]<br>"; ?>  </th>
    <th class="tg-e191"> <?php if(($planejadas[$td3]!=0)&&($tplanejadas[$td3]+86400<$now)) echo "$planejadas[$td3]<br>"; ?>  </th>
    <th class="tg-e191"> <?php if(($planejadas[$td2]!=0)&&($tplanejadas[$td2]+86400<$now)) echo "$planejadas[$td2]<br>"; ?>  </th>
	<th class="tg-e191"> <?php if(($planejadas[$td1]!=0)&&($tplanejadas[$td1]+86400<$now)) echo "$planejadas[$td1]<br>"; ?>  </th>
  </tr>
  <tr>
    <td class="tg-ji7c">Status</td>
    <td class="tg-4t3w"><?php  if(($planejadas[$td6]!=0)&&($tplanejadas[$td6]+86400<$now)){
								if($faltou[$td6]==1) echo"PRESENTE "; 	   	                                                            
								 else                 echo"X  ";}
					                                                       ?></td>
    <td class="tg-4t3w"><?php   if(($planejadas[$td5]!=0)&&($tplanejadas[$td5]+86400<$now)){
								if($faltou[$td5]==1) echo"PRESENTE "; 	   	                                                            
								 else                 echo" X 	 "; }   
 								                                           ?></td>
    <td class="tg-4t3w"><?php    if(($planejadas[$td4]!=0)&&($tplanejadas[$td4]+86400<$now)){
								if($faltou[$td4]==1) echo" PRESENTE"; 	   	                                                            
								 else                 echo" X  ";}
 								                                           ?></td>
    <td class="tg-4t3w"><?php    if(($planejadas[$td3]!=0)&&($tplanejadas[$td3]+86400<$now)){
								if($faltou[$td3]==1) echo" PRESENTE "; 	   	                                                            
								 else                 echo" X  ";}
 								                                           ?></td>
    <td class="tg-4t3w"><?php   if(($planejadas[$td2]!=0)&&($tplanejadas[$td2]+86400<$now)){
								if($faltou[$td2]==1) echo" PRESENTE "; 	   	                                                            
								 else                 echo" X  ";}
 								                                           ?></td>
	 <td class="tg-4t3w"><?php   if(($planejadas[$td1]!=0)&&($tplanejadas[$td1]+86400<$now)){
	                             if($faltou[$td1]==1) echo" PRESENTE "; 	   	                                                            
								 else                 echo" X ";  }
 								                                           ?></td>
  </tr>
  
</table>


	<?php } }
	
	 
	 ?>
	


<!-- ******************************************************** -->
<br><br><input type="button" value ="Voltar" onclick="history.go(-1);return true;" />
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




</div> <!-- fecha dir aqui -->

<!-- Parte inferior: rodapé  ******************************************************************** -->
<div class='rodape-div'>   <!-- classe rodapé (CSS) está definida na folha de estilo -->
<p2>
<hr>
Grupo em Defesa da Criança com Câncer - Grendacc | www.grendacc.org.br
</p2>
</div> <!-- div do rodapé -->
</div> <!-- DIV GLOBAL fecha aqui-->
</body>
</html>
