<?php
    session_start();
    if($_SESSION['logado'] == true){
        session_unset();//limpa a sessão
        session_destroy();//destroi a sessão
        header('Location: ../index.php');//redireciona para a index
    }else{
        header('Location: ../index.php');
    }

