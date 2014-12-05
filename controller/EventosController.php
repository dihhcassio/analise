<?php
include_once '../dao/EventoDAO.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $acao = $_GET['acao'];

    switch ($acao) {
        case 'getAll':
            $controller = new EventosController();
            print $controller->getAllJson();
            break;
        default :
            break;
    }
}

class EventosController {

    private $dao;

    public function __construct() {
        $this->dao = new EventoDAO();
    }

    public function getAllJson() {
        $listRecursos = pg_fetch_all($this->dao->getAll());
        return json_encode($listRecursos);
    }

}
