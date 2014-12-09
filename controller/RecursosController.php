<?php

include_once '../dao/RecursoDAO.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $acao = $_GET['acao'];

    switch ($acao) {
        case 'getAll':
            $controller = new RecursosController();
            print $controller->getAllJson();
            break;
        default :
            break;
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $controller = new RecursosController();
    $controller->insert($_POST['nome']);
    header("Location: ../recursos.php");
}

class RecursosController {

    private $dao;

    public function __construct() {
        $this->dao = new RecursoDAO();
    }

    public function getAllJson() {
        $listRecursos = pg_fetch_all($this->dao->getAll());
        return json_encode($listRecursos);
    }

    public function insert($nome) {
        $evento = new Recurso($nome);
        $this->dao->insert($evento);
    }

}
