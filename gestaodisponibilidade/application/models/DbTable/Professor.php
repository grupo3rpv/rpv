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

    public function cadastrarUsuario($dados) {
        $usuario = $this->createRow();
        /* @var $usuario Application_Model_Usuario */
        $usuario->setId_usuario($dados['id_usuario']);
        $usuario->setNome($dados['nome']);
        $usuario->setMatricula($dados['matricula']);

        $chave = $usuario->save();


        $nivelInteresseUsuarioModel = new Application_Model_DbTable_NivelInteresse();
        foreach ($dados['id_usuario'] as $key => $value) {
            $$nivelInteresseUsuarioModel->cadastraNivelInteresse(array(
                'id_nivelInteresse' => $value, 'idInteresse' => $chave, 'nivelInteresse' => 1));
        }

        return $chave;
    }

    public function editarUsuario(array $dados) {
        $usuario = $this->find($dados['id_usuario'])->current();
        /* @var $usuario Application_Model_Sala */
        //$usuario->setNumero($dados['numero']);
        $usuario->setNome($dados['nome']);
        $usuario->setMatricula($dados['matricula']);


        $chave = $usuario->save();

        $nivelInteresseUsuarioModel = new Application_Model_DbTable_NivelInteresse();
        $nivelInteresseUsuarioModel->removerNivelInteresse($usuario->getId_usuario());
        foreach ($dados['id_disciplina'] as $key => $value) {
            $nivelInteresseUsuarioModel->cadastraNivelInteresse(array(
                'id_nivelInteresse' => $value, 'idInteresse' => $chave, 'nivelInteresse' => 1));
        }

        return $chave;
    }

}