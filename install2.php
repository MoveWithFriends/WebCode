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


// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

if ($db->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db = null;
?>
