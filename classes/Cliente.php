<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Felipe
 */
class Cliente {
    private $idcliente;
    private $nome;
    private $garcon;
    
    function __construct($idcliente, $nome, $garcon) {
        $this->idcliente = $idcliente;
        $this->nome = $nome;
        $this->garcon = $garcon;
    }
    
    public function inserirCliente($nome, $garcon) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
        
        if (mysqli_error($link)) {
            return false;
        }
        
        $sql = "INSERT INTO cliente(nome, idgarcon) VALUES('$nome', $garcon)";
        
        $resultado = mysqli_query($link, $sql);
        
        if (!$resultado) {
            return false;
        }
        
        return true;
        
        mysqli_close($link);
    }
    
    public function buscarTodosClientes($nome) {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

        if (mysqli_error($link)) {
            return false;
        }

        $sql = "SELECT c.nome as nomecliente, c.idcliente FROM cliente as c, garcon as g WHERE c.idgarcon = g.idgarcon and g.nome = '$nome'";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }
        
        print "<select name=\"selCliente\">";
        print "<option value=\"0\">-------------------------</option>";
        
        while ($row = mysqli_fetch_array($resultado)) {
            $id = $row["idcliente"];
            $nome = $row["nomecliente"];
            //$garcon = $row["idgarcon"];
            print "<option value=\"$id\">$nome</option>";
            
        }
        print "</select>";
        
        return true;
        
        mysqli_close($link);
    }

        public function getIdcliente() {
        return $this->idcliente;
    }

    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getGarcon() {
        return $this->garcon;
    }

    public function setGarcon($garcon) {
        $this->garcon = $garcon;
    }

}

?>
