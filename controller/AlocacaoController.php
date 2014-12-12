<?php
include_once '../dao/EventoDAO.php';
include_once '../dao/RecursoDAO.php';
include_once '../model/Recurso.php';
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

$controller = new AlocacaoController();
$controller->interativoGuloso();

foreach ($controller->getRecursos() as $recurso) {
    ?>

    <table class="table table-bordered">
        <caption> <h2><?php print "Recurso: " . $recurso->getNome() ?> </h2></caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Evento</th>
                <th>Início</th>
                <th>Fim</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($recurso->getEventos() as $evento) {
                ?>
                <tr>
                    <td><?php print $evento["id"] ?></td>
                    <td><?php print $evento["nome"] ?></td>
                    <td><?php print formatData($evento["inicio"]) ?></td>
                    <td><?php print formatData($evento["fim"]) ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table> 
    <?php
}
?>
<table class="table table-bordered">
    <caption> <h2> SEM RECURSOS </h2></caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Evento</th>
            <th>Início</th>
            <th>Fim</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($controller->getSemRecursos() as $evento) {
            ?>
            <tr>
                <td><?php print $evento["id"] ?></td>
                <td><?php print $evento["nome"] ?></td>
                <td><?php print formatData($evento["inicio"]) ?></td>
                <td><?php print formatData($evento["fim"]) ?></td>
            </tr>

            <?php
        }
        ?>
    </tbody>
</table> 
<?php

function formatData($str_data) {
    return date("d/m/Y H:i:s", strtotime($str_data));
}

class AlocacaoController {

    private $eventoDAO;
    private $recursoDAO;
    private $recuros;
    private $semRecusos;

    public function __construct() {
        $this->eventoDAO = new EventoDAO();
        $this->recursoDAO = new RecursoDAO();
        $this->recuros = array();
        $this->semRecusos = array();
    }

    public function getRecursos() {
        return $this->recuros;
    }

    public function getSemRecursos() {
        return $this->semRecusos;
    }

    private function loadRecursos() {
        $recursos = pg_fetch_all($this->recursoDAO->getAll());
        foreach ($recursos as $recurso) {
            $objRecurso = new Recurso($recurso['nome']);
            $objRecurso->setId($recurso['id']);
            array_push($this->recuros, $objRecurso);
        }
    }

    public function printRecursos() {
        foreach ($this->recuros as $recurso) {
            print $recurso->getNome() . " " . json_encode($recurso->getEventos()) . "</br>";
        }
    }

    public function interativoGuloso() {
        $eventos = pg_fetch_all($this->eventoDAO->getAll());
        $this->loadRecursos();
        $temRecurso = false;
        foreach ($eventos as $evento) {
            $temRecurso = false;
            foreach ($this->recuros as $recurso) {
                $eventoInicio = strtotime($evento["inicio"]);
                if ($eventoInicio > $recurso->getFim()) {
                    $recurso->setFim(strtotime($evento["fim"]));
                    $recurso->addEvento($evento);
                    $temRecurso = true;
                    break;
                }
            }
            if (!$temRecurso) {
                array_push($this->semRecusos, $evento);
            }
        }
    }

}
