<?php
    include_once 'classes/Funcionario.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Garcon
 *
 * @author Felipe
 */
class Garcon extends Funcionario{
    
    function __construct($id, $nome, $login, $senha) {
        parent::__construct($id, $nome, $login, $senha);
    }

    public function enviarPedido($pedido) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO pedido(idgarcon,idcomida,idreceptor,dataabertura,confirmacao,hora,idcliente) VALUES(". $pedido->getGarcon() .",". $pedido->getComida() .", ". $pedido->getReceptor() .", '". $pedido->getDataAbertura() ."', ". $pedido->getConfirmacao() .", '". $pedido->getHora() ."', ". $pedido->getCliente() .")";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        return true;
        
        mysqli_close($link);
    }
    
    public function ConfirmarPedido($pedido) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO pedidoconfirmado(idgarcon,idcomida,idreceptor,dataabertura,hora) VALUES(". $pedido->getGarcon() .",". $pedido->getComida() .", ". $pedido->getReceptor() .", '". $pedido->getDataAbertura() ."', '". $pedido->getHora() ."')";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        return true;
        
        mysqli_close($link);
    }
    
    
    public function logarGarcon($login, $senha) {
        
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "SELECT login, senha FROM garcon";
        
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
