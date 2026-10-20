-- Corrige o banco local: remove a tabela `atendimentos` criada pela metade
-- pela migration que falhou, e cria as tabelas legadas (`funcionario` e
-- `Agendamento`) que deveriam ter vindo do mobipet.sql mas nunca foram
-- importadas nesta máquina. Depois disto, rode `php artisan migrate`.

DROP TABLE IF EXISTS atendimento_etapas;
DROP TABLE IF EXISTS atendimentos;

CREATE TABLE IF NOT EXISTS funcionario (
    id_funcionario  INT AUTO_INCREMENT PRIMARY KEY,
    nome            VARCHAR(255) NOT NULL,
    cpf             VARCHAR(14),
    cargo           VARCHAR(100),
    funcao          VARCHAR(100),
    telefone        VARCHAR(20),
    email           VARCHAR(255),
    endereco        VARCHAR(255),
    salario         DECIMAL(10,2),
    data_admissao   DATE,
    senha           VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS Agendamento (
    id_agendamento      INT AUTO_INCREMENT PRIMARY KEY,
    data_agendamento    DATE,
    horario             TIME,
    status_agendamento  VARCHAR(255),
    observacao          VARCHAR(255),
    fk_id_pet           INT,
    fk_id_servico       INT,
    fk_id_funcionario   INT,

    FOREIGN KEY (fk_id_pet)         REFERENCES pet(id_pet)                 ON DELETE CASCADE,
    FOREIGN KEY (fk_id_servico)     REFERENCES Servico(id_servico)         ON DELETE CASCADE,
    FOREIGN KEY (fk_id_funcionario) REFERENCES funcionario(id_funcionario) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
