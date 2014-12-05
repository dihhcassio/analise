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

}
