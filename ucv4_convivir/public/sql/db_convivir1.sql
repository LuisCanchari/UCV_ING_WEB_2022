create database db_convivir2;
use db_convivir2;
#drop table users;
#drop table condominios;
#drop table documentos;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `condominio_id` int NULL,
  `rol` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(500) , 
  primary key (id)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `username`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(1, 'Cesar', 'Vallejo', 'cvallejo@mail.com', '2022-05-22 19:08:58', 'cesar.vallejo', 'masculino', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', 'uploads/1655395033_keanu.jpg');

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `username`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(2, 'Abraham', 'Vadelomar', 'avaldelomar@mail.com', '2022-05-22 19:08:58', 'abrham.valdelomar', 'masculino', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', 'uploads/1655395047_foto_varon.jpg');

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `username`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(3, 'Pablo', 'Neruda', 'pneruda@mail.com', '2022-05-22 19:08:58', 'pablo.neruda', 'masculino', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', '');

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `username`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(4, 'Gabriela', 'Mistral', 'gmistral@mail.com', '2022-05-22 19:08:58', 'gabriela.mistral', 'femenino', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', 'uploads/1655395056_foto_mujer.jpg');


CREATE TABLE `condominios` (
  `id` int NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int  NOT NULL,
  `image` varchar(500),
  primary key (id)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `condominios` (`id`, `name`, `city`,  `date`, `user_id`, `image`) 
VALUES (1, 'Edificio Cesar Vallejo', 'Lima', '2022-05-22 19:08:58', 1, 'uploads/cesar.vallejo.jpg');

INSERT INTO `condominios` (`id`, `name`, `city`,  `date`, `user_id`, `image`) 
VALUES (2, 'La Merced', 'Miraflores', '2022-05-22 19:08:58',  1, 'uploads/lamerced.jpg');


CREATE TABLE `documentos` (
  `id` int NOT NULL auto_increment,
  `type` varchar(200) NOT NULL,
  `number` varchar(200)  NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `description` varchar(200) NOT NUll,
  `date` datetime NOT NULL,
  `year` int ,
  `month` int,
  `image` varchar(500),
  `condominio_id` int NOT NULL,
  `user_id` varchar(60) NOT NULL,
  primary key (id)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `documentos` (`type`, `number`, `total`, `description`,`date`,`year`,`month`, `condominio_id`,`user_id`) 
VALUES ('boleta','001',950.50,'Pago de Servicio de Agua', '2022-06-22 19:08:58', 2022, 6, 1, 1);
INSERT INTO `documentos` ( `type`, `number`, `total`, `description`,`date`,`year`,`month`, `condominio_id`,`user_id`) 
VALUES ( 'recibo','500',1950.50,'Pago de Servicio de Limpieza', '2022-06-21 19:08:58', 2022, 6, 1, 1);
INSERT INTO `documentos` ( `type`, `number`, `total`, `description`,`date`,`year`,`month`, `condominio_id`,`user_id`) 
VALUES ('boleta','745',830.00,'Pago de Servicio de Electricidad', '2022-06-20 14:08:58', 2022, 6, 1, 1);