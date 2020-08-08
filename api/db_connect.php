<?php

require_once "db_config.php";

function create_connection() {
    try {
        global $dsn;
        global $user;
        global $password;

        return new PDO($dsn, $user, $password);
    } catch (PDOException $pe) {
        die("Could not connect to the vkPhysics database: " . $pe->getMessage());
        return null;
    }
}

?>
