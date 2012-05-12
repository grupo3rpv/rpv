<?php

class Application_Model_DisciplinaTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testCadastroDisciplina() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $dados = array(
            'id_disciplina' => '23',
            'codigo' => 'Al0089',
            'nome' => 'Fisica',
            'ementa' => '..............',
            'carga_horaria' => '50h',
            'info_adicionais' => 'infoo',
            'id_curso' => array()
        );
        $id = $modelDisciplina->cadastraDisciplina($dados);

        $this->assertSame('23', $id);
    }

    public function testEditarDisciplina() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $dados = array(
            'id_disciplina' => '23',
            'codigo' => 'Al0089',
            'nome' => 'Biologia',
            'ementa' => '..............',
            'carga_horaria' => '40h',
            'info_adicionais' => 'blahhhhh',
            'id_curso' => array()
        );
        $id = $modelDisciplina->editarDisciplina($dados);
        $disciplinaAlterada = $modelDisciplina->find($id)->current();
        $this->assertSame('Biologia', $disciplinaAlterada->getNome());
    }

    public function testExcluirDisciplina() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $numLinhas = $modelDisciplina->removerDisciplina('23');
        $this->assertSame(1, $numLinhas);
    }

    public function testGetId_disciplina() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $disciplina = $modelDisciplina->createRow();
        $disciplina->setId_disciplina(2);
        $this->assertSame(2, $disciplina->getId_disciplina());
    }

    public function testGet_codigo() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $disciplina = $modelDisciplina->createRow();
        $disciplina->setCodigo(200);
        $this->assertSame(200, $disciplina->getCodigo());
    }

    public function testGet_nome() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $disciplina = $modelDisciplina->createRow();
        $disciplina->setNome('Teste');
        $this->assertSame('Teste', $disciplina->getNome());
    }

    public function testGet_ementa() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $disciplina = $modelDisciplina->createRow();
        $disciplina->setEmenta('Blahhhhhhhhhhhhhhhh');
        $this->assertSame('Blahhhhhhhhhhhhhhhh', $disciplina->getEmenta());
    }

    public function testGet_carga_horaria() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $disciplina = $modelDisciplina->createRow();
        $disciplina->setCarga_horaria('20h');
        $this->assertSame('20h', $disciplina->getCarga_horaria());
    }
    // forçando o erro
    public function testGet_carga_horaria_falha() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $disciplina = $modelDisciplina->createRow();
        $disciplina->setCarga_horaria('20h');
        $this->assertNotSame('10h', $disciplina->getCarga_horaria());
    }
    public function testGet_info_adicionais() {
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $disciplina = $modelDisciplina->createRow();
        $disciplina->setInfo_adicionais('');
        $this->assertSame('', $disciplina->getInfo_adicionais());
    }
    
    
}
