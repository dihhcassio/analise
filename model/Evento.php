<?php

class Evento {

    private $id;
    private $nome;
    private $inicio;
    private $fim;

    public function __construct($nome, $inicio, $fim) {
        $this->nome = $nome;
        $this->fim = $fim;
        $this->inicio = $inicio;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getInicio() {
        return $this->inicio;
    }

    public function getFim() {
        return $this->fim;
    }

}
