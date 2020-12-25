<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gerenciar
 *
 * @author Felipe
 */
class Gerenciar {
    
    function getQuantFuncionario() {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "SELECT * FROM garcon";
        
        $resultado = mysqli_query($link, $sql);
        if (!$resultado) {
            return false;
        }
        print "<table>";
        while ($row = mysqli_fetch_array($resultado)) {
            
            $id = $row["idgarcon"];
            $nome = $row["nome"];
            print "<tr>";
            print "<td>$nome</td>";
            print "<td><input type=\"radio\" name=\"radFuncionario\" value=\"$id\" style=\"\" /></td>";
            //print " <br />";
            print "</tr>";
        }
        print "</table>";
        mysqli_close($link);
    } 
    
    public function buscarNomeGarcon($login) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

        if (mysqli_error($link)) {
            return false;
        }

        $sql = "SELECT * FROM garcon";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }

        while ($row = mysqli_fetch_array($resultado)) {

            if ($row["login"] === $login) {
                return $row["nome"];
            }

        }

        mysqli_close($link);
     }
     
     public function buscarNomeReceptor($login) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

        if (mysqli_error($link)) {
            return false;
        }

        $sql = "SELECT * FROM receptor";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }

        while ($row = mysqli_fetch_array($resultado)) {

            if ($row["login"] === $login) {
                return $row["nome"];
            }

        }

        mysqli_close($link);
     }
     
     public function setarPedidosConfirmados($id) {
         $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

        if (mysqli_error($link)) {
            return false;
        }

        $sql = "SELECT * FROM pedido WHERE idpedido = $id";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }

        while ($row = mysqli_fetch_array($resultado)) {

            $garcon = $row["idgarcon"];
            $comida = $row["idcomida"];
            $receptor = $row["idreceptor"];
            $data = $row["dataabertura"];
            $hora = $row["hora"];
            $cliente = $row["idcliente"];

        }
        
        if ($this->inserirPedidoConfirmado($garcon, $comida, $receptor, $data, $hora, $cliente)) {
            return true;
        }
        
        
        mysqli_close($link);
     }
     
     public function inserirPedidoConfirmado($garcon, $comida, $receptor, $data, $hora, $cliente) {
         $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO pedidoconfirmado(idgarcon,idcomida,idreceptor,dataabertura,hora,idcliente) VALUES($garcon, $comida, $receptor, '$data', '$hora', $cliente)";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        return true;
        
        mysqli_close($link);
     }
     
     public function setarConfirmacaoPedido($id) {
         $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }

        $sql = "UPDATE pedido SET confirmacao = 2 WHERE idpedido = $id";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }

        return true;

        mysqli_close($link);
     }
     
     public function buscarIdPeloNome($nome) {
         $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

        if (mysqli_error($link)) {
            return false;
        }

        $sql = "SELECT * FROM garcon";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }

        while ($row = mysqli_fetch_array($resultado)) {
            
            if ($row["nome"] === $nome) {
                return $row["idgarcon"];
            }

        }
        //return $id;
        mysqli_close($link);
     }
     
}

?>
