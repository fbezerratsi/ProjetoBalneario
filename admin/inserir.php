<?php

    function inserirAdmin($nome, $login, $senha) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO administrador(nome, login, senha) VALUES('$nome','$login','". md5($senha) ."')";
        
        $result = mysqli_query($link, $sql);
        
        if (!$result) {
            return false;
        }
        return true;
        
        mysqli_close($link);
        
    }
    function inserirGarcon($nome, $login, $senha) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO garcon(nome, login, senha) VALUES('$nome','$login','". md5($senha) ."')";
        
        $result = mysqli_query($link, $sql);
        
        if (!$result) {
            return false;
        }
        return true;
        
        mysqli_close($link);
    }
    function inserirReceptor($nome, $login, $senha) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO receptor(nome, login, senha) VALUES('$nome','$login','". md5($senha) ."')";
        
        $result = mysqli_query($link, $sql);
        
        if (!$result) {
            return false;
        }
        return true;
        
        mysqli_close($link);
    }
    
    function inserirComida($nomecomida, $preco) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO comida(nomecomida, preco) VALUES('$nomecomida',$preco)";
        
        $result = mysqli_query($link, $sql);
        
        if (!$result) {
            return false;
        }
        return true;
        
        mysqli_close($link);
    }
    
    

?>
