drop table users;

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
(1, 'Cesar', 'Vallejo', 'cvallejo@mail.com', '2022-05-22 19:08:58', 'cesar.vallejo', 'masculino', 1, 'super_admin', '$2y$10$0sWmzkuJ8/j32nNulAfJAeKPInq1.P8U903HiVNd5ypxjJNt1FOdi', 'uploads/cersar.vallejo.jpg');

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(2, 'Abraham', 'Vadelomar', 'avaldelomar@mail.com', '2022-05-22 19:08:58', 'abrham.valdelomar', 'masculino', 1, 'super_admin', '$2y$10$0sWmzkuJ8/j32nNulAfJAeKPInq1.P8U903HiVNd5ypxjJNt1FOdi', 'uploads/abraham.valdelomar.jpg');

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(3, 'Pablo', 'Neruda', 'pneruda@mail.com', '2022-05-22 19:08:58', 'pablo.neruda', 'masculino', 1, 'super_admin', '$2y$10$0sWmzkuJ8/j32nNulAfJAeKPInq1.P8U903HiVNd5ypxjJNt1FOdi', 'uploads/pablo.neruda.jpg');

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `condominio_id`, `rol`, `password`, `image`) VALUES
(4, 'Gabriela', 'Mistral', 'gmistral@mail.com', '2022-05-22 19:08:58', 'gabriela.mistral', 'femenino', 1, 'super_admin', '$2y$10$0sWmzkuJ8/j32nNulAfJAeKPInq1.P8U903HiVNd5ypxjJNt1FOdi', 'uploads/gabriela.mistral.jpg');
