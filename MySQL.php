<?php
require 'settings.php';
	mysql_connect($host, $mysql_user, $mysql_pass);
	mysql_select_db($db);
	$password = password_hash("password", PASSWORD_DEFAULT);
	echo $password;
	mysql_query("
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL DEFAULT '1',
  `username` text NOT NULL,
  `password` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;# mysqli returned an empty result set (i.e. zero rows).
INSERT INTO `members` (`id`, `username`, `password`) VALUES
(1, 'Administrator', ''.$password.'');
CREATE TABLE IF NOT EXISTS `homepage` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
INSERT INTO `homepage` (`id`, `title`, `content`) VALUES
(1, 'Title', 'Content');
CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
CREATE TABLE `LoginAttempts` 
(
`IP` VARCHAR( 20 ) NOT NULL ,
`Attempts` INT NOT NULL ,
`LastLogin` DATETIME NOT NULL 
)
");
?>


