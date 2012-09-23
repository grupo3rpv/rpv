<?php

/**
 * Description of HorarioController
 *
 * @author thiago
 */
class HorarioController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function montarGradeAction() {
        $horario = new Application_Model_Horario();
        $this->view->dias = $horario->getDias();
        $this->view->horas = $horario->getHoras();
    }

    public function getCursosAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $cursoDAO = new Application_Model_DbTable_Curso();
        $cursos = $cursoDAO->listarTodos()->toArray();

        echo Zend_Json_Encoder::encode($cursos);
    }

    public function getPeriodosLetivosAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $periodoLetivoDAO = new Application_Model_DbTable_PeriodoLetivo();
        $periodosLetivos = $periodoLetivoDAO->fetchAll()->toArray();

        echo Zend_Json_Encoder::encode($periodosLetivos);
    }

    public function getTurmasAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $turmaDAO = new Application_Model_DbTable_Turma();
        $turma = $turmaDAO->fetchAll()->toArray();

        echo Zend_Json_Encoder::encode($turma);
    }

    public function getDisciplinasAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $idCurso = $this->getRequest()->getParam('curso');
        if (is_numeric($idCurso)) {

            $disciplinaCursoDAO = new Application_Model_DbTable_DisciplinaCurso();
            $disciplinasCurso = $disciplinaCursoDAO->getIdDisciplinas($idCurso);
            $disciplinas;

            /* @var $disciplinaCurso Application_Model_DisciplinaCurso */
            foreach ($disciplinasCurso as $disciplinaCurso) {
                $disciplinas[] = $disciplinaCurso->getDisciplina()->toArray();
            }

            echo Zend_Json_Encoder::encode($disciplinas);
        } else {
            echo '';
        }
    }

    public function getProfessoresAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $idDisciplina = $this->getRequest()->getParam('disciplina');
        if (is_numeric($idDisciplina)) {
            $disciplinaDAO = new Application_Model_DbTable_Usuario();
            /* @var $disciplina Application_Model_Disciplina */
            $professores = $disciplinaDAO->getProfessoresComNiveisInteresse($idDisciplina)->toArray();

            echo Zend_Json_Encoder::encode($professores);
        } else {
            echo '';
        }
    }

}