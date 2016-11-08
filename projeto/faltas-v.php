<!-- 
	120419 - versão 19 abril 2012
	Menu exemplo
	
 **************************************************************				-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php
require("procura.php");
require("procura2.php");
require("08-configBD.php");    //banco de dados 
require("funcao-leitura.php"); //funcao que lê uma coluna de uma tabela
session_start();
if (isset($_SESSION['usuario']) == FALSE) {
    //Redireciona para login se não estiver logado
    header("Location: Login.html");
    exit();
}
if ($_SESSION['nivel'] != 'vd') {
    //Redireciona para outra página que todos tem acesso ou de erro
    header("Location: index.html");
    exit();
}

$d_login=$_SESSION['usuario'];

    

?>
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


<?php
   	



   $pessord = search ($link);
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{			
		$login_pessoa=$pessord[$i][0];
		$nome_da_pessoa=$pessord[$i][1];
		if($login_pessoa==$d_login) {echo"<br><h3> $nome_da_pessoa";}
	} 
	$now=time();
	
		$login_teste=$d_login;
		
		$pessord = leitura ($link,$login_teste);
		$tamanho=count($pessord);    // le o tamanho de pessord, para delimitar o tamnho do for
		
		if(($pessord[0]==0)||($pessord[1]==0)) {$erro=1;}
		
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
<br><br><br>
</h3>
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
<?php
if($erro==1) echo" <BR>PRESENÇA NAO ENCONTRADA<BR>";
if ($_SESSION['nivel'] == 'rh') {
	echo "<form action=\"ficha-deslig.php\" method=\"post\">";
	echo "<input type=\"hidden\" name=\"d_login\" value=$d_login>";
	echo "<br><input type=\"submit\" value=\"Desligar Voluntario\">";
	echo "</form>";
	
	echo "<br><br><input type=\"button\" value =\"Voltar\" onclick=\"history.go(-1);return true;\" />";
	


}
else{
	echo "<br><br><input type=\"button\" value =\"Voltar\" onclick=\"history.go(-1);return true;\" />";

}



?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




</div> <!-- fecha dir aqui -->

<!-- Parte inferior: rodapé  ******************************************************************** -->
<div class='rodape-div'>   <!-- classe rodapé (CSS) está definida na folha de estilo -->
<p2>
<hr>
Grupo em Defesa da Crianca com Cancer - Grendacc | www.grendacc.org.br
</p2>
</div> <!-- div do rodapé -->
</div> <!-- DIV GLOBAL fecha aqui-->
</body>
</html>

