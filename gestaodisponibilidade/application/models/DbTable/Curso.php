<?php

/**
 * Description of Curso
 *
 * @author Helison
 */
class Application_Model_DbTable_Curso extends Zend_Db_Table_Abstract {

    protected $_name = 'curso';
    protected $_rowClass = 'Application_Model_Curso';
    protected $_primary = 'id_curso';
    protected $_referenceMap = array(
        'CursoDisciplina' => array(
            'columns' => 'id_curso',
            'refTableClass' => 'DisciplinaCurso',
            'refColumns' => 'id_curso'
            ));

    public function listarTodos() {
        $select = $this->select()->order('nome asc');
        return $this->fetchAll($select);
    }

    public function listaCursoPor($value) {
        $select = $this->select()->order($value);
        return $this->fetchAll($select);
    }

    public function getNomePorId($id) {
        $select = $this->select()->where('id_curso = ?', $id);
        return $this->fetchRow($select);
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

    public function cadastraCurso($dados) {

        $curso = $this->createRow();

        $curso->setId_curso($dados['id_curso']);
        $curso->setNome($dados['nome']);
        $curso->setCodigo($dados['codigo']);

        return $curso->save();
    }

    public function editarCurso(array $dados) {
        $curso = $this->find($dados['id_curso'])->current();
        $curso->setNome($dados['nome']);
        $curso->setCodigo($dados['codigo']);
        return $curso->save();
    }

    public function removerCurso($id_curso) {
        $curso = $this->find($id_curso)->current();
        return $curso->delete();
    }

    public function getIdsENomesTodosCursos() {
        $cursos = $this->listarTodos();
        $lista = array();
        foreach ($cursos as $item) {
            $lista[$item['id_curso']] = $item['nome'];
        }
        return $lista;
    }

}
