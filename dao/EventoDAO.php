<?php

include_once '../model/Evento.php';
include_once 'AbstractDAO.php';

class EventoDAO extends AbstractDAO {

    public function getAll() {
        return $this->execultQuery("SELECT id, nome, to_char(inicio, 'DD/MM/YYYY HH24:MI:SS') as inicio,
            to_char(fim, 'DD/MM/YYYY HH24:MI:SS') as fim FROM evento");
    }

    public function getById($id) {
        return $this->execultQuery('SELECT * FROM evento'
                        . ' WHERE id = ' . $id);
    }

    public function getAllOrderFim() {
        return $this->execultQuery('SELECT id, nome, inicio, fim
            FROM evento order BY fim  asc');
    }

    public function insert($model) {
         return $this->execultQuery("INSERT INTO evento(nome, inicio, fim)"
                        . " VALUES('" . $model->getNome() . "', "
                        . " '" . $model->getInicio() . "',"
                        . " '" . $model->getFim() . "')");
    }

    public function update($model) {
        return $this->execultQuery(" UPDATE evento "
                        . " SET nome= " . $model->getNome()
                        . " WHERE id = " . $model->getId());
    }

    public function delete($id) {
        
        return $this->execultQuery("DELETE FROM evento WHERE id = " . $id);
    }

}
