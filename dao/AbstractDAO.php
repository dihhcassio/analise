<?php
 
include_once '../conection/Conexao.php';
class AbstractDAO {
   
    protected $conexao;
        
    public function __construct() {
        $this->conexao = new Conexao("localhost", '5432', 'analise', 'postgres', '123');
    }
    
    public function execultQuery($sql){
        return $this->conexao->execultQuery($sql);
    }
}
