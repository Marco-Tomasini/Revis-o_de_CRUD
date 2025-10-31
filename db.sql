CREATE DATABASE crud_kanban_marco;
USE crud_kanban_marco;

CREATE TABLE usuario 
( 
 id_usuario INT PRIMARY KEY AUTO_INCREMENT,
 nome VARCHAR(255) NOT NULL,  
 email VARCHAR(255) NOT NULL UNIQUE 
); 

CREATE TABLE tarefas
(
 id_tarefa INT PRIMARY KEY AUTO_INCREMENT,
 id_usuario INT, FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
 descricao_tarefa VARCHAR(255) NOT NULL,
 nome_setor VARCHAR(255) NOT NULL,
 prioridade ENUM('Baixa', 'Média', 'Alta') NOT NULL,
 data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 status ENUM('A Fazer', 'Fazendo', 'Pronto') NOT NULL
);



-- Inserindo usuários
INSERT INTO usuario (nome, email) VALUES
('Marco Antonio Tomasini', 'marco_tomasini@estudante.sesisenai.org.br'),
('Ana Beatriz Costa', 'ana.costa@sesi.com'),
('João Pedro Almeida', 'joao.almeida@senai.com'),
('Larissa Ferreira', 'larissa.ferreira@sesi.com'),
('Carlos Eduardo Silva', 'carlos.silva@senai.com');

-- Inserindo tarefas
INSERT INTO tarefas (id_usuario, descricao_tarefa, nome_setor, prioridade, status) VALUES
(1, 'Implementar sistema de login com autenticação JWT', 'Desenvolvimento', 'Alta', 'Fazendo'),
(1, 'Criar script SQL para popular o banco de dados inicial', 'Desenvolvimento', 'Média', 'Pronto'),
(2, 'Revisar documentação técnica do projeto', 'Documentação', 'Baixa', 'A Fazer'),
(2, 'Atualizar políticas de segurança da informação', 'TI', 'Alta', 'Fazendo'),
(3, 'Montar dashboard de tarefas em React', 'Frontend', 'Alta', 'Fazendo'),
(3, 'Ajustar responsividade da página Kanban', 'Frontend', 'Média', 'A Fazer'),
(4, 'Criar layout de interface no Figma', 'Design', 'Média', 'Pronto'),
(4, 'Padronizar identidade visual das telas', 'Design', 'Baixa', 'A Fazer'),
(5, 'Configurar servidor Apache e banco MySQL', 'Infraestrutura', 'Alta', 'Fazendo'),
(5, 'Gerar backup automático diário', 'Infraestrutura', 'Média', 'A Fazer');