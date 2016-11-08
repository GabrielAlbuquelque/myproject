<?php
/*
 * Exemplo 1
 * Como verificar se o usuário está logado e autorizado a ver
 * a página
 *
 * incluir no começo de todas as páginas
 * que precisarem estar logado para acessar
 *
 * $_SESSION só funciona se utilizar session_start();
 */
 $nivel_da_pagina = 'vd';
 
session_start();
if (isset($_SESSION['usuario']) == FALSE) {
    //Redireciona para login se não estiver logado
    header("Location: Login.html");
    exit();
}
if ($_SESSION['nivel'] != $nivel_da_pagina) {
    //Redireciona para outra página que todos tem acesso ou de erro
    header("Location: index.html");
    exit();
}

switch ($_SESSION['nivel']) {
    case 'vd' :
        //Imprime o menu para o nivel 1
        break;
    case 'cd' :
        //Imprime o menu para o nivel 2
        break;
    case 'rh' :
		//Imprime o menu para o nivel 3
        break;
 
    default :
        //Não encontrou o nível de acesso
        break;
}
?>