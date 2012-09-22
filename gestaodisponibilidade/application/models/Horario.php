<?php

/**
 * Description of Horario
 *
 * @author thiago
 */
class Application_Model_Horario extends Zend_Db_Table_Row_Abstract {
    
    private $turma;
    private $periodoLetivo;
    private $disciplina;
    
    public function getTurma() {
        if (is_null($this->turma)) {
            $turmaDAO = new Application_Model_DbTable_Turma();
            $this->turma = $turmaDAO->find($this->id_turma)->current();
        }
        return $this->turma;
    }
    
    public function getPeriodoLetivo() {
        if (is_null($this->periodoLetivo)) {
            $periodoLetivoDAO = new Application_Model_DbTable_PeriodoLetivo();
            $this->periodoLetivo = $periodoLetivoDAO->find($this->id_periodo_letivo)->current();
        }
        return $this->periodoLetivo;
    }
    
    public function getDisciplina() {
        if (is_null($this->disciplina)) {
            $disciplinaCursoDAO = new Application_Model_DbTable_DisciplinaCurso();
            $disciplinaCurso = $disciplinaCursoDAO->find($this->id_disciplina_curso)->current();
            $this->disciplina = $disciplinaCurso->getDisciplina();
        }
        return $this->disciplina;
    }
    
    public function getId_turma() {
        return $this->id_turma;
    }
    
    public function setId_turma($idTurma) {
        $this->id_turma = $idTurma;
    }
    
    public function getId_periodo_letivo() {
        return $this->id_periodo_letivo;
    }
    
    public function setId_periodo_letivo($idPeriodoLetivo) {
        $this->id_periodo_letivo = $idPeriodoLetivo;
    }
    
    public function getId_disciplina_curso() {
        return $this->id_disciplina_curso;
    }
    
    public function setId_disciplina_curso($idDisciplinaCurso) {
        $this->id_disciplina_curso = $idDisciplinaCurso;
    }
    
    public function getStatus() {
        if ($this->status == 1 || $this->status == true) {
            return true;
        } else {
            return false;
        }
    }
    
    public function setStatus($status) {
        if ($status === 1 || $status === true) {
            $this->status = true;
        } else {
            $this->status = false;
        }
    }
    
    public function getDia() {
        $dia = DateTime::createFromFormat(Application_Model_Data::PHP_DATABASE_DATE, $this->dia);
        $dia = $dia->format(Application_Model_Data::PHP_REGULAR_WEEK);
        switch ($dia) {
            case Application_Model_Data::SEGUNDA_INT:
                return Application_Model_Data::SEGUNDA_STRING;
                break;
            
            case Application_Model_Data::TERCA_INT:
                return Application_Model_Data::TERCA_STRING;
                break;
            
            case Application_Model_Data::QUARTA_INT:
                return Application_Model_Data::QUARTA_STRING;
                break;
            
            case Application_Model_Data::QUINTA_INT:
                return Application_Model_Data::QUINTA_STRING;
                break;
            
            case Application_Model_Data::SEXTA_INT:
                return Application_Model_Data::SEXTA_STRING;
                break;
            
            case Application_Model_Data::SABADO_INT:
                return Application_Model_Data::SABADO_STRING;
                break;
            
            case Application_Model_Data::DOMINGO_INT:
                return Application_Model_Data::DOMINGO_STRING;
                break;

            default:
                return '';
                break;
        }
    }
    
    public function setDia($dia) {
        switch ($dia) {
            case Application_Model_Data::SEGUNDA_STRING:
                $dia = Application_Model_Data::SEGUNDA_INT;
                break;
            
            case Application_Model_Data::TERCA_STRING:
                $dia = Application_Model_Data::TERCA_INT;
                break;
            
            case Application_Model_Data::QUARTA_STRING:
                $dia = Application_Model_Data::QUARTA_INT;
                break;
            
            case Application_Model_Data::QUINTA_STRING:
                $dia = Application_Model_Data::QUINTA_INT;
                break;
            
            case Application_Model_Data::SEXTA_STRING:
                $dia = Application_Model_Data::SEXTA_INT;
                break;
            
            case Application_Model_Data::SABADO_STRING:
                $dia = Application_Model_Data::SABADO_INT;
                break;
            
            case Application_Model_Data::DOMINGO_STRING:
                $dia = Application_Model_Data::DOMINGO_INT;
                break;

            default:
                $dia = -1;
                break;
        }
        $dia = DateTime::createFromFormat(Application_Model_Data::PHP_REGULAR_WEEK, $dia);
        $this->dia = $dia->format(Application_Model_Data::PHP_DATABASE_DATE);
    }
    
    public function getHora_inicial() {
        return $this->hora_inicial;
    }
    
    public function setHora_inicial($horaInicial) {
        $this->hora_inicial = $horaInicial;
    }
    
    public function getHora_final() {
        return $this->hora_final;
    }
    
    public function setHora_final($horaFinal) {
        $this->hora_final = $horaFinal;
    }
    
}