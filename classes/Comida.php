<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comida
 *
 * @author Felipe
 */
class Comida {
    
     private $idcomida;
     private $nome;
     private $preco;
     
     function __construct($idcomida, $nome, $preco) {
         $this->idcomida = $idcomida;
         $this->nome = $nome;
         $this->preco = $preco;
     }

     
     public function todasComidas() {
        $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

        if (mysqli_error($link)) {
            return false;
        }

        $sql = "SELECT * FROM comida";

        $resultado = mysqli_query($link, $sql);

        if (!$resultado) {
            return false;
        }
        print '<select name="txtComida">';
        print "<option value=\"0\">---------------------</option>";
        while ($row = mysqli_fetch_array($resultado)) {
            $id = $row["idcomida"];
            $nome = $row["nomecomida"];
            
            print "<option value=\"$id\">$nome</option>";
            
        }
        print '</select>';

        mysqli_close($link);
    }

     public function getIdcomida() {
         return $this->idcomida;
     }

     public function setIdcomida($idcomida) {
         $this->idcomida = $idcomida;
     }

     public function getNome() {
         return $this->nome;
     }

     public function setNome($nome) {
         $this->nome = $nome;
     }

     public function getPreco() {
         return $this->preco;
     }

     public function setPreco($preco) {
         $this->preco = $preco;
     }

}

?>
