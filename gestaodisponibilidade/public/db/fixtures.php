<?php

/**
 * Inserindo valores padrões
 */
echo 'Inserindo dados padrões' . BREAK_LINE;

/**
 * Insere valores na tabela tipo_pessoa 
 */
//$db->insert('tipo_pessoa', array('tipo' => 'Administrador', 'alias' => 'administrador'));
//$db->insert('tipo_pessoa', array('tipo' => 'Cliente', 'alias' => 'cliente'));
//
//$db->insert('pessoa', array('nome' => 'Admin', 'email' => 'admin@admin.com', 'senha' => hash('sha256', APP_SALT . 'admin'), 'id_tipo_pessoa' => '1', 'email_confirmado' => true));

if (APPLICATION_ENV == 'development' || APPLICATION_ENV == 'staging'):

    /**
     * Insere valores na tabela tipo_sala
     */
    $db->insert('tipo_sala', array('descricao' => 'Laboratório'));
    $db->insert('tipo_sala', array('descricao' => 'Sala Comum'));
    $db->insert('tipo_sala', array('descricao' => 'Sala dos Professores'));
    $db->insert('tipo_sala', array('descricao' => 'Sala Administrativa'));
    
    /*
     * Insere valores na tabela sala
     */
    $db->insert('sala', array('numero' => '1', 'descricao' => 'Lab 1', 'capacidade' => '60', 'capacidade_desc' => 'Pessoas', 'responsavel' => 'Ze', 'status_disponibilidade' => '1', 'info_adicionais' => '', 'id_tipo_sala' => '1'));
    $db->insert('sala', array('numero' => '2','descricao' => 'Lab 2', 'capacidade' => '50', 'capacidade_desc' => 'Pessoas', 'responsavel' => 'Antonio', 'status_disponibilidade' => '1', 'info_adicionais' => 'Sala pra uso exclusivo de computadores', 'id_tipo_sala' => '1'));
    $db->insert('sala', array('numero' => '3','descricao' => 'Sala 203', 'capacidade' => '6', 'capacidade_desc' => 'Pessoas', 'responsavel' => '', 'status_disponibilidade' => '0', 'info_adicionais' => '', 'id_tipo_sala' => '3'));
    $db->insert('sala', array('numero' => '4','descricao' => 'Sala 302', 'capacidade' => '40', 'capacidade_desc' => 'Cadeiras', 'responsavel' => 'nenhum', 'status_disponibilidade' => '1', 'info_adicionais' => 'sala para alunos', 'id_tipo_sala' => '2'));
    $db->insert('sala', array('numero' => '5','descricao' => 'Administração', 'capacidade' => '5', 'capacidade_desc' => 'Pessoas', 'responsavel' => 'Alberto', 'status_disponibilidade' => '0', 'info_adicionais' => '', 'id_tipo_sala' => '4'));
    

    /**
     *  Insere valores na tabela equipamento 
     */
    
    $db->insert('equipamento', array('descricao' => 'Notebook'));
    $db->insert('equipamento', array('descricao' => 'Computador'));
    $db->insert('equipamento', array('descricao' => 'Cadeira giratória'));
    $db->insert('equipamento', array('descricao' => 'Carteira'));
    $db->insert('equipamento', array('descricao' => 'Mesa de professor'));
    $db->insert('equipamento', array('descricao' => 'Lousa'));
    
    /**
     * Insere valores na tabela equipamento-sala 
     */
    
//    $db->insert('equipamento_sala', array('numero_sala' => '1', 'quantidade' => '20'));
//    $db->insert('equipamento_sala', array('numero_sala' => '2', 'quantidade' => '10'));
//    $db->insert('equipamento_sala', array('numero_sala' => '3', 'quantidade' => '50'));
//    $db->insert('equipamento_sala', array('numero_sala' => '4', 'quantidade' => '30'));
//    $db->insert('equipamento_sala', array('numero_sala' => '5', 'quantidade' => '3'));
    
    
    
endif;

if (APPLICATION_ENV == 'testing'):
    //$db->insert('fabricante', array('nome' => 'Johnson & Johnson'));
    
endif;