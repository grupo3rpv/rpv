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
            $this->turma = ;
        }
        return $this->turma;
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
        return $this->status;
    }
    
    public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getDia() {
        $dia = $this->dia;
        /* @var $dia Date */
        $dia->getDayOfWeek();
        return $this->dia;
    }
    
    public function setDia($dia) {
        $this->dia = $dia;
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