<?php

/**
 * Description of Curso
 *
 * @author Helison
 */
class Application_Model_DbTable_Evento extends Zend_Db_Table_Abstract {

    protected $_name = 'evento';
    protected $_rowClass = 'Application_Model_Evento';
    protected $_primary = 'id_evento';
    
    protected $_dependentTables = array('Application_Model_DbTable_EventoUsuario');
    

    public function listarTodos() {
        $select = $this->select()->order('nome asc');
        return $this->fetchAll($select);
    }

    public function listaCursoPor($value) {
        $select = $this->select()->order($value);
        return $this->fetchAll($select);
    }

    public function listaEventosPorIdProfessor($id) {
        $select = $this->select()->where('id_professor = ?', $id);
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

    public function cadastraEvento($dados) {

        $evento = $this->createRow();
        /*@var $evento Application_Model_Evento*/
        $evento->setData_inicial($dados['data_inicial']);
        $evento->setData_final($dados['data_inicial']);
        $evento->setHora1($dados['hora1']);
        $evento->setHora2($dados['hora2']);
        $evento->setTitulo($dados['titulo']);

        return $evento->save();
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
