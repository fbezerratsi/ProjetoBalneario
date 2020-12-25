<?php
    include_once 'classes/Funcionario.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author Felipe
 */
class Administrador extends Funcionario{
    
    function __construct($id, $nome, $login, $senha) {
        parent::__construct($id, $nome, $login, $senha);
    }

    public function abrirCaixa($caixa) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO caixa(dataabertura, horaabertura, idadministrador) VALUES('".$caixa->getDataabertura()."','". $caixa->getHoraabertura() ."', '". $caixa->getAdmin() ."')";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        return true;
        
        mysqli_close($link);
    }


    public function cadastrarGarcon($garcon) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO garcon(nome, login, senha) VALUES('".$garcon->getNome()."','". $garcon->getLogin() ."','". md5($garcon->getSenha()) ."')";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        return true;
        
        mysqli_close($link);
    }
    
    public function emitirRelatorio() {
        
    }
    
    public function cadastrarComida($comida) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO comida(nomecomida, preco) VALUES('".$garcon->getNome()."','". $garcon->getPreco() ."')";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        return true;
        
        mysqli_close($link);
    }
    
    public function cadastrarReceptor($receptor) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO receptor(nome, login, senha) VALUES('".$receptor->getNome()."','". $receptor->getLogin() ."','". md5($receptor->getSenha()) ."')";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        return true;
        
        mysqli_close($link);
    }
    
    
    public function logar($login, $senha) {
        
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "SELECT login, senha FROM administrador";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        while ($row = mysqli_fetch_array($resultado)) {
            
            if ($row["login"] == $login && $row["senha"] == md5($senha)) {
                return true;
            }
            
        }
        
        mysqli_close($link);
    }
    
}

?>
