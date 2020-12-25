<?php
    include_once 'classes/Funcionario.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Receptor
 *
 * @author Felipe
 */
class Receptor extends Funcionario{
    
    function __construct($id, $nome, $login, $senha) {
        parent::__construct($id, $nome, $login, $senha);
    }
    
    public function confirmarPedido() {
        
    }
    
    
    public function logar($login, $senha) {
        
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "SELECT login, senha FROM receptor";
        
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
