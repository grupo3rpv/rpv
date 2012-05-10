<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Disciplina
 *
 * @author Helison
 */
class Application_Model_DbTable_Disciplina extends Zend_Db_Table_Abstract {
    protected $_name = 'disciplina';
    protected $_rowClass = 'Application_Model_Disciplina';

        public function listarTodos() {
        $select = $this->select()->order('codigo asc');
        return $this->fetchAll($select);
    }

    public function listaDisciplinasPor($value) {
        $select = $this->select()->order($value);
        return $this->fetchAll($select);
    }
    
     public function getCodigoPorId($id) {
        $select = $this->select()->where('id_disciplina = ?', $id);
        return $this->fetchRow($select);
    }

    public static function getPrimaryKeyName() {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        return $info['primary'][1];
    }

    public static function getValuesToSelectElement($order = 'codigo asc') {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        $select = $model->select()->order($order);
        $result = $model->fetchAll($select);
        $resultArray = array();
        foreach ($result as $row):
            $resultArray[$row->$info['primary'][1]] = $row->codigo;
        endforeach;
        return $resultArray;
    }

    public function cadastraDisciplina($dados) {
        $disciplina = $this->createRow();

        $disciplina->setId_disciplina($dados['id_disciplina']);
        $disciplina->setCodigo($dados['codigo']);
        $disciplina->setNome($dados['nome']);
        $disciplina->setEmenta($dados['ementa']);
        $disciplina->setCargaHoraria($dados['cargaHoaria']);
        $disciplina->setInfoAdicionais($dados['infoAdicionais']);

        return $disciplina->save();
    }

    public function editarEquipamento(array $dados) {
        $disciplina= $this->find($dados['id_disciplina'])->current();
        
        $disciplina->setCodigo($dados['codigo']);
        $disciplina->setNome($dados['nome']);
        $disciplina->setEmenta($dados['ementa']);
        $disciplina->setCargaHoraria($dados['cargaHoaria']);
        $disciplina->setInfoAdicionais($dados['infoAdicionais']);

        return $disciplina->save();
    }
    
    public function removerDisciplina($id_disciplina) {
        $disciplina = $this->find($id_disciplina)->current();
        return $disciplina->delete();
    }



}

?>
