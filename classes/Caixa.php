<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caixa
 *
 * @author Felipe
 */
define("PORC_GARCON", 0.90);

class Caixa {
    
     private $dataabertura;
     private $horaabertura;
     private $datafechamento;
     private $horafechamento;
     private $valor;
     private $quant_alimento;
     private $admin;
     
     function __construct($dataabertura, $horaabertura, $datafechamento, $horafechamento, $valor, $quant_alimento, $admin) {
         $this->dataabertura = $dataabertura;
         $this->horaabertura = $horaabertura;
         $this->datafechamento = $datafechamento;
         $this->horafechamento = $horafechamento;
         $this->valor = $valor;
         $this->quant_alimento = $quant_alimento;
         $this->admin = $admin;
     }
     
     public function fecharCaixa() {
         print "Quantidade de Alimentos: " . $this->quantidadeAlimento() . "<br />";
         print "Total de Alimentos: R$ " . $this->valorTotalAlimento() . "<br />";
         print "Desconto: 10%" . "<br />";
         print "Valor do Garçon: " . $this->valorTotalAlimento() * 0.10 . "<br />";
         print "Total com Desconto: " . $this->valorTotalAlimento() * 0.90. "<br />";
     }


     /**
      * Retorna o valor total menos os 10% do garçon
      * @return res
      */
     public function valorDescontadoGarcon() {
         $res = $this->valor * PORC_GARCON;
         return $res;
     }
     
     public function valorTotalAlimento() {
         $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

         if (mysqli_error($link)) {
            return false;
         }

         $sql = "SELECT sum(c.preco) as soma FROM pedidoconfirmado as p, comida as c WHERE p.idcomida = c.idcomida;";

         $resultado = mysqli_query($link, $sql);

         if (!$resultado) {
            return false;
         }

         while ($row = mysqli_fetch_array($resultado)) {

            return $row["soma"];
                    
         }

         mysqli_close($link);
     }
     
     public function quantidadeAlimento() {
         $link = mysqli_connect("localhost", "root", "1234", "projeto_balneario");

         if (mysqli_error($link)) {
            return false;
         }

         $sql = "SELECT count(idpedidoconfirmado) as cont FROM pedidoconfirmado";

         $resultado = mysqli_query($link, $sql);

         if (!$resultado) {
            return false;
         }

         while ($row = mysqli_fetch_array($resultado)) {

            return $row["cont"];
                    
         }

         mysqli_close($link);
     }

     public function getDataabertura() {
         return $this->dataabertura;
     }

     public function setDataabertura($dataabertura) {
         $this->dataabertura = $dataabertura;
     }

     public function getHoraabertura() {
         return $this->horaabertura;
     }

     public function setHoraabertura($horaabertura) {
         $this->horaabertura = $horaabertura;
     }

     public function getDatafechamento() {
         return $this->datafechamento;
     }

     public function setDatafechamento($datafechamento) {
         $this->datafechamento = $datafechamento;
     }

     public function getHorafechamento() {
         return $this->horafechamento;
     }

     public function setHorafechamento($horafechamento) {
         $this->horafechamento = $horafechamento;
     }

     public function getValor() {
         return $this->valor;
     }

     public function setValor($valor) {
         $this->valor = $valor;
     }

     public function getQuant_alimento() {
         return $this->quant_alimento;
     }

     public function setQuant_alimento($quant_alimento) {
         $this->quant_alimento = $quant_alimento;
     }

     public function getAdmin() {
         return $this->admin;
     }

     public function setAdmin($admin) {
         $this->admin = $admin;
     }
     
}

?>
