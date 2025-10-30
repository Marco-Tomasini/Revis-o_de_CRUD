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