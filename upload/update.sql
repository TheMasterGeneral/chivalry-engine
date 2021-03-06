CREATE TABLE `guild_wars` ( 
	`gw_id` INT(11) UNSIGNED NULL DEFAULT NULL AUTO_INCREMENT , 
	`gw_declarer` INT(11) UNSIGNED NOT NULL , 
	`gw_declaree` INT(11) UNSIGNED NOT NULL , 
	`gw_drpoints` INT(11) UNSIGNED NOT NULL , 
	`gw_depoints` INT(11) UNSIGNED NOT NULL , 
	`gw_end` INT(11) UNSIGNED NOT NULL , 
	`gw_winner` INT(11) UNSIGNED NOT NULL , 
	UNIQUE (`gw_id`)) ENGINE = MyISAM;