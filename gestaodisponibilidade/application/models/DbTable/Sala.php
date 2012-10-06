<?php

class Application_Model_DbTable_Sala extends Zend_Db_Table_Abstract {

    protected $_name = 'sala';
    protected $_rowClass = 'Application_Model_Sala';
    protected $_referenceMap = array(
        'SalaTipoSala' => array(
            'refTableClass' => 'Application_Model_DbTable_TipoSala',
            'columns' => array('id_categoria'),
            'refColumns' => 'id_categoria'
        ),
        'SalaEquipamentoSala' => array(
            'refTableClass' => 'Application_Model_DbTable_EquipamentoSala',
            'columns' => array('numero_sala'),
            'refColumns' => 'numero'
        )
    );

    public function cadastraSala($dados) {
        $sala = $this->createRow();
        /* @var $sala Application_Model_Sala */
        $sala->setNumero($dados['numero']);
        $sala->setDescricao($dados['descricao']);
        $sala->setCapacidade($dados['capacidade']);
        $sala->setCapacidade_desc($dados['capacidade_desc']);
        $sala->setInfo_adicionais($dados['info_adicionais']);
        $sala->setStatus_disponibilidade($dados['status_disponibilidade']);
        $sala->setId_tipo_sala($dados['id_tipo_sala']);
        $sala->setResponsavel($dados['responsavel']);

        $chave = $sala->save();

        $equipamentoSalaModel = new Application_Model_DbTable_EquipamentoSala();
        foreach ($dados['id_equipamento'] as $key => $value) {
            $equipamentoSalaModel->cadastraEquipamentoSala(array(
                'id_equipamento_sala' => $value, 'numero_sala' => $chave, 'quantidade' => 1));
        }

        return $chave;
    }

    public function buscaPor($alias, $value) {
        $select = $this->select()->where($alias . ' = ?', $value);
        return $this->fetchRow($select);
    }

    public function listaSalaPor($alias, $value) {
        $select = $this->select()->where($alias . ' = ?', $value);
        return $this->fetchAll($select);
    }

        public function listaSala() {
        $select = $this->select()->order('numero asc');
        return $this->fetchAll($select);
    }

    /**
     * Salva os dados no banco de dados. Ele faz um insert/update
     * inteligente, e recarrega as propriedades da tabela em caso
     * de sucesso.
     *
     * @param array $dados
     * @return mixed O valor da chave primária, caso seja chave
     * composta, retorna uma array associativa.
     * @see Zend_Db_Table_Abstract::save()
     */
    public function editarSala(array $dados) {
        $sala = $this->find($dados['numero'])->current();
        //var_dump($sala);die();
        /* @var $sala Application_Model_Sala */
        //$sala->setNumero($dados['numero']);
        $sala->setDescricao($dados['descricao']);
        $sala->setCapacidade($dados['capacidade']);
        $sala->setCapacidade_desc($dados['capacidade_desc']);
        $sala->setInfo_adicionais($dados['info_adicionais']);
        $sala->setStatus_disponibilidade($dados['status_disponibilidade']);
        $sala->setId_tipo_sala($dados['id_tipo_sala']);
        $sala->setResponsavel($dados['responsavel']);

        $chave = $sala->save();

        $equipamentoSalaModel = new Application_Model_DbTable_EquipamentoSala();
        $equipamentoSalaModel->removerEquipamentosDaSala($sala->getNumero());
        foreach ($dados['id_equipamento'] as $key => $value) {
            $equipamentoSalaModel->cadastraEquipamentoSala(array(
                'id_equipamento_sala' => $value, 'numero_sala' => $chave, 'quantidade' => 1));
        }

        return $chave;
    }

    public static function getPrimaryKeyName() {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        return $info['primary'][1];
    }
    
    public function removerSala($idSala, $numeroSala) {
        $equipamentoSala = new Application_Model_DbTable_EquipamentoSala();
        $equipamentoSala->removerEquipamentosDaSala($numeroSala);
        $sala = $this->find($idSala)->current();
        return $sala->delete();
    }

}

