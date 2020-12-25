<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Chat
 *
 * @author Felipe
 */
class Chat {
    
    private $idmensagem;
    private $nome;
    private $mensagem;
    private $data;
    private $hora;
    
    function __construct($idmensagem, $nome, $mensagem, $data, $hora) {
        $this->idmensagem = $idmensagem;
        $this->nome = $nome;
        $this->mensagem = $mensagem;
        $this->data = $data;
        $this->hora = $hora;
    }
    
    public function getIdmensagem() {
        return $this->idmensagem;
    }

    public function setIdmensagem($idmensagem) {
        $this->idmensagem = $idmensagem;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    
}

?>
