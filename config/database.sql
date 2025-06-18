CREATE DATABASE academiadb;
USE academiadb;

-- Tabela de instrutores
CREATE TABLE instrutores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especialidade VARCHAR(100),
    cref VARCHAR(20) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100)
);

-- Tabela de planos
CREATE TABLE planos_treino (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_plano VARCHAR(100) NOT NULL,
    descricao TEXT,
    duracao_semanas INT,
    tipo_treino VARCHAR(50),
    instrutor_id INT,
    FOREIGN KEY (instrutor_id) REFERENCES instrutores(id)
);

-- Tabela de alunos
CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    data_nascimento DATE NOT NULL,
    telefone VARCHAR(20),
    plano_id INT,
    email VARCHAR(100),
    FOREIGN KEY (plano_id) REFERENCES planos_treino(id)
);