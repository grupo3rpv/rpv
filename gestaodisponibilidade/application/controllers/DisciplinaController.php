<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CursoController
 *
 * @author Helison
 */
class DisciplinaController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $listaDisciplina = $modelDisciplina->listaDisciplinasPor('nome asc');
        $this->view->listarTodos = $listaDisciplina;
    }

    public function cadastrarDisciplinaAction() {
        $form = new Application_Form_Disciplina();
        $this->inserirCursosForm($form);

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($_POST)) {
                $dados = $form->getValues();

                $model = new Application_Model_DbTable_Disciplina();
                $model->cadastraDisciplina($dados);

                $this->_redirect('/disciplina/index');
            }
        }
        $this->view->form = $form;
    }

    public function editarDisciplinaAction() {
        $form = new Application_Form_Disciplina();
        $this->inserirCursosForm($form);

        $numero = $this->getRequest()->getParam(Application_Model_DbTable_Disciplina::getPrimaryKeyName());

        $disciplinaModel = new Application_Model_DbTable_Disciplina();
        $dados = $disciplinaModel->find($numero)->current()->toArray();
        
        $dados['id_curso'] = $this->preencherCursos($numero);

        $form->populate($dados);

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dados = $form->getValues();
                $disciplinaModel->editarDisciplina($dados);

                $this->_redirect('/disciplina/index');
            }
        }

        $this->view->form = $form;
    }

    public function removerDisciplinaAction() {
        $id_disciplina = $this->_getParam('id_disciplina');
        $disciplinaModel = new Application_Model_DbTable_Disciplina();
        $disciplinaModel->removerDisciplina($id_disciplina);
        $this->_redirect('/disciplina/index');
    }

    private function inserirCursosForm($form) {
        $element = $form->getElement(Application_Model_DbTable_Curso::getPrimaryKeyName());
        $modelCurso = new Application_Model_DbTable_Curso();
        $element->addMultiOptions($modelCurso->getIdsENomesTodosCursos());
        $form->addElement($element);
    }

    private function preencherCursos($idDisciplina) {
        $modelDisciplinaCurso = new Application_Model_DbTable_DisciplinaCurso();
        $listaCursos = $modelDisciplinaCurso->getIdCursos($idDisciplina);

        $cursos = array();
        $i = 0;
        foreach ($listaCursos as $item) {
            $cursos[$i] = $item['id_curso'];
            $i++;
        }
        return $cursos;
    }

}

