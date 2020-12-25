<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidoConfirmado
 *
 * @author Felipe
 */
class PedidoConfirmado {
    
    private $idpedidoconfirmado;
    private $garcon;
    private $comida;
    private $receptor;
    private $dataAbertura;
    private $hora;
    
    function __construct($idpedidoconfirmado, $garcon, $comida, $receptor, $dataAbertura, $hora) {
        $this->idpedidoconfirmado = $idpedidoconfirmado;
        $this->garcon = $garcon;
        $this->comida = $comida;
        $this->receptor = $receptor;
        $this->dataAbertura = $dataAbertura;
        $this->hora = $hora;
    }

    
    public function todosPedidosConfirmados() {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

        if (mysqli_error($link)) {
            return false;
        }

        $sql = "select idpedidoconfirmado, g.nome, c.nomecomida from pedidoconfirmado as p, garcon as g, comida as c where p.idgarcon = g.idgarcon and p.idcomida = c.idcomida order by idpedidoconfirmado desc";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }
        
        print "<table>";
        print "<th style=\"background-color: green; color: white;\">Id</th> <th style=\"background-color: green; color: white;\">Garçon</th> <th style=\"background-color: green; color: white;\">Comida</th>";
        $cor = "silver";
        while ($row = mysqli_fetch_array($resultado)) {
            if (strlen($row) == 1) {
                print "Felipe";
                $cor = "black";
            }
            if ($cor == "silver") {
                $cor = "white";
            } else {
                $cor = "silver";
            }
            $idpedido = $row["idpedidoconfirmado"];
            $nomegarcon = $row["nome"];
            $nomecomida = $row["nomecomida"];
            print "<tr style=\"background-color: $cor;\">";
            print "<td>$idpedido</td>";
            print "<td>$nomegarcon</td>";
            print "<td align=\"center\">$nomecomida</td>";
            print "</tr>";

        }
        print "</table>";

        mysqli_close($link);
    }
    
    public function todosPedidosConfirmadosGarcon($id) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

        if (mysqli_error($link)) {
            return false;
        }

        $sql = "select idpedidoconfirmado, g.nome, c.nomecomida, cli.nome as nomecli from pedidoconfirmado as p, garcon as g, comida as c, cliente as cli WHERE p.idcliente = cli.idcliente and p.idgarcon = $id and p.idgarcon = g.idgarcon and p.idcomida = c.idcomida order by idpedidoconfirmado desc";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }
        
        print "<table style=\"border-collapse: collapse; border: 1px solid black; width: 400px;\">";
        print "<th style=\"background-color: green; color: white;\">Id</th> <th style=\"background-color: green; color: white;\">Garçon</th> <th style=\"background-color: green; color: white;\">Comida</th> <th style=\"background-color: green; color: white;\">Cliente</th>";
        $cor = "silver";
        //$cont = 0;
        while ($row = mysqli_fetch_array($resultado)) {
            
            if ($cor == "silver") {
                $cor = "white";
            } else {
                $cor = "silver";
            }
            $idpedido = $row["idpedidoconfirmado"];
            $nomegarcon = $row["nome"];
            $nomecomida = $row["nomecomida"];
            $cliente = $row["nomecli"];
            print "<tr style=\"background-color: $cor; heigth: 30px;\">";
            print "<td align=\"center\"\">$idpedido</td>";
            print "<td align=\"center\"\">$nomegarcon</td>";
            print "<td align=\"center\">$nomecomida</td>";
            print "<td align=\"center\">$cliente</td>";
            print "</tr>";
            //$cont++;
        }
        
        
        print "</table>";
        
        //print $cont;
        mysqli_close($link);
    }
    
    public function getIdpedidoconfirmado() {
        return $this->idpedidoconfirmado;
    }

    public function setIdpedidoconfirmado($idpedidoconfirmado) {
        $this->idpedidoconfirmado = $idpedidoconfirmado;
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

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

}

?>
