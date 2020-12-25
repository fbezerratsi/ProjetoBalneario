<?php

    if ( ! isset($_COOKIE["nome"])) {
        
        //Redireciona para a página de LOGIN:
        header("Location:index.php");
        exit();
    }

?>
