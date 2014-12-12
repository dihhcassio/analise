<?php

include_once '../dao/EventoDAO.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $acao = $_GET['acao'];

    switch ($acao) {
        case 'getAll':
            $controller = new EventosController();
            print $controller->getAllJson();
            break;
        case 'deletar':
            $controller = new EventosController();
            print $controller->delete(json_decode($_GET['evento']));
            break;
        default :
            break;
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['acao'])) {
        $controller = new EventosController();
        $controller->delete(json_decode(str_replace('\\', '', $_POST['evento'])));
    } else {
        $controller = new EventosController();
        $controller->insert($_POST['nome'], $_POST['dtinicio'] . " " . $_POST['hinicio'] . ":00", $_POST['dtfim'] . " " . $_POST['hfim'] . ":00");
        header("Location: ../eventos.php");
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

    public function insert($nome, $inicio, $fim) {
        $evento = new Evento($nome, $inicio, $fim);
        $this->dao->insert($evento);
    }

    public function delete($evento) {
        $this->dao->delete($evento->id);
    }

}
