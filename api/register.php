<?php

require_once "db_connect.php";

$username = $_GET['username'];
$user_password = $_GET['password'];

$db_connection = create_connection();

// Check if username already exists in the database
$check = $db_connection->prepare("select 1 from users where username = '$username';");
$check->execute();

if ($check->rowCount() > 0) {
    print("Username already exists\n");
    print('0');
} else {
    $insert = $db_connection->prepare("insert into users (username, password) values ('$username', '$user_password')");
    $insert->execute();

    print("Username available\n");
    print('1');
}

?>
