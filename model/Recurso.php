<?php

class Recurso {

    private $id;
    private $nome;
    private $eventos;
    private $fim;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->eventos = array();
        $this->fim = 0;
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

    public function getFim() {
        return $this->fim;
    }

    public function setFim($fim) {
        $this->fim = $fim;
    }

    public function addEvento($evento) {
        array_push($this->eventos, $evento);
    }
    
    public function getEventos(){
        return $this->eventos;
    }

}
