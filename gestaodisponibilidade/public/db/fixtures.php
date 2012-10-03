<?php

/**
 * Inserindo valores padrões
 */
echo 'Inserindo dados padrões' . BREAK_LINE;


if (APPLICATION_ENV == 'development' || APPLICATION_ENV == 'staging'):

    /**
     * Insere valores na tabela tipo_sala
     */
    $db->insert('tipo_sala', array('descricao' => 'Laboratório de Informática'));
    $db->insert('tipo_sala', array('descricao' => 'Laboratório de Física'));
    $db->insert('tipo_sala', array('descricao' => 'Laboratório de Eletrotécnica'));
    $db->insert('tipo_sala', array('descricao' => 'Sala Comum'));
    $db->insert('tipo_sala', array('descricao' => 'Sala dos Professores'));
    $db->insert('tipo_sala', array('descricao' => 'Sala Administrativa'));

    /*
     * Insere valores na tabela sala
     */
    $db->insert('sala', array('numero' => '212', 'descricao' => 'Laboratório de Informática 1', 'capacidade' => '48', 'capacidade_desc' => 'pessoas', 'responsavel' => 'Rudi', 'status_disponibilidade' => '1', 'info_adicionais' => '', 'id_tipo_sala' => '1'));
    $db->insert('sala', array('numero' => '210', 'descricao' => 'Laboratório de Informática 2', 'capacidade' => '48', 'capacidade_desc' => 'pessoas', 'responsavel' => 'Rudi', 'status_disponibilidade' => '1', 'info_adicionais' => 'Sala pra uso exclusivo de computadores', 'id_tipo_sala' => '1'));
    $db->insert('sala', array('numero' => '203', 'descricao' => 'Sala 203', 'capacidade' => '60', 'capacidade_desc' => 'pessoas', 'responsavel' => 'Juliana', 'status_disponibilidade' => '0', 'info_adicionais' => 'Exclusiva para aulas', 'id_tipo_sala' => '4'));
    $db->insert('sala', array('numero' => '312', 'descricao' => 'Sala 312', 'capacidade' => '10', 'capacidade_desc' => 'pessoas', 'responsavel' => 'Cléo Billa', 'status_disponibilidade' => '0', 'info_adicionais' => 'Sala dos professores', 'id_tipo_sala' => '5'));
    $db->insert('sala', array('numero' => '116', 'descricao' => 'Secretaria Acadêmica', 'capacidade' => '10', 'capacidade_desc' => 'pessoas', 'responsavel' => 'Maria Cristina', 'status_disponibilidade' => '0', 'info_adicionais' => '', 'id_tipo_sala' => '6'));

    /**
     *  Insere valores na tabela equipamento 
     */
    $db->insert('equipamento', array('descricao' => 'Notebook'));
    $db->insert('equipamento', array('descricao' => 'Computador de mesa'));
    $db->insert('equipamento', array('descricao' => 'Cadeira giratória'));
    $db->insert('equipamento', array('descricao' => 'Cadeira comum'));
    $db->insert('equipamento', array('descricao' => 'Classe'));
    $db->insert('equipamento', array('descricao' => 'Mesa tipo Ilha'));
    $db->insert('equipamento', array('descricao' => 'Mesa de professor'));
    $db->insert('equipamento', array('descricao' => 'Lousa'));

    /**
     * Insere valores na tabela equipamento-sala 
     */
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '4', 'numero_sala' => '212', 'quantidade' => '24'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '5', 'numero_sala' => '212', 'quantidade' => '48'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '9', 'numero_sala' => '212', 'quantidade' => '1'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '4', 'numero_sala' => '210', 'quantidade' => '24'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '5', 'numero_sala' => '210', 'quantidade' => '48'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '9', 'numero_sala' => '210', 'quantidade' => '1'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '10', 'numero_sala' => '203', 'quantidade' => '1'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '6', 'numero_sala' => '203', 'quantidade' => '60'));

    /**
     * Insere valores na tabela area
     */
    $db->insert('area', array('nome' => 'Banco de Dados', 'descricao' => 'Banco de Dados'));
    $db->insert('area', array('nome' => 'Engenharia de Software', 'descricao' => 'Engenharia de Software'));
    $db->insert('area', array('nome' => 'Linguagens de Programação', 'descricao' => 'Linguagens de Programação'));
    $db->insert('area', array('nome' => 'Processamento Gráfico', 'descricao' => 'Processamento Gráfico'));
    $db->insert('area', array('nome' => 'Sistemas de Informação', 'descricao' => 'Sistemas de Informação'));
    $db->insert('area', array('nome' => 'Arquitetura de Sistemas de Computação', 'descricao' => 'Arquitetura de Sistemas de Computação'));
    $db->insert('area', array('nome' => 'Linguagens Formais e Autômatos', 'descricao' => 'Linguagens Formais e Autômatos'));
    $db->insert('area', array('nome' => 'Computabilidade e Modelos de Computação', 'descricao' => 'Computabilidade e Modelos de Computação'));

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
    $db->insert('disciplina', array('nome' => 'Banco de Dados', 'codigo' => 'AL0208', 'ementa' => 'Fundamentos de banco de dados, Etapas do projeto de banco de dados: modelagem conceitual, Projeto lógico, Transformação entre modelos. Modelo relacional, SQL, Normalização. Introdução a UML, teoria e metodologia de projeto de banco de dados, Álgebra relacional.', 'carga_horaria' => '60h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Processo de Software', 'codigo' => 'AL0229', 'ementa' => 'Introdução ao Processo de Software. Modelos de ciclo de vida de desenvolvimento de software. Atividades de processo.', 'carga_horaria' => '30h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Qualidade de Software', 'codigo' => 'AL0230', 'ementa' => 'Histórico e conceitos sobre qualidade. Qualidade de processo e produto de software. Normas de qualidade de software.', 'carga_horaria' => '30h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Resolução de Problemas V', 'codigo' => 'AL0233', 'ementa' => 'Diferenciação entre métodos tradicionais e ágeis. Instaciação de processo de acordo com objetivos do projeto. Execução de processo de desenvolvimento de software.', 'carga_horaria' => '120h', 'info_adicionais' => ''));
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
    $db->insert('disciplina_curso', array('id_curso' => '4', 'id_disciplina' => '4'));
    $db->insert('disciplina_curso', array('id_curso' => '6', 'id_disciplina' => '5'));
    $db->insert('disciplina_curso', array('id_curso' => '6', 'id_disciplina' => '6'));

    /**
     * Insere valores na tabela tipo_usuario
     */
    /*$db->insert('tipo_usuario', array('id_tipo_usuario' => '1', 'nome' => 'Professor'));
    $db->insert('tipo_usuario', array('id_tipo_usuario' => '2', 'nome' => 'Coordenador'));*/

    /**
     * Insere valores na tabela usuario 
     */
    $db->insert('usuario', array('nome' => 'Sergio Mergen', 'matricula' => '123456', 'email' => 'helisonreus@gmail.com', 'senha' => '1234567', 'tipo_usuario' => 'professor'));
    $db->insert('usuario', array('nome' => 'João Pablo', 'matricula' => '654321', 'email' => 'thiagockrug@gmail.com', 'senha' => '1234567', 'tipo_usuario' => 'professor'));
    $db->insert('usuario', array('nome' => 'Aline Melo', 'matricula' => '9812749', 'email' => 'brunovicellisax@gmail.com', 'senha' => '1234567', 'tipo_usuario' => 'professor'));
    $db->insert('usuario', array('nome' => 'Cleo Billa', 'matricula' => '346320', 'email' => 'marcelomaialopes@yahoo.com.br', 'senha' => '1234567', 'tipo_usuario' => 'coordenador'));
    $db->insert('usuario', array('nome' => 'Rudi Porto', 'matricula' => '3978452', 'email' => 'helisonrt@gmail.com', 'senha' => '1234567', 'tipo_usuario' => 'secretario'));

    /**
     * Insere valores na tabela area_professor 
     */
    $db->insert('area_professor', array('id_area' => '1', 'id_professor' => '1'));
    $db->insert('area_professor', array('id_area' => '2', 'id_professor' => '1'));
    $db->insert('area_professor', array('id_area' => '3', 'id_professor' => '1'));
    $db->insert('area_professor', array('id_area' => '2', 'id_professor' => '2'));
    $db->insert('area_professor', array('id_area' => '7', 'id_professor' => '2'));

    /**
     * Insere valores na tabela nivel_interesse
     */
    $db->insert('nivel_interesse', array('id_professor' => '1', 'id_disciplina' => '1', 'nivel_interesse' => '5'));
    $db->insert('nivel_interesse', array('id_professor' => '1', 'id_disciplina' => '4', 'nivel_interesse' => '4'));
    $db->insert('nivel_interesse', array('id_professor' => '2', 'id_disciplina' => '4', 'nivel_interesse' => '4'));
    $db->insert('nivel_interesse', array('id_professor' => '2', 'id_disciplina' => '2', 'nivel_interesse' => '5'));

    /**
     * Insere valores na tabela evento 
     */
    $mes = date('m');
    $dia = date('d');
    $ano = date('Y');
    $hoje = $ano . '-' . $mes . '-' . $dia;
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '07:00:00', 'hora2' => '10:00:00', 'titulo' => 'Apresentação de TCC', 'privado' => '1'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '13:00:00', 'hora2' => '16:00:00', 'titulo' => 'Orientação de RP', 'privado' => '0'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '09:00:00', 'hora2' => '12:00:00', 'titulo' => 'Apresentação de trabalho', 'privado' => '1'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '14:00:00', 'hora2' => '20:00:00', 'titulo' => 'Aula', 'privado' => '0'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '21:00:00', 'hora2' => '22:00:00', 'titulo' => 'Pesquisa', 'privado' => '1'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '20:00:00', 'hora2' => '21:30:00', 'titulo' => 'Orientação TCC', 'privado' => '0'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '09:00:00', 'hora2' => '12:30:00', 'titulo' => 'Aula de Redes', 'privado' => '0'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '14:00:00', 'hora2' => '16:30:00', 'titulo' => 'Prova Eng Software', 'privado' => '0'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '18:00:00', 'hora2' => '20:00:00', 'titulo' => 'Aula POO', 'privado' => '1'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '21:30:00', 'hora2' => '23:00:00', 'titulo' => 'Pesquisa Java', 'privado' => '0'));

    /**
     * Insere os valores na tabela evento_usuario
     */
    $db->insert('evento_usuario', array('id_evento' => '1', 'id_professor' => '1', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '2', 'id_professor' => '1', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '3', 'id_professor' => '1', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '4', 'id_professor' => '2', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '5', 'id_professor' => '2', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '6', 'id_professor' => '2', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '7', 'id_professor' => '3', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '8', 'id_professor' => '3', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '9', 'id_professor' => '4', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '10', 'id_professor' => '4', 'convite' => 'proprietario'));

    /**
     * Insere os valores na tabela turma 
     */
    $db->insert('turma', array('nome' => '1º Semestre'));
    $db->insert('turma', array('nome' => '2º Semestre'));
    $db->insert('turma', array('nome' => '3º Semestre'));
    $db->insert('turma', array('nome' => '4º Semestre'));
    $db->insert('turma', array('nome' => '5º Semestre'));
    $db->insert('turma', array('nome' => '6º Semestre'));
    $db->insert('turma', array('nome' => '7º Semestre'));
    $db->insert('turma', array('nome' => '8º Semestre'));
    $db->insert('turma', array('nome' => '9º Semestre'));
    $db->insert('turma', array('nome' => '10º Semestre'));
    $db->insert('turma', array('nome' => '11º Semestre'));
    $db->insert('turma', array('nome' => '12º Semestre'));

    /**
     * Insere valores na tabela periodo_letivo 
     */
    $db->insert('periodo_letivo', array('nome' => '2010/1'));
    $db->insert('periodo_letivo', array('nome' => '2010/2'));
    $db->insert('periodo_letivo', array('nome' => '2011/1'));
    $db->insert('periodo_letivo', array('nome' => '2011/2'));
    $db->insert('periodo_letivo', array('nome' => '2012/1'));
    $db->insert('periodo_letivo', array('nome' => '2012/2'));
    $db->insert('periodo_letivo', array('nome' => '2013/1'));
    $db->insert('periodo_letivo', array('nome' => '2013/2'));


    /**
     * Insere valores na tabela horario 
     */
    $mes = date('m');
    $dia = date('d');
    $ano = date('Y');
    $hoje = $ano . '-' . $mes . '-' . $dia;
    $db->insert('horario', array('id_turma' => '5', 'id_periodo_letivo' => '5', 'id_disciplina_curso' => '1', 'status' => '1', 'dia' => $hoje, 'hora_inicial' => '07:30:00', 'hora_final' => '11:30:00'));
    $db->insert('horario', array('id_turma' => '5', 'id_periodo_letivo' => '5', 'id_disciplina_curso' => '2', 'status' => '1', 'dia' => $hoje, 'hora_inicial' => '13:30:00', 'hora_final' => '14:30:00'));
    $db->insert('horario', array('id_turma' => '5', 'id_periodo_letivo' => '5', 'id_disciplina_curso' => '3', 'status' => '1', 'dia' => $hoje, 'hora_inicial' => '18:30:00', 'hora_final' => '20:30:00'));


    /**
     * Insere valores na tabela horario_professor 
     */
    $db->insert('horario_professor', array('id_professor' => '1', 'id_horario' => '1'));
    $db->insert('horario_professor', array('id_professor' => '2', 'id_horario' => '2'));
    $db->insert('horario_professor', array('id_professor' => '3', 'id_horario' => '3'));

    /**
     * Insere valores na tabela disponibilidade_aula
     */
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'terca', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quarta', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quinta', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sexta', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sabado', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '08:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '09:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '10:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '11:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '12:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '14:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '13:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '15:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '17:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '16:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '18:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '19:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '20:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '21:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'terca', 'hora' => '09:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quarta', 'hora' => '10:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quinta', 'hora' => '11:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sexta', 'hora' => '13:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sabado', 'hora' => '14:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sexta', 'hora' => '15:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quinta', 'hora' => '16:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quarta', 'hora' => '17:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'terca', 'hora' => '18:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quarta', 'hora' => '19:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quinta', 'hora' => '20:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sexta', 'hora' => '21:30', 'id_usuario' => '1'));


endif;

if (APPLICATION_ENV == 'testing'):

    /**
     * Insere valores na tabela tipo_sala
     */
    $db->insert('tipo_sala', array('descricao' => 'Laboratório de Informática'));
    $db->insert('tipo_sala', array('descricao' => 'Laboratório de Física'));
    $db->insert('tipo_sala', array('descricao' => 'Laboratório de Eletrotécnica'));
    $db->insert('tipo_sala', array('descricao' => 'Sala Comum'));
    $db->insert('tipo_sala', array('descricao' => 'Sala dos Professores'));
    $db->insert('tipo_sala', array('descricao' => 'Sala Administrativa'));

    /*
     * Insere valores na tabela sala
     */
    $db->insert('sala', array('numero' => '212', 'descricao' => 'Laboratório de Informática 1', 'capacidade' => '48', 'capacidade_desc' => 'pessoas', 'responsavel' => 'Rudi', 'status_disponibilidade' => '1', 'info_adicionais' => '', 'id_tipo_sala' => '1'));
    $db->insert('sala', array('numero' => '210', 'descricao' => 'Laboratório de Informática 2', 'capacidade' => '48', 'capacidade_desc' => 'pessoas', 'responsavel' => 'Rudi', 'status_disponibilidade' => '1', 'info_adicionais' => 'Sala pra uso exclusivo de computadores', 'id_tipo_sala' => '1'));
    $db->insert('sala', array('numero' => '203', 'descricao' => 'Sala 203', 'capacidade' => '60', 'capacidade_desc' => 'pessoas', 'responsavel' => 'Juliana', 'status_disponibilidade' => '0', 'info_adicionais' => 'Exclusiva para aulas', 'id_tipo_sala' => '4'));
    $db->insert('sala', array('numero' => '312', 'descricao' => 'Sala 312', 'capacidade' => '10', 'capacidade_desc' => 'pessoas', 'responsavel' => 'Cléo Billa', 'status_disponibilidade' => '0', 'info_adicionais' => 'Sala dos professores', 'id_tipo_sala' => '5'));
    $db->insert('sala', array('numero' => '116', 'descricao' => 'Secretaria Acadêmica', 'capacidade' => '10', 'capacidade_desc' => 'pessoas', 'responsavel' => 'Maria Cristina', 'status_disponibilidade' => '0', 'info_adicionais' => '', 'id_tipo_sala' => '6'));

    /**
     *  Insere valores na tabela equipamento 
     */
    $db->insert('equipamento', array('descricao' => 'Notebook'));
    $db->insert('equipamento', array('descricao' => 'Computador de mesa'));
    $db->insert('equipamento', array('descricao' => 'Cadeira giratória'));
    $db->insert('equipamento', array('descricao' => 'Cadeira comum'));
    $db->insert('equipamento', array('descricao' => 'Classe'));
    $db->insert('equipamento', array('descricao' => 'Mesa tipo Ilha'));
    $db->insert('equipamento', array('descricao' => 'Mesa de professor'));
    $db->insert('equipamento', array('descricao' => 'Lousa'));

    /**
     * Insere valores na tabela equipamento-sala 
     */
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '4', 'numero_sala' => '212', 'quantidade' => '24'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '5', 'numero_sala' => '212', 'quantidade' => '48'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '9', 'numero_sala' => '212', 'quantidade' => '1'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '4', 'numero_sala' => '210', 'quantidade' => '24'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '5', 'numero_sala' => '210', 'quantidade' => '48'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '9', 'numero_sala' => '210', 'quantidade' => '1'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '10', 'numero_sala' => '203', 'quantidade' => '1'));
    $db->insert('equipamento_sala', array('id_equipamento_sala' => '6', 'numero_sala' => '203', 'quantidade' => '60'));

    /**
     * Insere valores na tabela area
     */
    $db->insert('area', array('nome' => 'Banco de Dados', 'descricao' => 'Banco de Dados'));
    $db->insert('area', array('nome' => 'Engenharia de Software', 'descricao' => 'Engenharia de Software'));
    $db->insert('area', array('nome' => 'Linguagens de Programação', 'descricao' => 'Linguagens de Programação'));
    $db->insert('area', array('nome' => 'Processamento Gráfico', 'descricao' => 'Processamento Gráfico'));
    $db->insert('area', array('nome' => 'Sistemas de Informação', 'descricao' => 'Sistemas de Informação'));
    $db->insert('area', array('nome' => 'Arquitetura de Sistemas de Computação', 'descricao' => 'Arquitetura de Sistemas de Computação'));
    $db->insert('area', array('nome' => 'Linguagens Formais e Autômatos', 'descricao' => 'Linguagens Formais e Autômatos'));
    $db->insert('area', array('nome' => 'Computabilidade e Modelos de Computação', 'descricao' => 'Computabilidade e Modelos de Computação'));

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
    $db->insert('disciplina', array('nome' => 'Banco de Dados', 'codigo' => 'AL0208', 'ementa' => 'Fundamentos de banco de dados, Etapas do projeto de banco de dados: modelagem conceitual, Projeto lógico, Transformação entre modelos. Modelo relacional, SQL, Normalização. Introdução a UML, teoria e metodologia de projeto de banco de dados, Álgebra relacional.', 'carga_horaria' => '60h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Processo de Software', 'codigo' => 'AL0229', 'ementa' => 'Introdução ao Processo de Software. Modelos de ciclo de vida de desenvolvimento de software. Atividades de processo.', 'carga_horaria' => '30h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Qualidade de Software', 'codigo' => 'AL0230', 'ementa' => 'Histórico e conceitos sobre qualidade. Qualidade de processo e produto de software. Normas de qualidade de software.', 'carga_horaria' => '30h', 'info_adicionais' => ''));
    $db->insert('disciplina', array('nome' => 'Resolução de Problemas V', 'codigo' => 'AL0233', 'ementa' => 'Diferenciação entre métodos tradicionais e ágeis. Instaciação de processo de acordo com objetivos do projeto. Execução de processo de desenvolvimento de software.', 'carga_horaria' => '120h', 'info_adicionais' => ''));
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
    $db->insert('disciplina_curso', array('id_curso' => '4', 'id_disciplina' => '4'));
    $db->insert('disciplina_curso', array('id_curso' => '6', 'id_disciplina' => '5'));
    $db->insert('disciplina_curso', array('id_curso' => '6', 'id_disciplina' => '6'));

    /**
     * Insere valores na tabela tipo_usuario
     */
    /*$db->insert('tipo_usuario', array('id_tipo_usuario' => '1', 'nome' => 'Professor'));
    $db->insert('tipo_usuario', array('id_tipo_usuario' => '2', 'nome' => 'Coordenador'));*/

    /**
     * Insere valores na tabela usuario 
     */
    $db->insert('usuario', array('nome' => 'Sergio Mergen', 'matricula' => '123456', 'email' => 'helisonreus@gmail.com', 'senha' => '1234567', 'tipo_usuario' => 'professor'));
    $db->insert('usuario', array('nome' => 'João Pablo', 'matricula' => '654321', 'email' => 'thiagockrug@gmail.com', 'senha' => '1234567', 'tipo_usuario' => 'professor'));
    $db->insert('usuario', array('nome' => 'Aline Melo', 'matricula' => '9812749', 'email' => 'brunovicellisax@gmail.com', 'senha' => '1234567', 'tipo_usuario' => 'professor'));
    $db->insert('usuario', array('nome' => 'Cleo Billa', 'matricula' => '346320', 'email' => 'marcelomaialopes@yahoo.com.br', 'senha' => '1234567', 'tipo_usuario' => 'coordenador'));
    $db->insert('usuario', array('nome' => 'Rudi Porto', 'matricula' => '3978452', 'email' => 'helisonrt@hotmail.com', 'senha' => '1234567', 'tipo_usuario' => 'secretario'));

    /**
     * Insere valores na tabela area_professor 
     */
    $db->insert('area_professor', array('id_area' => '1', 'id_professor' => '1'));
    $db->insert('area_professor', array('id_area' => '2', 'id_professor' => '1'));
    $db->insert('area_professor', array('id_area' => '3', 'id_professor' => '1'));
    $db->insert('area_professor', array('id_area' => '2', 'id_professor' => '2'));
    $db->insert('area_professor', array('id_area' => '7', 'id_professor' => '2'));

    /**
     * Insere valores na tabela nivel_interesse
     */
    $db->insert('nivel_interesse', array('id_professor' => '1', 'id_disciplina' => '1', 'nivel_interesse' => '5'));
    $db->insert('nivel_interesse', array('id_professor' => '1', 'id_disciplina' => '4', 'nivel_interesse' => '4'));
    $db->insert('nivel_interesse', array('id_professor' => '2', 'id_disciplina' => '4', 'nivel_interesse' => '4'));
    $db->insert('nivel_interesse', array('id_professor' => '2', 'id_disciplina' => '2', 'nivel_interesse' => '5'));

    /**
     * Insere valores na tabela evento 
     */
    $mes = date('m');
    $dia = date('d');
    $ano = date('Y');
    $hoje = $ano . '-' . $mes . '-' . $dia;
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '07:00:00', 'hora2' => '10:00:00', 'titulo' => 'Apresentação de TCC', 'privado' => '1'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '13:00:00', 'hora2' => '16:00:00', 'titulo' => 'Orientação de RP', 'privado' => '0'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '09:00:00', 'hora2' => '12:00:00', 'titulo' => 'Apresentação de trabalho', 'privado' => '1'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '14:00:00', 'hora2' => '20:00:00', 'titulo' => 'Aula', 'privado' => '0'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '21:00:00', 'hora2' => '22:00:00', 'titulo' => 'Pesquisa', 'privado' => '1'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '20:00:00', 'hora2' => '21:30:00', 'titulo' => 'Orientação TCC', 'privado' => '0'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '09:00:00', 'hora2' => '12:30:00', 'titulo' => 'Aula de Redes', 'privado' => '0'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '14:00:00', 'hora2' => '16:30:00', 'titulo' => 'Prova Eng Software', 'privado' => '0'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '18:00:00', 'hora2' => '20:00:00', 'titulo' => 'Aula POO', 'privado' => '1'));
    $db->insert('evento', array('data_inicial' => $hoje, 'data_final' => $hoje, 'hora1' => '21:30:00', 'hora2' => '23:00:00', 'titulo' => 'Pesquisa Java', 'privado' => '0'));

    /**
     * Insere os valores na tabela evento_usuario
     */
    $db->insert('evento_usuario', array('id_evento' => '1', 'id_professor' => '1', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '2', 'id_professor' => '1', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '3', 'id_professor' => '1', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '4', 'id_professor' => '2', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '5', 'id_professor' => '2', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '6', 'id_professor' => '2', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '7', 'id_professor' => '3', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '8', 'id_professor' => '3', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '9', 'id_professor' => '4', 'convite' => 'proprietario'));
    $db->insert('evento_usuario', array('id_evento' => '10', 'id_professor' => '4', 'convite' => 'proprietario'));

    /**
     * Insere os valores na tabela turma 
     */
    $db->insert('turma', array('nome' => '1ºSemestre'));
    $db->insert('turma', array('nome' => '2ºSemestre'));
    $db->insert('turma', array('nome' => '3ºSemestre'));
    $db->insert('turma', array('nome' => '4ºSemestre'));
    $db->insert('turma', array('nome' => '5ºSemestre'));
    $db->insert('turma', array('nome' => '6ºSemestre'));
    $db->insert('turma', array('nome' => '7ºSemestre'));
    $db->insert('turma', array('nome' => '8ºSemestre'));
    $db->insert('turma', array('nome' => '9ºSemestre'));
    $db->insert('turma', array('nome' => '10ºSemestre'));
    $db->insert('turma', array('nome' => '11ºSemestre'));
    $db->insert('turma', array('nome' => '12ºSemestre'));

    /**
     * Insere valores na tabela periodo_letivo 
     */
    $db->insert('periodo_letivo', array('nome' => '2010/1'));
    $db->insert('periodo_letivo', array('nome' => '2010/2'));
    $db->insert('periodo_letivo', array('nome' => '2011/1'));
    $db->insert('periodo_letivo', array('nome' => '2011/2'));
    $db->insert('periodo_letivo', array('nome' => '2012/1'));
    $db->insert('periodo_letivo', array('nome' => '2012/2'));
    $db->insert('periodo_letivo', array('nome' => '2013/1'));
    $db->insert('periodo_letivo', array('nome' => '2013/2'));



    /**
     * Insere valores na tabela horario 
     */
    $mes = date('m');
    $dia = date('d');
    $ano = date('Y');
    $hoje = $ano . '-' . $mes . '-' . $dia;
    $db->insert('horario', array('id_turma' => '5', 'id_periodo_letivo' => '5', 'id_disciplina_curso' => '1', 'status' => '1', 'dia' => $hoje, 'hora_inicial' => '07:30:00', 'hora_final' => '11:30:00'));
    $db->insert('horario', array('id_turma' => '5', 'id_periodo_letivo' => '5', 'id_disciplina_curso' => '2', 'status' => '1', 'dia' => $hoje, 'hora_inicial' => '13:30:00', 'hora_final' => '14:30:00'));
    $db->insert('horario', array('id_turma' => '5', 'id_periodo_letivo' => '5', 'id_disciplina_curso' => '3', 'status' => '1', 'dia' => $hoje, 'hora_inicial' => '18:30:00', 'hora_final' => '20:30:00'));


    /**
     * Insere valores na tabela horario_professor 
     */
    $db->insert('horario_professor', array('id_professor' => '1', 'id_horario' => '1'));
    $db->insert('horario_professor', array('id_professor' => '2', 'id_horario' => '2'));
    $db->insert('horario_professor', array('id_professor' => '3', 'id_horario' => '3'));

    /**
     * Insere valores na tabela disponibilidade_aula
     */
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'terca', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quarta', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quinta', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sexta', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sabado', 'hora' => '07:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '08:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '09:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '10:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '11:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '12:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '14:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '13:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '15:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '17:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '16:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '18:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '19:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '20:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'segunda', 'hora' => '21:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'terca', 'hora' => '09:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quarta', 'hora' => '10:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quinta', 'hora' => '11:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sexta', 'hora' => '13:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sabado', 'hora' => '14:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sexta', 'hora' => '15:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quinta', 'hora' => '16:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quarta', 'hora' => '17:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'terca', 'hora' => '18:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quarta', 'hora' => '19:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'quinta', 'hora' => '20:30', 'id_usuario' => '1'));
    $db->insert('disponibilidade_aula', array('dia' => 'sexta', 'hora' => '21:30', 'id_usuario' => '1'));
    
endif;