CREATE DATABASE IF NOT EXISTS mobipet;
USE mobipet;

-- =========================
-- CLIENTE
-- =========================

CREATE TABLE Cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    cpf VARCHAR(14),
    telefone VARCHAR(255),
    email VARCHAR(255),
    senha VARCHAR(255),
    endereco VARCHAR(255)
) ENGINE=InnoDB;


-- =========================
-- PET
-- =========================

CREATE TABLE Pet (
    id_pet INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    especie VARCHAR(255),
    raca VARCHAR(255),
    porte VARCHAR(255),
    data_nascimento DATE,
    status VARCHAR(255) DEFAULT 'Aguardando atendimento',
    fk_id_cliente INT,

    FOREIGN KEY (fk_id_cliente)
        REFERENCES Cliente(id_cliente)
        ON DELETE CASCADE
) ENGINE=InnoDB;


-- =========================
-- SERVIÇO
-- =========================

CREATE TABLE Servico (
    id_servico INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    descricao VARCHAR(255),
    preco DECIMAL(10,2),
    duracao_estimada INT
) ENGINE=InnoDB;


-- =========================
-- FUNCIONÁRIO
-- =========================

CREATE TABLE Funcionario (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    endereco VARCHAR(255),
    salario DECIMAL(10,2),
    data_admissao DATE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB;


-- =========================
-- AGENDAMENTO
-- =========================

CREATE TABLE Agendamento (
    id_agendamento INT AUTO_INCREMENT PRIMARY KEY,
    data_agendamento DATE,
    horario TIME,
    status_agendamento VARCHAR(255),
    fk_id_pet INT,
    fk_id_servico INT,
    fk_id_funcionario INT,

    FOREIGN KEY (fk_id_pet)
        REFERENCES Pet(id_pet)
        ON DELETE CASCADE,

    FOREIGN KEY (fk_id_funcionario)
        REFERENCES Funcionario(id_funcionario)
        ON DELETE CASCADE,

    FOREIGN KEY (fk_id_servico)
        REFERENCES Servico(id_servico)
        ON DELETE CASCADE
) ENGINE=InnoDB;


-- =========================
-- PAGAMENTO
-- =========================

CREATE TABLE Pagamento (
    id_pagamento INT AUTO_INCREMENT PRIMARY KEY,
    forma_pagamento VARCHAR(100),
    valor DECIMAL(10,2),
    status_pagamento VARCHAR(50),
    fk_id_agendamento INT,

    FOREIGN KEY (fk_id_agendamento)
        REFERENCES Agendamento(id_agendamento)
        ON DELETE CASCADE
) ENGINE=InnoDB;


-- =========================
-- AVALIAÇÃO
-- =========================

CREATE TABLE Avaliacao (
    id_avaliacao INT AUTO_INCREMENT PRIMARY KEY,
    nota INT,
    comentario TEXT,
    data_avaliacao DATE,
    fk_id_agendamento INT,

    FOREIGN KEY (fk_id_agendamento)
        REFERENCES Agendamento(id_agendamento)
        ON DELETE CASCADE
) ENGINE=InnoDB;