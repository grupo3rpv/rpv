<?php

class Application_Model_HorarioTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testGetProfessores() {
        $dbHorario = new Application_Model_DbTable_Horario();
        $modelHorario = $dbHorario->createRow();
        $modelHorario->setIdHorario('1');
        $professores = $modelHorario->getProfessores();
        $this->assertInstanceOf('Zend_Db_Table_Rowset', $professores);
        foreach ($professores as $professor) {
            $this->assertInstanceOf('Application_Model_Usuario', $professor);
        }
    }

    /* @var $modelHorario Application_Model_Horario */
    public function testSetProfessores() {
        $arrayProfessores = array(array('id_usuario' => 1), array('id_usuario' => 2));
        $dbHorario = new Application_Model_DbTable_Horario();
        $modelHorario = $dbHorario->createRow();
        $modelHorario->setId_disciplina_curso(1);
        $modelHorario->setId_turma(1);
        $modelHorario->setId_periodo_letivo(1);
        $idHorario = $modelHorario->save();
        $modelHorario->setProfessores($arrayProfessores);

        $modelHorario = null;
        $modelHorario = $dbHorario->createRow();
        $modelHorario->setIdHorario($idHorario);

        $professores = $modelHorario->getProfessores();
        $this->assertInstanceOf('Zend_Db_Table_Rowset', $professores);
        foreach ($professores as $professor) {
            $this->assertInstanceOf('Application_Model_Usuario', $professor);
        }
    }

}
