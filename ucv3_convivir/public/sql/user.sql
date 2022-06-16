drop table users;
drop table condominios;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `condominio_id` int NULL,
  `rol` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(500) , 
  primary key (id)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(1, 'Cesar', 'Vallejo', 'cvallejo@mail.com', '2022-05-22 19:08:58', 'cesar.vallejo', 'masculino', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', 'uploads/1655395033_keanu.jpg');

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(2, 'Abraham', 'Vadelomar', 'avaldelomar@mail.com', '2022-05-22 19:08:58', 'abrham.valdelomar', 'masculino', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', 'uploads/1655395047_foto_varon.jpg');

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(3, 'Pablo', 'Neruda', 'pneruda@mail.com', '2022-05-22 19:08:58', 'pablo.neruda', 'masculino', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', '');

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(4, 'Gabriela', 'Mistral', 'gmistral@mail.com', '2022-05-22 19:08:58', 'gabriela.mistral', 'femenino', 1, 'super_admin', '$2y$10$iUuNS3smSaSZob5r1owrO..lBMsDUarCV9hz3lB3GUnqH1boy/M1O', 'uploads/1655395056_foto_mujer.jpg');


CREATE TABLE `condominios` (
  `id` int NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `condominio_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `image` text,
  primary key (id)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `condominios` (`id`, `name`, `city`, `condominio_id`, `date`, `user_id`, `image`) VALUES
(1, 'Edificion Cesar Vallejo', 'Lima', '', '2022-05-22 19:08:58', 'cesar.vallejo', 'uploads/cersar.vallejo.jpg');

INSERT INTO `condominios` (`id`, `name`, `city`, `condominio_id`, `date`, `user_id`, `image`) VALUES
(2, 'La Merced', 'Miraflores', '', '2022-05-22 19:08:58', 'cesar.vallejo', 'uploads/lamerced.jpg');
