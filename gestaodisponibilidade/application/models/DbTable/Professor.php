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
    protected $_rowClass = 'Application_Model_Usuario';
     protected $_name = 'usuario';

    public function cadastrarProfessor($dados) {
        $usuario = $this->createRow();
        /* @var $usuario Application_Model_Usuario */
        $usuario->setId_usuario($dados['id_usuario']);
        $usuario->setNome($dados['nome']);
        $usuario->setMatricula($dados['matricula']);

        return $usuario->save();
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
        return parent::removerUsuario($id_professor);
    }
    
    public function listaProfessorPorID($id) {
        $select = $this->select()->where('id_usuario =?',$id);
        return $this->fetchRow($select);
    }
}