<?php

class Conexao {

    private $host;
    private $port;
    private $banco;
    private $user;
    private $senha;
    private $conexao;

    public function __construct($host, $port, $banco, $user, $senha) {
        $this->host = $host;
        $this->port = $port;
        $this->banco = $banco;
        $this->user = $user;
        $this->senha = $senha;
    }

    private function openConexao() {
        $this->conexao = pg_connect(
                " host= " . $this->host .
                " dbname= " . $this->banco .
                " port= " . $this->port .
                " user= " . $this->user .
                " password= " . $this->senha);
    }

    private function closeConexaso() {
        return pg_close($this->conexao);
    }
    
    public function execultQuery($sql){
        $this->openConexao();
        $result = pg_query($this->conexao, $sql);
        $this->closeConexaso();
        return $result;
    }

}
