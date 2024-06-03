SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db`;

CREATE TABLE `autor` (
    `id` int(11) NOT NULL,
    `nome` varchar(50) NOT NULL,
    `idade` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `editora` (
    `id` int(11) NOT NULL,
    `nome` varchar(50) NOT NULL,
    `cnpj` varchar(14) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `manga` (
    `id` int(11) NOT NULL,
    `nome` varchar(50) NOT NULL,
    `volume` int(11) NOT NULL,
    `descricao` text NOT NULL,
    `resumo` text NOT NULL,
    `avaliacao` double(2, 1) NOT NULL,
    `genero` varchar(30) NOT NULL,
    `quantidades_requisitada` int(11) NOT NULL,
    `autor_id` int(11) NOT NULL,
    `editora_id` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `autor_id` (`autor_id`),
    KEY `editora_id` (`editora_id`),
    CONSTRAINT `fk_manga_autor` FOREIGN KEY (`autor_id`) REFERENCES `autor`(`id`),
    CONSTRAINT `fk_manga_editora` FOREIGN KEY (`editora_id`) REFERENCES `editora`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `user` (
    `id` int(11) NOT NULL,
    `nome` varchar(50) NOT NULL,
    `email` varchar(60) NOT NULL,
    `senha` varchar(70) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `user_manga` (
    `user_id` int(11) NOT NULL,
    `manga_id` int(11) NOT NULL,
    PRIMARY KEY (`user_id`, `manga_id`),
    CONSTRAINT `fk_user_manga_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`), 
    CONSTRAINT `fk_user_manga_manga` FOREIGN KEY (`manga_id`) REFERENCES `manga` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

ALTER TABLE `autor` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; 
ALTER TABLE `editora` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; 
ALTER TABLE `manga` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; 
ALTER TABLE `user` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; 

INSERT INTO `autor` (`nome`, `idade`) VALUES
('Hayao Miyazaki', 82),
('Osamu Tezuka', 60),
('Akira Toriyama', 68),
('Rumiko Takahashi', 66),
('Eiichiro Oda', 48);

INSERT INTO `editora` (`nome`, `cnpj`) VALUES
('Shueisha', '12345678000100'),
('Kodansha', '23456789000111'),
('Shogakukan', '34567890000122'),
('Square Enix', '45678901000133'),
('Kadokawa', '56789012000144');

INSERT INTO `manga` (`nome`, `volume`, `descricao`,`resumo`, `avaliacao`, `genero`, `quantidades_requisitada`, `autor_id`, `editora_id`) VALUES
('Naruto', 1, 'Um jovem ninja que busca reconhecimento e sonha em se tornar Hokage.','Almir', 4.8, 'Ação', 500, 1, 1),
('Dragon Ball', 1, 'A jornada de Goku em busca das esferas do dragão.','almir', 4.7, 'Aventura', 300, 3, 1),
('One Piece', 1, 'A história de Monkey D. Luffy em busca do tesouro One Piece.','almir', 4.9, 'Aventura', 700, 5, 2),
('Inuyasha', 1, 'Uma garota do presente que viaja para o passado e encontra um meio-yokai.','almir',  4.5, 'Fantasia', 200, 4, 3),
('Astro Boy', 1, 'Um robô com poderes incríveis criado pelo Dr. Tenma.','almir', 4.6, 'Ficção Científica', 250, 2, 2);

INSERT INTO `user` (`nome`, `email`, `senha`) VALUES
('Uryel','uryeljodelucca11@gmail.com', '0b14bf70574539485fe4c2ba202f47b8' ),
('Vitao', 'vitao@gmail.com', '31d356e7466ea208f517cd7afa1d75bd' ),
('Almir', 'almirzada@gmail.com', '0dcfa9276dffa58e19c0d6c8b31c16d8' );

INSERT INTO `user_manga` (`user_id`, `manga_id`) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 4),
(3, 5),
(3, 1),
(2, 2),
(1, 3),
(3, 4),
(1, 5);

COMMIT;