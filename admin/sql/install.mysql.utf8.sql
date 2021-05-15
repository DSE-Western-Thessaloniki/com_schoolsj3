DROP TABLE IF EXISTS `#__sch3_schools`;
DROP TABLE IF EXISTS `#__sch3_categories`;
DROP TABLE IF EXISTS `#__sch3_offices`;
DROP TABLE IF EXISTS `#__sch3_municipalities`;
DROP TABLE IF EXISTS `#__sch3_shifts`;
DROP TABLE IF EXISTS `#__sch3_units`;
DROP TABLE IF EXISTS `#__sch3_districts`;
DROP TABLE IF EXISTS `#__sch3_config`;

CREATE TABLE `#__sch3_schools` (
        `id`     INT NOT NULL AUTO_INCREMENT,
        `cat_id` INT ,
        `off_id` INT ,
        `mun_id` INT ,
        `shi_id` INT,
        `uni_id` INT,
        `dis_id` INT,
        `edu_id` VARCHAR(7),
        `description` VARCHAR(100),
        `shortdescr` VARCHAR(50),
        `phone` VARCHAR(10),
        `fax` VARCHAR(10),
        `email` VARCHAR(50),
        `website` VARCHAR(100),
        `address` VARCHAR(100),
        `postcode` INT,
        `area` VARCHAR(20),
        `lat` DOUBLE,
        `lng` DOUBLE,
        `image` VARCHAR(100),
        `imagepos` VARCHAR(20),
        `published` TINYINT(1)  default '0',
        `checked_out` INT ,
        `checked_out_time` DATETIME default '0000-00-00 00:00:00',
        `ordering` INT ,
        `user_id` INT ,
        `access` TINYINT(3) ,
        `date` DATETIME default '0000-00-00 00:00:00',
        `params` TEXT,
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `#__sch3_categories` (
        `id`     INT NOT NULL AUTO_INCREMENT,
        `description` VARCHAR(50),
        `markertext` VARCHAR(10),
        `markercolor` VARCHAR(10),
        `published` TINYINT(1) NOT NULL default '0',
        `checked_out` INT NOT NULL,
        `checked_out_time` DATETIME default '0000-00-00 00:00:00',
        `ordering` INT NOT NULL,
        `user_id` INT NOT NULL,
        `access` TINYINT(3) NOT NULL,
        `date` DATETIME default '0000-00-00 00:00:00',
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `#__sch3_offices` (
        `id`     INT NOT NULL AUTO_INCREMENT,
        `description` VARCHAR(20),
        `markertext` VARCHAR(10),
        `markercolor` VARCHAR(10),
        `published` TINYINT(1) NOT NULL default '0',
        `checked_out` INT NOT NULL,
        `checked_out_time` DATETIME default '0000-00-00 00:00:00',
        `ordering` INT NOT NULL,
        `user_id` INT NOT NULL,
        `access` TINYINT(3) NOT NULL,
        `date` DATETIME default '0000-00-00 00:00:00',
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `#__sch3_municipalities` (
        `id`     INT NOT NULL AUTO_INCREMENT,
        `description` VARCHAR(50),
        `markertext` VARCHAR(10),
        `markercolor` VARCHAR(10),
        `polyline` TINYINT(1) NOT NULL default '0',
        `outline` TINYINT(1) NOT NULL default '0',
        `outlinecolor` VARCHAR(7),
        `outlineopacity` VARCHAR(3),
        `outlineweight` TINYINT(1) NOT NULL default '1',
        `points` TEXT,
        `levels` TEXT,
        `zoomfactor` TINYINT(1) NOT NULL default '2',
        `numlevels` TINYINT(1) NOT NULL default '18',
        `fill` TINYINT(1) NOT NULL default '1',
        `fillcolor` VARCHAR(7),
        `fillopacity` VARCHAR(3),
        `published` TINYINT(1) NOT NULL default '0',
        `checked_out` INT NOT NULL,
        `checked_out_time` DATETIME default '0000-00-00 00:00:00',
        `ordering` INT NOT NULL,
        `user_id` INT NOT NULL,
        `access` TINYINT(3) NOT NULL,
        `date` DATETIME default '0000-00-00 00:00:00',
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `#__sch3_shifts` (
        `id`     INT NOT NULL AUTO_INCREMENT,
        `description` VARCHAR(30),
        `markertext` VARCHAR(10),
        `markercolor` VARCHAR(10),
        `published` TINYINT(1) NOT NULL default '0',
        `checked_out` INT NOT NULL,
        `checked_out_time` DATETIME default '0000-00-00 00:00:00',
        `ordering` INT NOT NULL,
        `user_id` INT NOT NULL,
        `access` TINYINT(3) NOT NULL,
        `date` DATETIME default '0000-00-00 00:00:00',
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `#__sch3_units` (
        `id`     INT NOT NULL AUTO_INCREMENT,
        `units` VARCHAR(10),
        `markertext` VARCHAR(10),
        `markercolor` VARCHAR(10),
        `published` TINYINT(1) NOT NULL default '0',
        `checked_out` INT NOT NULL,
        `checked_out_time` DATETIME default '0000-00-00 00:00:00',
        `ordering` INT NOT NULL,
        `user_id` INT NOT NULL,
        `access` TINYINT(3) NOT NULL,
        `date` DATETIME default '0000-00-00 00:00:00',
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `#__sch3_districts` (
        `id`     INT NOT NULL AUTO_INCREMENT,
        `description` VARCHAR(30),
        `markertext` VARCHAR(10),
        `markercolor` VARCHAR(10),
        `published` TINYINT(1) NOT NULL default '0',
        `checked_out` INT NOT NULL,
        `checked_out_time` DATETIME default '0000-00-00 00:00:00',
        `ordering` INT NOT NULL,
        `user_id` INT NOT NULL,
        `access` TINYINT(3) NOT NULL,
        `date` DATETIME default '0000-00-00 00:00:00',
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `#__sch3_config` (
        `id` TINYINT(4) NOT NULL default '1',
        `mapAPIKey` VARCHAR(100) NOT NULL default '[Enter your API Key here]',

        `mapWidth` VARCHAR(10) NOT NULL default '99%',
        `mapHeight` VARCHAR(10) NOT NULL default '350px',
        `mapBorder` VARCHAR(255) NOT NULL default '1px solid lightblue',
        `mapZoomLevel` TINYINT(1) NOT NULL default '4',

        `mapWidthAdmin` VARCHAR(10) NOT NULL default '99%',
        `mapHeightAdmin` VARCHAR(10) NOT NULL default '350px',
        `mapBorderAdmin` VARCHAR(255) NOT NULL default '1px solid lightblue',
        `mapZoomLevelAdmin` TINYINT(1) NOT NULL default '4',

        `mapCenterId` INT default '0',
        `mapCenterLat` DOUBLE default '40.748442',
        `mapCenterLng` DOUBLE default '-73.984721',
        `mapShowScale` TINYINT(1) NOT NULL default '1',
        `mapShowZoom` TINYINT(1) NOT NULL default '1',
        `mapWhichZoom` TINYINT(1) NOT NULL default '1',
        `mapShowType` TINYINT(1) NOT NULL default '1',
        `mapWhichType` TINYINT(1) NOT NULL default '1',
        `mapContZoom` TINYINT(1) NOT NULL default '0',
        `mapDoubleclickZoom` TINYINT(1) NOT NULL default '0',
        PRIMARY KEY(`id`)
) DEFAULT CHARSET=utf8;

INSERT INTO `#__sch3_config` (id) values (1);
