create database `test2`;

use `test2`;

CREATE TABLE `login` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `report`(
`repoid` int(255) NOT NULL auto_increment,
`email` varchar(100) NOT NULL,
`phoneno` varchar(100) NOT NULL,
`statement` text(255) NOT NULL,
`login_id` int(11) NOT NULL,
PRIMARY KEY  (`repoid`),
CONSTRAINT FK_report_1
FOREIGN KEY (login_id) REFERENCES login(id)
ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `admin` (
  `aid` int(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL  
  PRIMARY KEY  (`aid`)
) ENGINE=InnoDB;

CREATE TABLE `personnel`(
  `pid` int(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_aid` int(11) NOT NULL,  
PRIMARY KEY  (`pid`),
CONSTRAINT FK_personnel_1
FOREIGN KEY (admin_aid) REFERENCES admin(aid)
ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `wanted`(
  `wid` int(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `idno` varchar(100) NOT NULL,
  `seen` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `admin_aid` int(11) NOT NULL,   
PRIMARY KEY  (`wid`),
CONSTRAINT FK_wanted_1
FOREIGN KEY (admin_aid) REFERENCES admin(aid)
ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `station`(
  `sid` int(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `admin_aid` int(11) NOT NULL,   
PRIMARY KEY  (`sid`),
CONSTRAINT FK_station_1
FOREIGN KEY (admin_aid) REFERENCES admin(aid)
ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `feedback`(
  `fid` int(9) NOT NULL auto_increment,
  `nameoff` varchar(255) NOT NULL,
  `offno` varchar(255) NOT NULL,
  `fbstate` varchar(100) NOT NULL,
  `admin_aid` int(11)'0',
  `off_pid` int(11)'0',   
PRIMARY KEY  (`fid`),
CONSTRAINT FK_feedback_1
FOREIGN KEY (admin_aid) REFERENCES admin(aid)
ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (off_pid) REFERENCES personnel(pid)
ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;
