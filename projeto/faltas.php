<!-- 
	120419 - versão 19 abril 2012
	Menu exemplo
	
 **************************************************************				-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php
require("procura.php");
require("planejamento_de_datas.php"); 
require("procura2.php");

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


<?php
   	
$d_login=$_POST['login_pessoa'];


   $pessord = search ($link);
	$tamanho=count($pessord);
	for ($i=0; $i<$tamanho; $i++)
	{			
		$login_pessoa=$pessord[$i][0];
		$nome_da_pessoa=$pessord[$i][1];
		if($login_pessoa==$d_login) {echo"<br><h3> $nome_da_pessoa";}
	} 
	$now=time();
	
	
	
	
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
	
	echo "<br><br><input type=\"button\" value =\"Voltar\" onclick=\"history.go(-2);return true;\" />";
	


}
else{
	echo "<br><br><input type=\"button\" value =\"Voltar\" onclick=\"history.go(-2);return true;\" />";

}

echo "<br><br><input type=\"button\" value =\"Inicio\" onclick=\"history.go(-3);return true;\" />";

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

