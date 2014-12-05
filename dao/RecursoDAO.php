<?php

include_once '../model/Recurso.php';
include_once 'AbstractDAO.php';

class RecursoDAO extends AbstractDAO {

    public function getAll() {
        return $this->execultQuery('SELECT id, nome FROM recurso');
    }

    public function getById($id) {
        return $this->execultQuery('SELECT id, nome FROM recurso'
                        . ' WHERE id = ' . $id);
    }

    public function insert($model) {
        return $this->execultQuery("INSERT INTO recurso (nome)"
                        . " VALUES('" . $model->getNome() . "')");
    }

    public function update($model) {
        return $this->execultQuery(" UPDATE recurso "
                        . " SET nome= " . $model->getNome()
                        . " WHERE id = " . $model->getId());
    }

    public function delete($model) {
        return $this->execultQuery("DELETE FROM recurso WHERE id =" . $model->getId());
    }

}
