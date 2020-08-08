<?php

require_once "db_config.php";

$db_connection = null;

try {
    global $db_connection;
    $db_connection = new PDO($dsn, $user, $password);
} catch (PDOException $pe) {
    die("Could not connect to the vkPhysics database: " . $pe->getMessage());
}

?>
