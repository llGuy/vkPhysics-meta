<?php

require_once "db_connect.php";
require_once "helper.php";

$username = $_GET['username'];
$user_password = $_GET['password'];

$db_connection = create_connection();

// Check if username already exists in the database
$check = $db_connection->prepare("select 1 from users where username = :username;");
$check->execute(['username' => $username]);

if ($check->rowCount() > 0) {
    print("0\n");
}
else {
    $usertag = generate_user_tag();

    $insert = $db_connection->prepare("insert into users (username, password, usertag) values (:username, :password, :usertag)");
    $insert->execute(['username' => $username, 'password' => $user_password, 'usertag' => $usertag]);

    $userid = $db_connection->lastInsertId();

    print("1\n$usertag\n$userid\n");
}

?>
