<?php

/**
 * Description of Usuario
 *
 * @author Helison
 */
class Application_Model_DbTable_Usuario extends Zend_Db_Table_Abstract {

    protected $_name = 'usuario';
    protected $_rowClass = 'Application_Model_Usuario';
    protected $_dependentTables = array('Application_Model_DbTable_EventoUsuario');
    protected $_referenceMap = array(
        'UsuarioDisciplina' => array(
            'refTableClass' => 'Application_Model_DbTable_Disciplina',
            'columns' => array('idDisciplina'),
            'refColumns' => 'id_disciplina'
        ),
        'UsuarioNivelInteresse' => array(
            'refTableClass' => 'Application_Model_DbTable_NivelInteresse',
            'columns' => array('idInteresse'),
            'refColumns' => 'id_nivelInteresse'
        )
    );

    public function cadastrarUsuario($dados) {
        $usuario = $this->createRow();
        /* @var $usuario Application_Model_Usuario */
        $usuario->setId_usuario($dados['id_usuario']);
        $usuario->setNome($dados['nome']);
        $usuario->setMatricula($dados['matricula']);
       // $usuario->setEmail($email)
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

    public function buscarUsuarioPor($alias, $value) {
        $select = $this->select()->where($alias . ' = ?', $value);
        return $this->fetchRow($select);
    }

    public function listaUsuarioPor($alias, $value) {
        $select = $this->select()->where($alias . ' = ?', $value);
        return $this->fetchAll($select);
    }

    public function removerUsuario($id_usuario) {
        $usuario = $this->find($id_usuario)->current();
        return $usuario->delete();
    }

    public function listaUsuario() {
        $select = $this->select()->order('id_usuario asc');
        return $this->fetchAll($select);
    }

    public static function getPrimaryKeyName() {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        return $info['primary'][1];
    }
        public static function getValuesToSelectElement($order = 'nome asc') {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        $select = $model->select()->order($order);
        $result = $model->fetchAll($select);
        $resultArray = array();
        foreach ($result as $row):
            $resultArray[$row->$info['primary'][1]] = $row->nome;
        endforeach;
        return $resultArray;
    }


}
