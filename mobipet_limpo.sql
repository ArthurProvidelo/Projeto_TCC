-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mobipet_limpo
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agendamento`
--

create database mobipet_limpo;
use mobipet_limpo;

DROP TABLE IF EXISTS `agendamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agendamento` (
  `id_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `data_agendamento` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `status_agendamento` varchar(255) DEFAULT NULL,
  `etapa_atual` bigint(20) unsigned DEFAULT NULL,
  `fk_id_pet` int(11) DEFAULT NULL,
  `fk_id_servico` int(11) DEFAULT NULL,
  `observacao` longtext DEFAULT NULL,
  `fk_id_funcionario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_agendamento`),
  KEY `fk_id_pet` (`fk_id_pet`),
  KEY `fk_id_servico` (`fk_id_servico`),
  KEY `fk_agendamento_funcionario` (`fk_id_funcionario`),
  KEY `agendamento_etapa_atual_foreign` (`etapa_atual`),
  CONSTRAINT `agendamento_etapa_atual_foreign` FOREIGN KEY (`etapa_atual`) REFERENCES `servico_etapas` (`id_servico_etapa`) ON DELETE SET NULL,
  CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`fk_id_pet`) REFERENCES `pet` (`id_pet`) ON DELETE CASCADE,
  CONSTRAINT `agendamento_ibfk_3` FOREIGN KEY (`fk_id_servico`) REFERENCES `servico` (`id_servico`) ON DELETE CASCADE,
  CONSTRAINT `fk_agendamento_funcionario` FOREIGN KEY (`fk_id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `nota` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `data_avaliacao` date DEFAULT NULL,
  `fk_id_agendamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`),
  KEY `fk_id_agendamento` (`fk_id_agendamento`),
  CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`fk_id_agendamento`) REFERENCES `agendamento` (`id_agendamento`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cartoes`
--

DROP TABLE IF EXISTS `cartoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cartoes` (
  `id_cartao` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(64) NOT NULL,
  `fk_id_pet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cartao`),
  UNIQUE KEY `cartoes_uid_unique` (`uid`),
  KEY `cartoes_fk_id_pet_foreign` (`fk_id_pet`),
  CONSTRAINT `cartoes_fk_id_pet_foreign` FOREIGN KEY (`fk_id_pet`) REFERENCES `pet` (`id_pet`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `data_admissao` date NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel_acesso` varchar(20) NOT NULL DEFAULT 'FUNCIONARIO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `forma_pagamento` varchar(100) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `status_pagamento` varchar(50) DEFAULT NULL,
  `fk_id_agendamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pagamento`),
  KEY `fk_id_agendamento` (`fk_id_agendamento`),
  CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`fk_id_agendamento`) REFERENCES `agendamento` (`id_agendamento`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pet`
--

DROP TABLE IF EXISTS `pet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pet` (
  `id_pet` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `raca` varchar(255) DEFAULT NULL,
  `porte` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Aguardando atendimento',
  PRIMARY KEY (`id_pet`),
  KEY `fk_id_cliente` (`fk_id_cliente`),
  CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `duracao_estimada` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servico_etapas`
--

DROP TABLE IF EXISTS `servico_etapas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servico_etapas` (
  `id_servico_etapa` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_servico` int(11) NOT NULL,
  `etapa` varchar(30) NOT NULL,
  `ordem` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id_servico_etapa`),
  UNIQUE KEY `servico_etapas_fk_id_servico_etapa_unique` (`fk_id_servico`,`etapa`),
  CONSTRAINT `servico_etapas_fk_id_servico_foreign` FOREIGN KEY (`fk_id_servico`) REFERENCES `servico` (`id_servico`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-06 11:28:04

INSERT INTO `funcionario` (
    `id_funcionario`,
    `nome`,
    `cpf`,
    `cargo`,
    `telefone`,
    `email`,
    `endereco`,
    `cep`,
    `salario`,
    `data_admissao`,
    `senha`,
    `nivel_acesso`,
    `created_at`,
    `updated_at`
) VALUES (
    1,
    'Leo Nardo',
    '123.222.222-22',
    'Tosador',
    '(11) 11111-1112',
    'leo@email.com',
    'Rua teste',
    '11111111',
    111.11,
    '2026-07-28',
    '$2y$12$i5t33xk33lYRSGk1noCYoe.vUFJbG4FYTQqjIPJrtwpQa45gKh0Eu',
    'FUNCIONARIO',
    '2026-07-28 13:43:23',
    '2026-07-28 13:43:23'
);

-- Inserts do Banco Novo--

INSERT INTO `funcionario` (
    `nome`,
    `cpf`,
    `cargo`,
    `telefone`,
    `email`,
    `endereco`,
    `cep`,
    `salario`,
    `data_admissao`,
    `senha`,
    `nivel_acesso`,
    `created_at`,
    `updated_at`
) VALUES
(
    'Arthur Barbosa',
    '123.456.789-01',
    'Veterinário',
    '(11) 98765-4321',
    'arthur.barbosa@mobipet.com',
    'Rua das Flores, 120',
    '13010000',
    3500.00,
    '2026-02-10',
    '$2y$12$i5t33xk33lYRSGk1noCYoe.vUFJbG4FYTQqjIPJrtwpQa45gKh0Eu',
    'FUNCIONARIO',
    '2026-02-10 08:00:00',
    '2026-02-10 08:00:00'
),
(
    'Kauan Ferreira',
    '234.567.890-12',
    'Tosador',
    '(11) 97654-3210',
    'kauan.ferreira@mobipet.com',
    'Rua dos Ipês, 245',
    '13020000',
    2200.00,
    '2026-03-15',
    '$2y$12$i5t33xk33lYRSGk1noCYoe.vUFJbG4FYTQqjIPJrtwpQa45gKh0Eu',
    'FUNCIONARIO',
    '2026-03-15 08:00:00',
    '2026-03-15 08:00:00'
),
(
    'Maria Fernanda',
    '345.678.901-23',
    'Recepcionista',
    '(11) 96543-2109',
    'maria.fernanda@mobipet.com',
    'Avenida Brasil, 580',
    '13030000',
    1900.00,
    '2026-04-05',
    '$2y$12$i5t33xk33lYRSGk1noCYoe.vUFJbG4FYTQqjIPJrtwpQa45gKh0Eu',
    'FUNCIONARIO',
    '2026-04-05 08:00:00',
    '2026-04-05 08:00:00'
),
(
    'Lorena Thomaz',
    '456.789.012-34',
    'Gerente',
    '(11) 95432-1098',
    'lorena.thomaz@mobipet.com',
    'Rua das Palmeiras, 315',
    '13040000',
    4200.00,
    '2026-01-20',
    '$2y$12$i5t33xk33lYRSGk1noCYoe.vUFJbG4FYTQqjIPJrtwpQa45gKh0Eu',
    'FUNCIONARIO',
    '2026-01-20 08:00:00',
    '2026-01-20 08:00:00'
),
(
    'Kaila Silva',
    '567.890.123-45',
    'Banho e Tosa',
    '(11) 94321-0987',
    'kaila.silva@mobipet.com',
    'Rua dos Girassóis, 450',
    '13050000',
    2300.00,
    '2026-05-12',
    '$2y$12$i5t33xk33lYRSGk1noCYoe.vUFJbG4FYTQqjIPJrtwpQa45gKh0Eu',
    'FUNCIONARIO',
    '2026-05-12 08:00:00',
    '2026-05-12 08:00:00'
);

