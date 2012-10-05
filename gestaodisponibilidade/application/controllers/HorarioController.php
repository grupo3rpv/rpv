<?php

/**
 * Description of HorarioController
 *
 * @author thiago
 */
class HorarioController extends Zend_Controller_Action {

    public function init() {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $entity = Zend_Auth::getInstance()->getIdentity();
            if ($entity->tipo_usuario == 'coordenador' ||
                    $entity->tipo_usuario == 'admin') {
                
            } else {
                $this->_redirect('/login/acesso-negado/');
            }
        } else {
            $this->_redirect('/login/logar/');
        }
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
            $usuarioDAO = new Application_Model_DbTable_Usuario();
            $professores = $usuarioDAO->getProfessoresComNiveisInteresse($idDisciplina)->toArray();

            echo Zend_Json_Encoder::encode($professores);
        } else {
            echo '';
        }
    }

    public function getDisponibilidadeProfessorAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $idProfessor = $this->getRequest()->getParam('professor');
        if (is_numeric($idProfessor)) {
            $disponibilidadeDAO = new Application_Model_DbTable_DisponibilidadeAula();
            $disponibilidades = $disponibilidadeDAO->listaDisponibilidadesPorId($idProfessor)->toArray();
            $disp;
            foreach ($disponibilidades as $disponibilidade) {
                switch ($disponibilidade['dia']) {
                    case 'segunda':
                        $disponibilidade['dia'] = Application_Model_Data::SEGUNDA_STRING;
                        break;

                    case 'terca':
                        $disponibilidade['dia'] = Application_Model_Data::TERCA_STRING;
                        break;

                    case 'quarta':
                        $disponibilidade['dia'] = Application_Model_Data::QUARTA_STRING;
                        break;

                    case 'quinta':
                        $disponibilidade['dia'] = Application_Model_Data::QUINTA_STRING;
                        break;

                    case 'sexta':
                        $disponibilidade['dia'] = Application_Model_Data::SEXTA_STRING;
                        break;

                    case 'sabado':
                        $disponibilidade['dia'] = Application_Model_Data::SABADO_STRING;
                        break;

                    default:
                        break;
                }
                $horas = explode(':', $disponibilidade['hora']);
                $disponibilidade['hora'] = $horas[0];
                $disp[] = $disponibilidade;
            }

            echo Zend_Json_Encoder::encode($disp);
        } else {
            echo '';
        }
    }

    public function addHorarioAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $data = $this->getRequest()->getRawBody();

        $dados = Zend_Json_Decoder::decode($data);

        $professorDAO = new Application_Model_DbTable_Usuario();
        $horaInicial = $dados['horaInicial'];
        if ($horaInicial < 10) {
            $horaInicial = '0' . $horaInicial . ':30:00';
        } else {
            $horaInicial = $horaInicial . ':30:00';
        }
        $horarioValido = true;
        $professores;
        foreach ($dados['professores'] as $idProf) {
            $professores[]['id_usuario'] = $idProf;
            $professor = $professorDAO->createRow();
            $professor->setId_usuario($idProf);
            $horarios = $professor->getHorarios();

            /* @var $horario1 Application_Model_Horario */
            foreach ($horarios as $horario1) {
                if ($horario1->getHora_inicial() == $horaInicial &&
                        $horario1->getDia() == $dados['dia'] &&
                        $horario1->getPeriodoLetivo()->getId_periodo_letivo() == $dados['periodoLetivo']) {
                    $saida = array('horarioValido' => false,
                        'id_professor' => $professor->getId_usuario(),
                        'hora' => $horaInicial,
                        'dia' => $horario1->getDia(),
                        'periodoLetivo' => $horario1->getPeriodoLetivo()->getId_periodo_letivo());
                    $horarioValido = false;
                    break;
                }
            }
        }

        if ($horarioValido) {
            $horarioDAO = new Application_Model_DbTable_Horario();
            /* @var $horario Application_Model_Horario */
            $horario = $horarioDAO->createRow();

            $horario->setDia($dados['dia']);
            $horario->setHora_final($dados['horaFinal'] . ':30:00');
            $horario->setHora_inicial($dados['horaInicial'] . ':30:00');
            $horario->setId_disciplina_curso($dados['disciplina']);
            $horario->setId_periodo_letivo($dados['periodoLetivo']);
            $horario->setId_turma($dados['turma']);
            $horario->setStatus(0);
            $horario->save();
            $horario->setProfessores($professores); // precisa ser apos o save()

            $saida = $horario->toArray();
            $saida['horarioValido'] = true;
            echo Zend_Json_Encoder::encode($saida);
        } else {
            echo Zend_Json_Encoder::encode($saida);
        }
    }

    public function removerHorarioAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $idHorario = $this->getRequest()->getRawBody();

        $horarioProfessor = new Application_Model_DbTable_HorarioProfessor();
        $horarioProfessor->removerProfessoresdoHorario($idHorario);

        $horarioDAO = new Application_Model_DbTable_Horario();
        /* @var $horario Application_Model_Horario */
        $horario = $horarioDAO->createRow();
        $horario->setIdHorario($idHorario);
        $linhasDeletadas = $horario->delete();

        echo $linhasDeletadas;
    }

    public function getHorariosAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $data = $this->getRequest()->getRawBody();
        $dados = Zend_Json_Decoder::decode($data);

        $horarioDAO = new Application_Model_DbTable_Horario();
        $horariosGrade = $horarioDAO->getHorariosGrade($dados['periodoLetivo'], $dados['curso'], $dados['turma']);
        /* @var $horarioGrade Application_Model_Horario */
        foreach ($horariosGrade as $horarioGrade) {
            $professores = $horarioGrade->getProfessores();
            $dia = $horarioGrade->getDia();
            $horario = $horarioGrade->toArray();
            $horario['dia'] = $dia;
            $horario['professores'] = '';
            foreach ($professores as $professor) {
                $horario['professores'][] = $professor->toArray();
            }
            $horarios[] = $horario;
        }

        $saida = Zend_Json_Encoder::encode($horarios);
        echo $saida;
    }

}