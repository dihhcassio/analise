<?php

include_once '../model/Evento.php';
include_once 'AbstractDAO.php';

class EventoDAO extends AbstractDAO {

    public function getAll() {
        return $this->execultQuery('SELECT id, nome FROM evento');
    }

    public function getById($id) {
        return $this->execultQuery('SELECT id, nome FROM evento'
                        . ' WHERE id = ' . $id);
    }

    public function insert($model) {
        return $this->execultQuery("INSERT INTO evento(nome)"
                        . " VALUES('" . $model->getNome() . "')");
    }

    public function update($model) {
        return $this->execultQuery(" UPDATE evento "
                        . " SET nome= " . $model->getNome()
                        . " WHERE id = " . $model->getId());
    }

    public function delete($model) {
        return $this->execultQuery("DELETE FROM evento WHERE id =" . $model->getId());
    }

}
