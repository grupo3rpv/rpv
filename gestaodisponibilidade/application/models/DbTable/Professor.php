<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professor
 *
 * @author Helison
 */
class Application_Model_DbTable_Professor extends Application_Model_DbTable_Usuario {
    protected $_rowClass = 'Application_Model_Professor';
     protected $_name = 'usuario';

    public function cadastrarProfessor($dados) {
        $usuario = $this->createRow();
        /* @var $usuario Application_Model_Usuario */
        $usuario->setId_usuario($dados['id_usuario']);
        $usuario->setNome($dados['nome']);
        $usuario->setMatricula($dados['matricula']);

        $chave = $usuario->save();

        $areaProfessorModel = new Application_Model_DbTable_AreaProfessor();
        $this->cadastrarAreaProfessor($dados, $areaProfessorModel, $chave);

        return $chave;
    }

    public function editarProfessor(array $dados) {
        $usuario = $this->find($dados['id_usuario'])->current();
        /* @var $usuario Application_Model_Sala */
        //$usuario->setNumero($dados['numero']);
        $usuario->setNome($dados['nome']);
        $usuario->setMatricula($dados['matricula']);
        
        return $usuario->save();
    }
    
    public function removerProfessor($id_professor) {
        $this->removerAreasDoProfessor(new Application_Model_DbTable_AreaProfessor(), $id_professor);
        return parent::removerUsuario($id_professor);
    }
    
    public function listaProfessorPorID($id) {
        $select = $this->select()->where('id_usuario =?',$id);
        return $this->fetchRow($select);
    }
    
    private function cadastrarAreaProfessor($dados, Application_Model_DbTable_AreaProfessor $areaProfessorModel, $chave) {
        foreach ($dados['id_area_professor'] as $value) {
            $areaProfessorModel->cadastraAreaProfessor(array(
                'id_area' => $value, 'id_professor' => $chave));
        }
    }

    private function removerAreasDoProfessor(Application_Model_DbTable_AreaProfessor $areaProfessorModel, $id_professor) {
        $areaProfessorModel->removerAreasProfessor($id_professor);
    }
    
}