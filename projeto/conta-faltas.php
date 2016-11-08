<?php
function contar ($parametro)
{

$a=0;
$b=count($parametro);
$dias=9;
$agora=time();
while(($b>0)&&($dias>0))
{
   $b--; 
   if($parametro[$b]==0) {$a++;}  //**se a pessoa faltou ele aumenta o contador
   $dias--;
}

return $a;

}











?>