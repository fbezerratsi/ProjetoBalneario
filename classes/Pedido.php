<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedido
 *
 * @author Felipe
 */
class Pedido {
    
    private $idpedido;
    private $garcon;
    private $comida;
    private $receptor;
    private $dataAbertura;
    private $confirmacao;
    private $hora;
    private $cliente;

    function __construct($idpedido, $garcon, $comida, $receptor, $dataAbertura, $confirmacao, $hora, $cliente) {
        $this->idpedido = $idpedido;
        $this->garcon = $garcon;
        $this->comida = $comida;
        $this->receptor = $receptor;
        $this->dataAbertura = $dataAbertura;
        $this->confirmacao = $confirmacao;
        $this->hora = $hora;
        $this->cliente = $cliente;
    }

    public function pedidos($id) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

        if (mysqli_error($link)) {
            return false;
        }

        $sql = "select p.idpedido as id, g.nome as garcon, c.nomecomida, cli.idcliente as client FROM cliente as cli, pedido as p, garcon as g, comida as c WHERE cli.idcliente = p.idcliente and p.idgarcon = $id and p.idgarcon = g.idgarcon and p.idcomida = c.idcomida and p.confirmacao = 0 order by idpedido asc";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }
        
        print "<table style=\"border-collapse: collapse; border: 1px solid black; width: 500px;\">";
        print "<th style=\"background-color: red; color: white;\">Id</th> <th style=\"background-color: red; color: white;\">Garçon</th> <th style=\"background-color: red; color: white;\">Comida</th> <th style=\"background-color: red; color: white;\">Cliente</th> <th style=\"background-color: red; color: white;\">Cancelar</th>";
        $cor = "silver";
        while ($row = mysqli_fetch_array($resultado)) {
            if ($cor == "silver") {
                $cor = "white";
            } else {
                $cor = "silver";
            }
            $idpedido = $row["id"];
            $nomegarcon = $row["garcon"];
            $nomecomida = $row["nomecomida"];
            $nomecliente = $row["client"];
            print "<tr style=\"background-color: $cor;\">";
            print "<td align=\"center\">$idpedido</td>";
            print "<td align=\"center\">$nomegarcon</td>";
            print "<td align=\"center\">$nomecomida</td>";
            print "<td align=\"center\">$nomecliente</td>";
            print "<td align=\"center\"><button name=\"$idpedido\" class=\"cancelar\">Cancelar</button></td>";
            print "</tr>";

        }
    }   
    
    
    public function todosPedidos() {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

        if (mysqli_error($link)) {
            return false;
        }

        $sql = "select p.idpedido as id, g.nome as garcon, c.nomecomida, cli.idcliente as client FROM cliente as cli, pedido as p, garcon as g, comida as c where cli.idcliente = p.idcliente and p.idgarcon = g.idgarcon and p.idcomida = c.idcomida and p.confirmacao = 0 order by idpedido asc";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }
        
        print "<table style=\"border-collapse: collapse; border: 1px solid black; width: 500px;\">";
        print "<th style=\"background-color: red; color: white;\">Id</th> <th style=\"background-color: red; color: white;\">Garçon</th> <th style=\"background-color: red; color: white;\">Comida</th> <th style=\"background-color: red; color: white;\">Cliente</th> <th style=\"background-color: red; color: white;\">Confirmar</th> <th style=\"background-color: red; color: white;\">Cancelar</th>";
        $cor = "silver";
        while ($row = mysqli_fetch_array($resultado)) {
            if ($cor == "silver") {
                $cor = "white";
            } else {
                $cor = "silver";
            }
            $idpedido = $row["id"];
            $nomegarcon = $row["garcon"];
            $nomecomida = $row["nomecomida"];
            $nomecliente = $row["client"];
            print "<tr style=\"background-color: $cor;\">";
            print "<td align=\"center\">$idpedido</td>";
            print "<td align=\"center\">$nomegarcon</td>";
            print "<td align=\"center\">$nomecomida</td>";
            print "<td align=\"center\">$nomecliente</td>";
            print "<td align=\"center\"><input type=\"button\" class=\"botao\" name=\"$idpedido\" value=\"Pronto\" onMouseOver=\"som()\" /></td>";
            print "<td align=\"center\"><button name=\"$idpedido\" class=\"cancelar\">Cancelar</button></td>";
            print "</tr>";

        }
        print "</table>";

        mysqli_close($link);
    }

    
    
    public function setarConfirmacao($id) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "UPDATE pedido SET confirmacao = 1 WHERE idpedido = $id";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        return true;
        
        mysqli_close($link);
    }


    

    
    public function getIdpedido() {
        return $this->idpedido;
    }

    public function setIdpedido($idpedido) {
        $this->idpedido = $idpedido;
    }

    public function getGarcon() {
        return $this->garcon;
    }

    public function setGarcon($garcon) {
        $this->garcon = $garcon;
    }

    public function getComida() {
        return $this->comida;
    }

    public function setComida($comida) {
        $this->comida = $comida;
    }

    public function getReceptor() {
        return $this->receptor;
    }

    public function setReceptor($receptor) {
        $this->receptor = $receptor;
    }

    public function getDataAbertura() {
        return $this->dataAbertura;
    }

    public function setDataAbertura($dataAbertura) {
        $this->dataAbertura = $dataAbertura;
    }

    public function getConfirmacao() {
        return $this->confirmacao;
    }

    public function setConfirmacao($confirmacao) {
        $this->confirmacao = $confirmacao;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }
    
    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }



}

?>
