DROP TABLE IF EXISTS `amg8833`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
/*!`reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, */;
CREATE TABLE `amg8833` (
`no` int(6) unsigned NOT NULL AUTO_INCREMENT,
`reg_date` INT(11) NOT NULL DEFAULT '0',
`unique_no` mediumint(8) unsigned DEFAULT NULL,
`a0` float(4) DEFAULT NULL,
`a1` float(4) DEFAULT NULL,
`a2` float(4) DEFAULT NULL,
`a3` float(4) DEFAULT NULL,
`a4` float(4) DEFAULT NULL,
`a5` float(4) DEFAULT NULL,
`a6` float(4) DEFAULT NULL,
`a7` float(4) DEFAULT NULL,
`a8` float(4) DEFAULT NULL,
`a9` float(4) DEFAULT NULL,
`a10` float(4) DEFAULT NULL,
`a11` float(4) DEFAULT NULL,
`a12` float(4) DEFAULT NULL,
`a13` float(4) DEFAULT NULL,
`a14` float(4) DEFAULT NULL,
`a15` float(4) DEFAULT NULL,
`a16` float(4) DEFAULT NULL,
`a17` float(4) DEFAULT NULL,
`a18` float(4) DEFAULT NULL,
`a19` float(4) DEFAULT NULL,
`a20` float(4) DEFAULT NULL,
`a21` float(4) DEFAULT NULL,
`a22` float(4) DEFAULT NULL,
`a23` float(4) DEFAULT NULL,
`a24` float(4) DEFAULT NULL,
`a25` float(4) DEFAULT NULL,
`a26` float(4) DEFAULT NULL,
`a27` float(4) DEFAULT NULL,
`a28` float(4) DEFAULT NULL,
`a29` float(4) DEFAULT NULL,
`a30` float(4) DEFAULT NULL,
`a31` float(4) DEFAULT NULL,
`a32` float(4) DEFAULT NULL,
`a33` float(4) DEFAULT NULL,
`a34` float(4) DEFAULT NULL,
`a35` float(4) DEFAULT NULL,
`a36` float(4) DEFAULT NULL,
`a37` float(4) DEFAULT NULL,
`a38` float(4) DEFAULT NULL,
`a39` float(4) DEFAULT NULL,
`a40` float(4) DEFAULT NULL,
`a41` float(4) DEFAULT NULL,
`a42` float(4) DEFAULT NULL,
`a43` float(4) DEFAULT NULL,
`a44` float(4) DEFAULT NULL,
`a45` float(4) DEFAULT NULL,
`a46` float(4) DEFAULT NULL,
`a47` float(4) DEFAULT NULL,
`a48` float(4) DEFAULT NULL,
`a49` float(4) DEFAULT NULL,
`a50` float(4) DEFAULT NULL,
`a51` float(4) DEFAULT NULL,
`a52` float(4) DEFAULT NULL,
`a53` float(4) DEFAULT NULL,
`a54` float(4) DEFAULT NULL,
`a55` float(4) DEFAULT NULL,
`a56` float(4) DEFAULT NULL,
`a57` float(4) DEFAULT NULL,
`a58` float(4) DEFAULT NULL,
`a59` float(4) DEFAULT NULL,
`a60` float(4) DEFAULT NULL,
`a61` float(4) DEFAULT NULL,
`a62` float(4) DEFAULT NULL,
`a63` float(4) DEFAULT NULL,
`my_note` CHAR(32) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
