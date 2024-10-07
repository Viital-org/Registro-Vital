create table usuarios (id_usuario int not null, nome_completo varchar(50) not null, email varchar(40) not null, senha varchar(20) not null, situacao_cadastro int not null, tipo_usuario int not null, telefone_1 varchar(11), telefone_2 varchar(11), data_cadastro date, PRIMARY KEY(id_usuario));

create table pacientes (id_paciente int not null, cpf varchar(11) not null, rg varchar(15), data_nascimento date not null, rua_endereco varchar(30), numero_endereco varchar(10), cep varchar(8), cidade varchar(32), estado varchar(2), genero char(1), estado_civil int, tipo_sanguineo varchar(2), data_criacao date,  PRIMARY KEY(id_paciente));

create table profissionais (id_profissional int not null, cpf varchar(11) not null, cnpj varchar(14), registro_profissional varchar (10) not null, area_atuacao varchar (20) not null, especializacao varchar (30), genero char(1) not null, tempo_experiencia int not null, id_usuario int not null, data_criacao date, PRIMARY KEY(id_profissional));

create table administradores (id_administrador int not null, cargo varchar(20) not null, data_criacao date not null, PRIMARY KEY(id_administrador));

create table enderecos_atuacao(id_endereco int not null, id_profissional int not null, area_atuacao varchar(20) not null, situacao_endereco int not null, endereco varchar(30) not null, numero_endereco varchar(10) not null, cep varchar(8) not null, cidade varchar(32) not null, estado varchar(2) not null, PRIMARY KEY (id_endereco));

create table estados_civis (id_estado_civil int not null, descricao varchar (15) not null, PRIMARY KEY (id_estado_civil));

create table areas_atuacao (id_area_atuacao int not null, descricao_area varchar(20) not null, PRIMARY KEY (id_area_atuacao));

create table especializacoes (id_especializacao int not null, descricao_especializacao varchar(30) not null, area_atuacao varchar(20) not null, PRIMARY KEY (id_especializacao));

create table anotacoes (id_anotacao int not null, id_paciente int not null, tipo_anotacao int not null, descricao_anotacao varchar(100) not null, tipo_visibilidade char(1) not null, possui_documento boolean, PRIMARY KEY(id_anotacao));

create table tipos_visibilidade (id_tipo_visibilidade int not null, tipo_visibilidade char(1), descricao varchar(10), PRIMARY KEY(id_tipo_visibilidade));

create table tipos_anotacao (id_tipo_anotacao int not null, descricao_tipo varchar(20) not null, PRIMARY KEY(id_tipo_anotacao));

create table documentos (id_documento int not null, id_anotacao int not null, tipo_documeto varchar(3), path_documento varchar(100) not null, tamanho_documento_kb int not null, PRIMARY KEY(id_documento));

create table tipos_documento (id_tipo_documento int not null, extensao_documento varchar(3), tamanho_maximo_kb int not null, PRIMARY KEY(id_tipo_documento));

create table dicas (id_dica int not null, descricao_dica varchar(100)not null, PRIMARY KEY(id_dica));

create table metas (id_meta int not null, id_paciente int not null, titulo_meta varchar(20) not null, descricao_meta varchar(80), data_inicio date not null, data_fim date, situacao int not null, notificacao_diaria boolean not null, PRIMARY KEY(id_meta));

create table consultas (id_consulta int not null, paciente int not null, profissional int not null, id_agendamento int not null, id_area_atuacao int not null, id_especializacao int, situacao int not null, data date not null, valor decimal(5,2), endereco_consulta int not null, PRIMARY KEY(id_consulta));

create table situacoes (id_situacao int not null, descricao varchar(15) not null, PRIMARY KEY (id_situacao));

create table feedbacks (id_feedback int not null, id_consulta int not null, usuario_avaliador int not null, usuario_avaliado int not null, nota_feedback tinyint not null check(nota_feedback between 0 and 10), observacao varchar(50), PRIMARY KEY(id_feedback));

create table agendamentos (id_agendamento int not null, paciente int not null, profissional int not null, area_atuacao varchar(20) not null, especializacao varchar(30), data_agendamento date not null, situacao_paciente int not null, situacao_profissional int not null, endereco_consulta int not null, PRIMARY KEY(id_agendamento));

create table agendas_profissionais (id_agenda int not null, id_profissional int not null, id_consulta int not null, area_atuacao varchar(20) not null, id_paciente int not null, endereco_consulta int not null, PRIMARY KEY(id_agenda));

create table recomendacoes (id_recomendacao int not null, id_consulta int not null, id_profissional int not null, id_paciente int not null, tipo_recomendacao int not null, descricao_recomendacao varchar(100) not null, PRIMARY KEY(id_recomendacao));

create table tipos_recomendacao (id_tipo_recomendacao int not null, descricao varchar(20) not null, gera_notificacao boolean, PRIMARY KEY(id_tipo_recomendacao));

create table tipos_log (id_tipo int not null, descricao varchar(20), PRIMARY KEY(id_tipo));

create table Logs(id_log int not null, tipo_log varchar(20) not null, tabela_afetada varchar(20), coluna_afetada varchar(20), valor_anterior varchar(100), valor_atual varchar(100), data_acao date not null, id_usuario int not null, PRIMARY KEY (id_log));