<?php

    if ( ! isset($_COOKIE["nomeReceptor"])) {
        
        //Redireciona para a página de LOGIN:
        header("Location:index.php");
        exit();
    }

?>
