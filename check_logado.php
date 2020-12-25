<?php

    session_start();
    //Testa se o usuário não está logado:
    if ( ! isset($_SESSION["login"])) {
        
        //Redireciona para a página de LOGIN:
        header("Location:index.php");
        exit();
    }

?>
