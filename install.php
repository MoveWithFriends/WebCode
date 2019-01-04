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

// Create table
$db->query( "CREATE TABLE IF NOT EXISTS users (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL,
        firstname VARCHAR(30),
        lastname VARCHAR(30),    
        prepositon VARCHAR(30),            
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
   CustomerIDinterest  INT(10),
   Boksen      BOOLEAN,
   Fitness     BOOLEAN,
   Hardlopen   BOOLEAN,
   Tennis      BOOLEAN,
   Squash      BOOLEAN,
   Wandelen    BOOLEAN,
   Wielrennen  BOOLEAN,
   Zwemmen     BOOLEAN,
  
   CONSTRAINT
     PRIMARY KEY InterestPK (CustomerIDinterest, Boksen),

   CONSTRAINT
     FOREIGN KEY InterestFK (CustomerIDinterest)
     REFERENCES users (CustomerID)
     )");

 $db->query( "CREATE TABLE IF NOT EXISTS timeslot  (
   CustomerIDtimeslot   INT(10),
   Timeslot1     BOOLEAN,
   Timeslot2     BOOLEAN,
   Timeslot3     BOOLEAN,
   Timeslot4     BOOLEAN,
   Timeslot5     BOOLEAN,
   Timeslot6     BOOLEAN,
   Timeslot7     BOOLEAN,
   Timeslot8     BOOLEAN,
   Timeslot9     BOOLEAN,
   Timeslot10    BOOLEAN,
   Timeslot11    BOOLEAN,
   Timeslot12    BOOLEAN,
   Timeslot13    BOOLEAN,
   Timeslot14    BOOLEAN,
   Timeslot15    BOOLEAN,
   Timeslot16    BOOLEAN,
   Timeslot17    BOOLEAN,
   Timeslot18    BOOLEAN,
   Timeslot19    BOOLEAN,
   Timeslot20    BOOLEAN,
   Timeslot21    BOOLEAN,
  
 CONSTRAINT
     PRIMARY KEY TimeslotPK (CustomerIDtimeslot, Timeslot1),

   CONSTRAINT
     FOREIGN KEY TimeslotFK (CustomerIDtimeslot)
     REFERENCES users (CustomerID)
    )");
