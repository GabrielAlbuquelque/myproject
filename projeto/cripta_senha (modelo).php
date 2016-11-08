<?php
/*
 * Exemplo 3
 * Sistema de Login
 */
 
/*
 crypt() é uma função para codificar senhas
 de forma irreversível.
 
 $senha_123 = crypt("123");
 
 Exemplo de Hash com senha "123"
 
 $1$J4/.e8/.$TdRQPGn7ZWixZ1y68N14Y0
 $1$Pu4.s6..$PUbp5HnWZ/CJjn3KOC2Oi.
 $1$F61.qx0.$t9LsDApJ/mdCx5PNE.52l.
 $1$rZ3.Yb..$mnFH19fvmE3vRdcR4PS5A1
 
 Obs: não esqueça de deixar tamanho suficiente
 no campo senha da tabela, se não suas senhas
 ficarão corrompidas. 256 caracteres é o ideal.
 
 */
require 'configura_basededados.php';
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
 
//Note que strings devem estar entre aspas dentro da query
$query = 'SELECT * FROM usuarios WHERE login = "' . $usuario . '"';
$resultado = mysqli_query($conexao, $query);
 
//útil para debug
if ($resultado == FALSE) {
    echo "Tem algum erro no código SQL, reveja seu código!";
}
 
if ($resultado && mysqli_num_rows($resultado) == 1) {
    while ($row = mysqli_fetch_array($resultado)) {
        if (crypt($senha, $row['senha']) == $row['senha']) {
            session_start();
            $_SESSION['usuario'] = $row['id'];
            $_SESSION['nivel'] = $row['nivel'];
 
        } else {
            echo "Senha incorreta";
        }
    }
} else {
    echo "Usuário não encontrado"
}
 
mysqli_close($conexao);
//Importante lembrar de fechar a conexao
?>