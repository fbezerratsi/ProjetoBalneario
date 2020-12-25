<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Funcionario
 *
 * @author Felipe
 */
abstract class Funcionario {
    private $id;
    private $nome;
    private $login;
    private $senha;
    
    function __construct($id, $nome, $login, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
    }

    public function enviarMensagem($chat) {
        
    }
    
    public function verificarAberturaCaixa($data) {
        //$dat = date("Y/m/d", time());
        
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "SELECT * FROM caixa";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        while ($row = mysqli_fetch_array($resultado)) {
            
            if ($row["dataabertura"] === $data) {
                return true;
            }
            
        }
        
        mysqli_close($link);
    }

        

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
    
    
}

?>
