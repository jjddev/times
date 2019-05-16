CREATE SCHEMA `times` DEFAULT CHARACTER SET utf8 ;

use times;

CREATE TABLE `times` (
   `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
   `nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
   `endereco` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB 
 
 
 
CREATE TABLE `jogadores` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `nome` varchar(80) NOT NULL,
   `datanascimento` date DEFAULT NULL,
   `altura` float(8,2) DEFAULT NULL,
   `endereco` varchar(120) DEFAULT NULL,
   `time_id` bigint(20) NOT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8
 
 
INSERT INTO times VALUES 
(null, 'Paraná', 'Rua 123'),
(null, 'Coritiba', 'Rua 456'),
(null, 'Athetico PR', 'Rua 789');

INSERT INTO jogadores VALUES
(null, 'J1', '30-01-1987', 1.78, 'Rua 123', 1),
(null, 'J2', '30-05-1980', 1.72, 'Rua 456', 1),
(null, 'J3', '05-10-1990', 1.61, 'Rua abc', 2),
(null, 'J4', '15-08-2000', 1.98, 'Rua cde', 2),
(null, 'J5', '01-01-1982', 1.68, 'Rua xxx', 3),
(null, 'J6', '05-07-1992', 1.81, 'Rua yyy', 3)