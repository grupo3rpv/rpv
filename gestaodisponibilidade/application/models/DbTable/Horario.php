<?php

/**
 * Description of Horario
 *
 * @author thiago
 */
class Application_Model_DbTable_Horario extends Zend_Db_Table_Abstract {

    protected $_name = 'horario';
    protected $_rowClass = 'Application_Model_Horario';
    protected $_primary = 'id_horario';
    protected $_dependentTables = array('Application_Model_DbTable_HorarioProfessor');

    public function getHorariosGrade($idPeriodoLetivo, $idCurso, $idTurma) {
        $select = $this->select();
        $select->setIntegrityCheck(false);
        
        $select->from(array('h' => 'horario'), array('h.*'))
                ->from(array('d' => 'disciplina_curso'), array(''))
                //->from(array('p' => 'horario_professor'), array('p.id_professor'))
                ->where('h.id_periodo_letivo = ?', $idPeriodoLetivo)
                ->where('h.id_turma = ?', $idTurma)
                ->where('h.id_disciplina_curso = d.id_disciplina_curso')
                //->where('h.id_horario = p.id_horario')
                ->where('d.id_curso = ?', $idCurso);

        //echo $select->__toString();die();
        $horariosGrade = $this->fetchAll($select);
        return $horariosGrade;
    }

}