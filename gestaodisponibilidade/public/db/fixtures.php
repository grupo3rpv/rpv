<?php

/**
 * Inserindo valores padrões
 */
echo 'Inserindo dados padrões' . BREAK_LINE;


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
    
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '3', 'numero_sala' => '3', 'quantidade' => '20'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '7', 'numero_sala' => '4', 'quantidade' => '10'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '4', 'numero_sala' => '5', 'quantidade' => '50'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '6', 'numero_sala' => '1', 'quantidade' => '30'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '4', 'numero_sala' => '2', 'quantidade' => '3'));
    
    /**
     * Insere valores na tabela area
     *  
     */
    $db->insert('area', array('nome' => 'Construção', 'descricao' => 'Construção de Software'));
    $db->insert('area', array('nome' => 'Modelagem e Projeto', 'descricao' => 'Modelagem e Projeto de Software'));
    $db->insert('area', array('nome' => 'Analise e Validação', 'descricao' => 'Analise e Validação de Software'));
    $db->insert('area', array('nome' => 'Qualidade de Software', 'descricao' => 'Qualidade de Software'));
    
    
    
    /**
     *  Insere valores na tabela curso 
     */
    
    $db->insert('curso', array('codigo' => '103441', 'nome' => 'Ciência da Computação'));
    $db->insert('curso', array('codigo' => '1103682', 'nome' => 'Engenharia Agrícola'));
    $db->insert('curso', array('codigo' => '103445', 'nome' => 'Engenharia Civil'));
    $db->insert('curso', array('codigo' => '1103689', 'nome' => 'Engenharia de Software'));
    $db->insert('curso', array('codigo' => '5000908', 'nome' => 'Engenharia de Telecomunicações'));
    $db->insert('curso', array('codigo' => '103447', 'nome' => 'Engenharia Elétrica'));
    $db->insert('curso', array('codigo' => '122050', 'nome' => 'Engenharia Mecânica'));
    
    /**
     *  Insere valores na tabela disciplina 
     */
    $db->insert('disciplina', array('nome' => 'Processo de Software', 'codigo' => 'AL0229', 'ementa' => 'Introdução ao Processo de Software. Modelos de ciclo de vida de desenvolvimento de software. Atividades de processo.', 'carga_horaria' => '30h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Qualidade de Software', 'codigo' => 'AL0230', 'ementa' => 'Histórico e conceitos sobre qualidade. Qualidade de processo e produto de software. Normas de qualidade de software.', 'carga_horaria' => '30h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'RPV', 'codigo' => 'AL0233', 'ementa' => 'Diferenciação entre métodos tradicionais e ágeis. Instaciação de processo de acordo com objetivos do projeto. Execução de processo de desenvolvimento de software.', 'carga_horaria' => '120h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Cáculo I ', 'codigo' => 'AL0001', 'ementa' => 'Noções básicas de conjuntos. A  reta real. Intervalos e desigualdades. Funções 
de uma variável. Limites. Continuidade. Derivadas.  Regras de derivação. Regra da 
cadeia. Derivação implícita. Diferencial. Regra de  L’Hôspital, máximos e mínimos e 
outras aplicações.', 'carga_horaria' => '60h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Física', 'codigo' => 'AL0003', 'ementa' => 'Movimento retilíneo. Movimento no plano. Leis de Newton. Trabalho e energia 
cinética. Energia potencial e conservação de energia. Quantidade de movimento linear e 
choques. Rotação de corpos rígidos. Gravitação.', 'carga_horaria' => '75h', 'info_adicionais' => ''));
    
    /**
     * Insere valores na tabela disciplina_curso 
     */
    
    $db->insert('disciplina_curso', array('id_curso' => '4', 'id_disciplina' => '1'));
    $db->insert('disciplina_curso', array('id_curso' => '4', 'id_disciplina' => '2'));
    $db->insert('disciplina_curso', array('id_curso' => '4', 'id_disciplina' => '3'));
    $db->insert('disciplina_curso', array('id_curso' => '6', 'id_disciplina' => '4'));
    $db->insert('disciplina_curso', array('id_curso' => '6', 'id_disciplina' => '5'));
    
        /**
         * Insere valores na tabela usuario 
         */
    $db->insert('usuario', array('nome' => 'Joelma', 'matricula' => '509840384'));
    $db->insert('usuario', array('nome' => 'Krug', 'matricula' => '38469624'));
    
endif;

if (APPLICATION_ENV == 'testing'):
    
    
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
    
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '3', 'numero_sala' => '3', 'quantidade' => '20'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '7', 'numero_sala' => '4', 'quantidade' => '10'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '4', 'numero_sala' => '5', 'quantidade' => '50'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '6', 'numero_sala' => '1', 'quantidade' => '30'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '4', 'numero_sala' => '2', 'quantidade' => '3'));
    
    /**
     * Insere valores na tabela area
     *  
     */
    $db->insert('area', array('nome' => 'Construção', 'descricao' => 'Construção de Software'));
    $db->insert('area', array('nome' => 'Modelagem e Projeto', 'descricao' => 'Modelagem e Projeto de Software'));
    $db->insert('area', array('nome' => 'Analise e Validação', 'descricao' => 'Analise e Validação de Software'));
    $db->insert('area', array('nome' => 'Qualidade de Software', 'descricao' => 'Qualidade de Software'));
    
    
    
    /**
     *  Insere valores na tabela curso 
     */
    
    $db->insert('curso', array('codigo' => '103441', 'nome' => 'Ciência da Computação'));
    $db->insert('curso', array('codigo' => '1103682', 'nome' => 'Engenharia Agrícola'));
    $db->insert('curso', array('codigo' => '103445', 'nome' => 'Engenharia Civil'));
    $db->insert('curso', array('codigo' => '1103689', 'nome' => 'Engenharia de Software'));
    $db->insert('curso', array('codigo' => '5000908', 'nome' => 'Engenharia de Telecomunicações'));
    $db->insert('curso', array('codigo' => '103447', 'nome' => 'Engenharia Elétrica'));
    $db->insert('curso', array('codigo' => '122050', 'nome' => 'Engenharia Mecânica'));
    
    /**
     *  Insere valores na tabela disciplina 
     */
    $db->insert('disciplina', array('nome' => 'Processo de Software', 'codigo' => 'AL0229', 'ementa' => 'Introdução ao Processo de Software. Modelos de ciclo de vida de desenvolvimento de software. Atividades de processo.', 'carga_horaria' => '30h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Qualidade de Software', 'codigo' => 'AL0230', 'ementa' => 'Histórico e conceitos sobre qualidade. Qualidade de processo e produto de software. Normas de qualidade de software.', 'carga_horaria' => '30h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'RPV', 'codigo' => 'AL0233', 'ementa' => 'Diferenciação entre métodos tradicionais e ágeis. Instaciação de processo de acordo com objetivos do projeto. Execução de processo de desenvolvimento de software.', 'carga_horaria' => '120h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Cáculo I ', 'codigo' => 'AL0001', 'ementa' => 'Noções básicas de conjuntos. A  reta real. Intervalos e desigualdades. Funções 
de uma variável. Limites. Continuidade. Derivadas.  Regras de derivação. Regra da 
cadeia. Derivação implícita. Diferencial. Regra de  L’Hôspital, máximos e mínimos e 
outras aplicações.', 'carga_horaria' => '60h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Física', 'codigo' => 'AL0003', 'ementa' => 'Movimento retilíneo. Movimento no plano. Leis de Newton. Trabalho e energia 
cinética. Energia potencial e conservação de energia. Quantidade de movimento linear e 
choques. Rotação de corpos rígidos. Gravitação.', 'carga_horaria' => '75h', 'info_adicionais' => ''));
    
    /**
     * Insere valores na tabela disciplina_curso 
     */
    
    $db->insert('disciplina_curso', array('id_curso' => '4', 'id_disciplina' => '1'));
    $db->insert('disciplina_curso', array('id_curso' => '4', 'id_disciplina' => '2'));
    $db->insert('disciplina_curso', array('id_curso' => '4', 'id_disciplina' => '3'));
    $db->insert('disciplina_curso', array('id_curso' => '6', 'id_disciplina' => '4'));
    $db->insert('disciplina_curso', array('id_curso' => '6', 'id_disciplina' => '5'));
    
endif;