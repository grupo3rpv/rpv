<?php

/**
 * Description of Disciplina
 *
 * @author Helison
 */
class Application_Model_DbTable_Disciplina extends Zend_Db_Table_Abstract {

    protected $_name = 'disciplina';
    protected $_rowClass = 'Application_Model_Disciplina';
    protected $_primary = 'id_disciplina';
    protected $_referenceMap = array(
        'DisciplinaCurso' => array(
            'columns' => 'id_disciplina',
            'refTableClass' => 'DisciplinaCurso',
            'refColumns' => 'id_disciplina'
            ));

    public function listarTodos() {
        $select = $this->select()->order('codigo asc');
        return $this->fetchAll($select);
    }

    public function listaDisciplinasPor($value) {
        $select = $this->select()->order($value);
        return $this->fetchAll($select);
    }

    public function listaDisciplinasPorID($id) {
        $select = $this->select()->where('id_disciplina =?', $id);
        return $this->fetchAll($select);
    }

    public function listaDisciplinaPorCodigo($codigo) {
        $select = $this->select()->where('codigo =?', $codigo);
        return $this->fetchRow($select);
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
        $disciplina->setCarga_horaria($dados['carga_horaria']);
        $disciplina->setInfo_adicionais($dados['info_adicionais']);

        $chave = $disciplina->save();

        $disciplinaCursoModel = new Application_Model_DbTable_DisciplinaCurso();
        $this->cadastrarDisciplinaCurso($dados, $disciplinaCursoModel, $chave);

        return $chave;
    }

    public function editarDisciplina(array $dados) {
        $disciplina = $this->find($dados['id_disciplina'])->current();

        $disciplina->setCodigo($dados['codigo']);
        $disciplina->setNome($dados['nome']);
        $disciplina->setEmenta($dados['ementa']);
        $disciplina->setCarga_horaria($dados['carga_horaria']);
        $disciplina->setInfo_adicionais($dados['info_adicionais']);

        $chave = $disciplina->save();

        $disciplinaCursoModel = new Application_Model_DbTable_DisciplinaCurso();
        $cursos = $disciplinaCursoModel->getIdCursos($chave);
        foreach ($dados['id_curso'] as $key => $value) {
            $cadastrar = true;
            foreach ($cursos as $curso) {
                if ($curso->getId_curso() == $value) {
                    $cadastrar = false;
                    break;
                }
            }
            if ($cadastrar) {
                $disciplinaCursoModel->cadastraDisciplinaCurso(array('id_curso' => $value, 'id_disciplina' => $chave));
            }
        }

        $cursos = $disciplinaCursoModel->getIdCursos($chave);
        foreach ($cursos as $curso) {
            $remover = true;
            foreach ($dados['id_curso'] as $key => $value) {
                if ($curso->getId_curso() == $value) {
                    $remover = false;
                    break;
                }
            }
            if ($remover) {
                $disciplinaCursoModel->removerCursosDaDisciplina($curso->getId_disciplina());
            }
        }

        return $chave;
    }

    public function removerDisciplina($id_disciplina) {
        $disciplina = $this->find($id_disciplina)->current();
        $disciplinaCursoModel = new Application_Model_DbTable_DisciplinaCurso();
        $this->removerCursosDaDisciplina($disciplinaCursoModel, $disciplina);
        return $disciplina->delete();
    }

}
