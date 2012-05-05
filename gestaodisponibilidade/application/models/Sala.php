<?php

class Application_Model_Sala extends Zend_Db_Table_Row_Abstract {

//  private $numero;
//  private $descricao;
//  private $capacidade;
//  private $capacidade_desc;
//  private $responsavel;
//  private $status_disponibilidade;
//  private $info_adicionais;
//  private $id_tipo_sala;

    public function getId_tipo_sala() {
        return $this->id_tipo_sala;
    }

    public function setId_tipo_sala($id_tipo_sala) {
        $this->id_tipo_sala = $id_tipo_sala;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getCapacidade() {
        return $this->capacidade;
    }

    public function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }

    public function getCapacidade_desc() {
        return $this->capacidade_desc;
    }

    public function setCapacidade_desc($capacidade_desc) {
        $this->capacidade_desc = $capacidade_desc;
    }

    public function getResponsavel() {
        return $this->responsavel;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    public function getStatus_disponibilidade() {
        if ($this->status_disponibilidade == '1' || $this->status_disponibilidade == true) {
            return 'Disponivel';
        }
        return 'Indisponivel';
    }

    public function setStatus_disponibilidade($status_disponibilidade) {
        $this->status_disponibilidade = $status_disponibilidade;
    }

    public function getInfo_adicionais() {
        return $this->info_adicionais;
    }

    public function setInfo_adicionais($info_adicionais) {
        $this->info_adicionais = $info_adicionais;
    }

}

