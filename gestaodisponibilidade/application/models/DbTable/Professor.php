<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professor
 *
 * @author Helison
 */
class Application_Model_DbTable_Professor extends Zend_Db_Table_Abstract {

    protected $_name = 'professor';
    protected $_rowClass = 'Application_Model_professor';
    protected $_referenceMap = array(
        'ProfessorDisciplina' => array(
            'refTableClass' => 'Application_Model_DbTable_Disciplina',
            'columns' => array('IdDisciplina'),
            'refColumns' => 'id_disciplina'
        ),
        'ProfessorNivelInteresse' => array(
            'refTableClass' => 'Application_Model_DbTable_EquipamentoSala',
            'columns' => array('idInteresse'),
            'refColumns' => 'id_nivelInteresse'
        )
    );

    public function cadastrarProfessor($dados) {
        $professor = $this->createRow();
        /* @var $professor Application_Model_Professor */
        $professor->setId_professor($dados['id_professor']);
        $professor->setNome($dados['nome']);
        $professor->setMatricula($dados['matricula']);

        $chave = $professor->save();


        $nivelInteresseProfessorModel = new Application_Model_DbTable_NivelInteresse();
        foreach ($dados['id_professor'] as $key => $value) {
            $$nivelInteresseProfessorModel->cadastraNivelInteresse(array(
                'id_nivelInteresse' => $value, 'idInteresse' => $chave, 'nivelInteresse' => 1));
        }

        return $chave;
    }

    public function editarSala(array $dados) {
        $professor = $this->find($dados['id_professor'])->current();
        /* @var $professor Application_Model_Sala */
        //$professor->setNumero($dados['numero']);
        $professor->setNome($dados['nome']);
        $professor->setMatricula($dados['matricula']);


        $chave = $professor->save();

        $nivelInteresseProfessorModel = new Application_Model_DbTable_NivelInteresse();
        $nivelInteresseProfessorModel->removerNivelInteresse($professor->getId_professor());
        foreach ($dados['id_disciplina'] as $key => $value) {
            $nivelInteresseProfessorModel->cadastraNivelInteresse(array(
                'id_nivelInteresse' => $value, 'idInteresse' => $chave, 'nivelInteresse' => 1));
        }

        return $chave;
    }

    public function buscarProfessorPor($alias, $value) {
        $select = $this->select()->where($alias . ' = ?', $value);
        return $this->fetchRow($select);
    }

    public function listaProfessorPor($alias, $value) {
        $select = $this->select()->where($alias . ' = ?', $value);
        return $this->fetchAll($select);
    }

    public function removerProfessor($id_professor) {
        $professor = $this->find($id_professor)->current();
        return $professor->delete();
    }

    public function listaProfessor() {
        $select = $this->select()->order('id_professor asc');
        return $this->fetchAll($select);
    }

    public static function getPrimaryKeyName() {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        return $info['primary'][1];
    }
        public static function getValuesToSelectElement($order = 'nome asc') {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        $select = $model->select()->order($order);
        $result = $model->fetchAll($select);
        $resultArray = array();
        foreach ($result as $row):
            $resultArray[$row->$info['primary'][1]] = $row->nome;
        endforeach;
        return $resultArray;
    }


}

?>
