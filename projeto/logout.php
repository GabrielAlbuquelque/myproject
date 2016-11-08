<?php
session_start();
if (isset($_SESSION['usuario']) == FALSE) {
    //Redireciona para login se não estiver logado
    header("Location: Login.html");
    exit();
}

unset($_SESSION['usuario']);
unset($_SESSION['nivel']);

header("Location: index.html")
?>
