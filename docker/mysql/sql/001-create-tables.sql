---- drop ----
DROP TABLE IF EXISTS `users`;

---- create ----
create table IF not exists `users`
(
  `id`               INT AUTO_INCREMENT,
  `name`             VARCHAR(30) NOT NULL,
  `age`              INT NOT NULL,
  `email`            VARCHAR(30),
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;