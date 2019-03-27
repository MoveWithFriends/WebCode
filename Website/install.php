<?php
require_once('config.php');

// Connect to database
$db_name = DB_NAME;
$db_user = DB_USER;
$db_pass = DB_PASS;
$db_charset = DB_CHARSET;
$db_host = DB_HOST;

$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";
$options = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES   => false,
        );

$db = new PDO($dsn, $db_user, $db_pass, $options);

// Drop tables
$db->query( "DROP TABLE IF EXISTS `users`, `timeslot`, `interest` ");
// Create table
$db->query( "CREATE TABLE IF NOT EXISTS users (
        customerID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL,
        firstname VARCHAR(30),
        lastname VARCHAR(30),    
        preposition VARCHAR(30),            
        name VARCHAR(30),
        email VARCHAR(255),
        phonenumber VARCHAR(30),
        birthdate DATE,
        gender VARCHAR(30),
        preferredgender VARCHAR(30)
    )");
    
$db->query( "CREATE TABLE IF NOT EXISTS auth_tokens (
        ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        selector CHAR(16),
        token CHAR(64),
        expires DATETIME
    )");
    
$db->query( "CREATE TABLE IF NOT EXISTS password_reset (
        ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255),
        selector CHAR(16),
        token CHAR(64),
        expires BIGINT(20)
    )");



$db->query( "CREATE TABLE IF NOT EXISTS interest (
  customerIDinterest  INT(10),
  boksen      TINYINT(1),
  fitness     TINYINT(1),
  hardlopen   TINYINT(1),
  tennis      TINYINT(1),
  squash      TINYINT(1),
  wandelen    TINYINT(1),
  wielrennen  TINYINT(1),
  zwemmen     TINYINT(1),
  PRIMARY KEY (`customerIDinterest`, `Boksen`)
  -- FOREIGN KEY (interest.`customerIDinterest`) REFERENCES users (users.`customerID`)
    )");

$db->query( "CREATE TABLE IF NOT EXISTS timeslot  (
  customerIDtimeslot   INT(10),
  timeslot1     TINYINT(1),
  timeslot2     TINYINT(1),
  timeslot3     TINYINT(1),
  timeslot4     TINYINT(1),
  timeslot5     TINYINT(1),
  timeslot6     TINYINT(1),
  timeslot7     TINYINT(1),
  timeslot8     TINYINT(1),
  timeslot9     TINYINT(1),
  timeslot10    TINYINT(1),
  timeslot11    TINYINT(1),
  timeslot12    TINYINT(1),
  timeslot13    TINYINT(1),
  timeslot14    TINYINT(1),
  timeslot15    TINYINT(1),
  timeslot16    TINYINT(1),
  timeslot17    TINYINT(1),
  timeslot18    TINYINT(1),
  timeslot19    TINYINT(1),
  timeslot20    TINYINT(1),
  timeslot21    TINYINT(1),
    PRIMARY KEY (`customerIDtimeslot`, `timeslot1`)
    -- FOREIGN KEY (timeslotFK (customerIDtimeslot)) REFERENCES (users (customerID))
    )");

$db->query( "INSERT INTO users (customerID, firstname, lastname, preposition, email, username, phonenumber, gender, birthdate, password, preferredgender)
VALUES (1, 'Jurgen','Paapen', '', 'jurgen.paapen@student.avans.nl', 'jurgen.paapen', '0626682388', 'man',  '1982-09-08', 
'$2y$10$nYnkQxec2qqPklKb9Jb.W.c8HpIlZ1uW4DavyqYjj2mrnoo7Xrc4K', 'man'),
 (2, 'Stijn', 'Pijman', '', 'stijn.pijman@student.avans.nl', 'stijn.pijman', '0626682499', 'man',  '1992-11-18', 
 '$2y$10$U9RV8lS4mOngnFK1QXGume7RW6pSjVRMK/Ay4Fm10kYxQAl868PYW','vrouw'),
(3, 'Joost', 'Oomen', '', 'joost.oomen@student.avans.nl', 'joost.oomen', '0613382569', 'man',  '1970-03-01', 
  '$2y$10$QwaNvl4snwOE3gJbx9T3V.QtVoF5cLt0fhksZ00rXILtx.A94EtRm', 'beide'),
 (4, 'Nick', 'Sluiter', '', 'nick.sluiter@student.avans.nl', 'nick.sluiter', '0612345678', 'man',  '1987-12-31', 
 '$2y$10$7o2F9FCevL.IKUEnPUAfnOS6a1QJmpYXui6f6QSkQnqzmyTbKQXxa','man'),
 (5, 'Anna', 'Schultzer', '', 'anna.schultzer@gmail.com', 'anna.Schultzer', '0634512466', 'vrouw',  '1996-11-11', 
 '$2y$10$ZBSDy/w/eRgAfWCuaDhXVuAxlqczbVn504iAgcXUVHdpcGZqmsul.', 'beide'),
 (6, 'Frank', 'Rassen', '', 'frank.rassen@hotmail.com', 'frank.rassen', '0625797532', 'man',  '1987-02-10', 
 '$2y$10$mv0hiTABRcjTTAemAZ27r.1f4doBC31PrHt3gpfNKMJOQ1H2xUK8C','man'),
 (7, 'Monique', 'Beer', 'de', 'monique.debeer@outlook.com', 'monique.debeer', '0694276935', 'vrouw',  '1984-07-18', 
 '$2y$10$HbCncyh3JQSjT/vfShncA.grfsTCl8ZroCc.9GyhpY8Hpg5QcoFEC','vrouw'),
 (8, 'Trudie', 'Vries', 'de', 'trudie.devries@home.com', 'trudie.devries', '0612349836', 'vrouw',  '1959-04-28', 
 '$2y$10$jkpwwJylIzxrl3YDQKJzFeHBgvbs8H0y9gWAFnUj0qoV5VXea/kJy','vrouw')");

$db->query( "INSERT INTO interest (customerIDinterest, boksen, fitness, hardlopen, tennis, squash, wandelen, wielrennen, zwemmen)
VALUES  (1, 1, 0, 0, 0, 0, 0, 0, 0),
        (2, 1, 0, 0, 0, 0, 0, 0, 0),
        (3, 0, 0, 1, 0, 0, 0, 1, 0),
        (4, 0, 0, 0, 0, 1, 0, 0, 0),
        (5, 0, 0, 1, 0, 0, 0, 0, 0),
        (6, 1, 0, 0, 0, 0, 0, 0, 0),
        (7, 0, 1, 0, 0, 0, 0, 0, 1),
        (8, 0, 0, 0, 0, 0, 1, 0, 0)");
                     
$db->query( "INSERT INTO timeslot (customerIDtimeslot, timeslot1, timeslot2, timeslot3, timeslot4, timeslot5, timeslot6, timeslot7, timeslot8, timeslot9, timeslot10, timeslot11, timeslot12, timeslot13, timeslot14, timeslot15, timeslot16, timeslot17, timeslot18, timeslot19, timeslot20, timeslot21)                      
VALUES  (1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
        (2, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        (3, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        (4, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1),
        (5, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        (6, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1),
        (7, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        (8, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0)");



