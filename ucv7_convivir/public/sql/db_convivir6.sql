create database db_convivir7;
use db_convivir7;

CREATE TABLE `personas` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `doc_tipo` VARCHAR(5) NOT NULL,
    `doc_numero` VARCHAR(15) NOT NULL,
    `nombre` VARCHAR(100) NOT NULL,
    `apellido_1` VARCHAR(100) NOT NULL,
    `apellido_2` VARCHAR(100),
    `genero` VARCHAR(100),
    `fecha_nacimiento` DATETIME,
    PRIMARY KEY (id),
    CONSTRAINT uq_persona_doc UNIQUE (doc_tipo , doc_numero)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;


INSERT INTO `personas` (`id`, `doc_tipo`, `doc_numero`, `nombre`, `apellido_1`, `apellido_2`, `genero`, `fecha_nacimiento`) VALUES
(1, 'dni', '10101010', 'Cesar', 'Vallejo', 'Mendoza', 'masculino', '1960-06-06 00:00:00');

INSERT INTO `personas` (`id`, `doc_tipo`, `doc_numero`, `nombre`, `apellido_1`, `apellido_2`, `genero`, `fecha_nacimiento`) VALUES
(2, 'dni', '20202020', 'Mario', 'Vargas', 'Llosa', 'masculino', '1950-05-05 00:00:00');

INSERT INTO `personas` (`id`, `doc_tipo`, `doc_numero`, `nombre`, `apellido_1`, `apellido_2`, `genero`, `fecha_nacimiento`) VALUES
(3, 'dni', '30303030', 'Paulo', 'Cohelo', 'Rios', 'masculino', '1960-05-22 00:00:00');

INSERT INTO `personas` (`id`, `doc_tipo`, `doc_numero`, `nombre`, `apellido_1`, `apellido_2`, `genero`, `fecha_nacimiento`) VALUES
(4, 'dni', '40404040', 'Gabriela', 'Mistral', 'Castro', 'masculino', '1960-05-22 00:00:00');


CREATE TABLE `condominios` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `city` VARCHAR(100) NOT NULL,
    `address` VARCHAR(200) NOT NULL,
    `date` DATETIME NOT NULL,
    `image` VARCHAR(500),
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;


INSERT INTO `condominios` (`id`, `name`, `city`,  `address`, `date`, `image`) 
VALUES (1, 'Edificio Cesar Vallejo', 'San Borja', 'Av. Javier Prado 100', '2022-05-22 19:08:58', 'uploads/cesar.vallejo.jpg');

INSERT INTO `condominios` (`id`, `name`, `city`,  `address`, `date`, `image`) 
VALUES (2, 'La Merced', 'Miraflores', 'Av. Diez Canseco 250', '2022-05-22 19:08:58', 'uploads/lamerced.jpg');


CREATE TABLE `usuarios` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `persona_id` INT,
    `email` VARCHAR(100) NOT NULL,
    `username` VARCHAR(60) NOT NULL,
    `date` DATETIME NOT NULL,
    `condominio_id` INT NULL,
    `rol` VARCHAR(20) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `image` VARCHAR(500),
    PRIMARY KEY (id),
    CONSTRAINT fk_usuario_persona FOREIGN KEY (persona_id)
        REFERENCES personas (id),
    CONSTRAINT fk_usuario_condominio FOREIGN KEY (condominio_id)
        REFERENCES condominios (id),
    CONSTRAINT uq_usuario_mail UNIQUE (email)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

INSERT INTO `usuarios` 
(`id`, `persona_id`,`email`, `username`, `date`, `condominio_id`, `rol`, `password`, `image`) VALUES
(1, 1, 'cvallejo@mail.com', 'cvallejo', '2022-05-22 19:08:58', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', 'uploads/1655395033_keanu.jpg');

INSERT INTO `usuarios` 
(`id`, `persona_id`,`email`, `username`, `date`, `condominio_id`, `rol`, `password`, `image`) VALUES
(2, 2, 'mvargas@mail.com', 'mvargas', '2022-05-22 19:08:58', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', 'uploads/1655395047_foto_varon.jpg');

INSERT INTO `usuarios` (`id`, `persona_id`,`email`, `username`, `date`, `condominio_id`, `rol`, `password`, `image`) VALUES
(3, 3, 'pcohelo@mail.com', 'pcohelo', '2022-05-22 19:08:58', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', null);

INSERT INTO `usuarios` (`id`, `persona_id`,`email`, `username`, `date`, `condominio_id`, `rol`, `password`, `image`) VALUES
(4, 4, 'gmistrak@mail.com', 'gmistral', '2022-05-22 19:08:58', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', 'uploads/1655395056_foto_mujer.jpg');


CREATE TABLE `documentos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `type` VARCHAR(200) NOT NULL,
    `number` VARCHAR(200) NOT NULL,
    `total` DECIMAL(6 , 2 ) NOT NULL,
    `description` VARCHAR(200) NOT NULL,
    `date` DATETIME NOT NULL,
    `year` INT,
    `month` INT,
    `image` VARCHAR(500),
    `condominio_id` INT NOT NULL,
    `usuario_id` INT,
    PRIMARY KEY (id),
    CONSTRAINT fk_documento_usuario FOREIGN KEY (usuario_id)
        REFERENCES usuarios (id),
    CONSTRAINT fk_documento_condominio FOREIGN KEY (condominio_id)
        REFERENCES condominios (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

INSERT INTO `documentos` (`type`, `number`, `total`, `description`,`date`,`year`,`month`, `condominio_id`,`usuario_id`) 
VALUES ('boleta','001',950.50,'Pago de Servicio de Agua', '2022-06-22 19:08:58', 2022, 6, 1, 1);
INSERT INTO `documentos` (`type`, `number`, `total`, `description`,`date`,`year`,`month`, `condominio_id`,`usuario_id`) 
VALUES ( 'recibo','500',1950.50,'Pago de Servicio de Limpieza', '2022-06-21 19:08:58', 2022, 6, 1, 1);
INSERT INTO `documentos` (`type`, `number`, `total`, `description`,`date`,`year`,`month`, `condominio_id`,`usuario_id`) 
VALUES ('boleta','745',830.00,'Pago de Servicio de Electricidad', '2022-06-20 14:08:58', 2022, 6, 1, 1);
INSERT INTO `documentos` (`type`, `number`, `total`, `description`,`date`,`year`,`month`, `condominio_id`,`usuario_id`) 
VALUES ('factura','300',700.00,'Compra de Motor de Reemplazo', '2022-07-01 14:08:58', 2022, 7, 1, 1);
INSERT INTO `documentos` (`type`, `number`, `total`, `description`,`date`,`year`,`month`, `condominio_id`,`usuario_id`) 
VALUES ('ticket','200',250.00,'Compra de herramientas de limpieza', '2022-07-02 14:08:58', 2022, 7, 1, 1);


CREATE TABLE `inmuebles` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `tipo` VARCHAR(50) NOT NULL,
    `numeracion` VARCHAR(200) NOT NULL,
    `area` DECIMAL(8 , 2 ) NOT NULL,
    `condominio_id` INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_inmueble_condominio FOREIGN KEY (condominio_id)
        REFERENCES condominios (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

INSERT INTO `inmuebleS` (`tipo`, `numeracion`, `area`,`condominio_id`) 
VALUES ('departamento','101-A',120.00,'1');
INSERT INTO `inmuebleS` (`tipo`, `numeracion`, `area`,`condominio_id`) 
VALUES ('departamento','102-A',100.00,'1');
INSERT INTO `inmuebles` (`tipo`, `numeracion`, `area`,`condominio_id`) 
VALUES ('departamento','201-A',120.00,'1');
INSERT INTO `inmuebles` (`tipo`, `numeracion`, `area`,`condominio_id`) 
VALUES ('departamento','202-A',100.00,'1');
INSERT INTO `inmuebles` (`tipo`, `numeracion`, `area`,`condominio_id`) 
VALUES ('cochera','1001',15.00,'1');
INSERT INTO `inmuebles` (`tipo`, `numeracion`, `area`,`condominio_id`) 
VALUES ('deposito','1002',10.00,'1');

CREATE TABLE `propietarios` (
    `id` INT NOT NULL AUTO_INCREMENT,
	`inmueble_id` int not null,
    `persona_id` int not null,
    PRIMARY KEY (id),
    CONSTRAINT uq_propietario_inmueble UNIQUE (inmueble_id),
    CONSTRAINT fk_propietario_inmueble FOREIGN KEY (inmueble_id)
        REFERENCES inmuebles (id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT fk_propietario_persona FOREIGN KEY (persona_id)
        REFERENCES personas (id) ON UPDATE CASCADE ON DELETE CASCADE
        
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;


INSERT INTO `propietarios` (`inmueble_id`, `persona_id`) 
VALUES (1, 1);
INSERT INTO `propietarios` (`inmueble_id`, `persona_id`) 
VALUES (2, 1);
INSERT INTO `propietarios` (`inmueble_id`, `persona_id`) 
VALUES (3, 2);


CREATE TABLE `residentes` (
    `id` INT NOT NULL AUTO_INCREMENT,
	`inmueble_id` int not null,
    `persona_id` int not null,
    PRIMARY KEY (id),
    CONSTRAINT uq_residente_persona UNIQUE (persona_id),
    CONSTRAINT fk_residente_inmueble FOREIGN KEY (inmueble_id)
        REFERENCES inmuebles (id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT fk_residente_persona FOREIGN KEY (persona_id)
        REFERENCES personas (id) ON UPDATE CASCADE ON DELETE CASCADE
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

INSERT INTO `residentes` (`inmueble_id`, `persona_id`) 
VALUES (1, 1);
INSERT INTO `residentes` (`inmueble_id`, `persona_id`) 
VALUES (2, 2);
INSERT INTO `residentes` (`inmueble_id`, `persona_id`) 
VALUES (2, 3);


#DROP PROCEDURE usp_condominio_gastos_mesual;
DELIMITER $$
CREATE  PROCEDURE usp_condominio_gastos_mesual(in anio int, in condominio int)
BEGIN
WITH periodos(mes_num, mes_des) 
AS (
	select column_0 mes_num, column_1 mes_des from 
(values 
row('1','enero'),
row('2','febrero'),
row('3','marzo'),
row('4','abril'),
row('5','mayo'),
row('6','junio'),
row('7','julio'),
row('8','agosto'),
row('9','septiembre'),
row('10','octubre'),
row('11','noviembre'),
row('12','diciembre')) meses
)   
SELECT p.mes_des mes, sum(ifnull(d.total,0)) total FROM periodos p 
left join documentos d
on p.mes_num = d.month
and d.year = anio
and d.condominio_id = condominio
group by p.mes_des;
END 
$$
DELIMITER ;


#DROP PROCEDURE usp_condominio_gasto_por_documento;

DELIMITER $$
CREATE  PROCEDURE `usp_condominio_gasto_por_documento`(in anio int, in condominio int)
BEGIN
WITH documento_tipo(tipo) 
AS (
	select column_0 tipo from 
(values 
row('boleta'),
row('factura'),
row('recibo'),
row('ticket')) tipo
)   
SELECT t.tipo, sum(ifnull(d.total,0)) total
FROM documento_tipo t 
left join documentos d
on t.tipo = d.type
and d.year = anio
and d.condominio_id = condominio
group by t.tipo;
END$$
DELIMITER ;


#DROP PROCEDURE usp_condominio_inmuebles_por_tipo;
DELIMITER $$
CREATE  PROCEDURE `usp_condominio_inmuebles_por_tipo`(in condominio int)
BEGIN
WITH documento_tipo(tipo) 
AS (
	select column_0 tipo from 
(values 
row('departamento'),
row('vivienda'),
row('cochera'),
row('deposito')) tipo
)   
SELECT t.tipo, count(i.tipo) total
FROM documento_tipo t 
left join inmuebles i
on t.tipo = i.tipo
and i.condominio_id = condominio
group by t.tipo;
END$$
DELIMITER ;