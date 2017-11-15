CREATE TABLE `ras_lock` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `useragent` text NOT NULL,
  `user_login` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `unblock_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `permanent` tinyint(3) UNSIGNED DEFAULT '0',
  `hits` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ras_lock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`);

CREATE TABLE `ras_login` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip` int(10) UNSIGNED DEFAULT NULL,
  `useragent` text NOT NULL,
  `user_login` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `login_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ras_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`);


CREATE TABLE `ras_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_salt` varchar(250) NOT NULL DEFAULT '',
  `auth_key` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ras_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_login` (`user_login`);
