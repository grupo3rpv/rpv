<?php

/**
 * Description of CursoController
 *
 * @author Helison
 */
class CursoController extends Zend_Controller_Action {

    public function init() {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $entity = Zend_Auth::getInstance()->getIdentity();
            if ($entity->tipo_usuario == 'secretario' ||
                    $entity->tipo_usuario == 'admin') {
                
            } else {
                $this->_redirect('/login/acesso-negado/');
            }
        } else {
            $this->_redirect('/login/logar/');
        }
    }

    public function indexAction() {
        $modelCurso = new Application_Model_DbTable_Curso();
        $listaCurso = $modelCurso->listaCursoPor('nome asc');
        $this->view->listarTodos = $listaCurso;
    }

    public function adicionarCursoAction() {
        $form = new Application_Form_Curso();

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($_POST)) {
                $dados = $form->getValues();

                $model = new Application_Model_DbTable_Curso();
                $model->cadastraCurso($dados);

                $this->_redirect('/curso/index');
            }
        }
        $this->view->form = $form;
    }

    public function editarCursoAction() {
        $form = new Application_Form_Curso();

        $numero = $this->getRequest()->getParam(Application_Model_DbTable_Curso::getPrimaryKeyName());

        $cursoModel = new Application_Model_DbTable_Curso();

        $form->populate($cursoModel->find($numero)->current()->toArray());

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dados = $form->getValues();
                $cursoModel->editarCurso($dados);

                $this->_redirect('/curso/index');
            }
        }

        $this->view->form = $form;
    }

    public function removerCursoAction() {
        $id_curso = $this->_getParam('id_curso');
        $cursoModel = new Application_Model_DbTable_Curso();
        $cursoModel->removerCurso($id_curso);
        $this->_redirect('/curso/index');
    }

    public function listarCursosAction() {
        $modelCurso = new Application_Model_DbTable_Curso();
        $listaCurso = $modelCurso->listaCursoPor('nome asc');
        $this->view->listarTodos = $listaCurso;
    }

    public function disciplinaAction() {

        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $id = $this->getRequest()->getParams(Application_Model_DbTable_Curso::getPrimaryKeyName());
        $modelDisciplinaCurso = new Application_Model_DbTable_DisciplinaCurso();

        $idDisciplinas = $modelDisciplinaCurso->getIdDisciplinas($id['id']);
        $listaDisciplinas = array();

        foreach ($idDisciplinas as $value) {

            $listaDisciplinas[] = $modelDisciplina->getCodigoPorId($value['id_disciplina']);
        }
        $this->view->listarTodos = $listaDisciplinas;
    }

}