CREATE TABLE `student` (
  `Id` int(11) NOT NULL auto_increment,
  `Name` varchar(255) default NULL,
  `Email` varchar(255) default NULL,
  `DateOfBirth` datetime default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `student` VALUES ('1', 'John Doe', 'jdoe@example.org', null);
INSERT INTO `student` VALUES ('2', null, null, null);
