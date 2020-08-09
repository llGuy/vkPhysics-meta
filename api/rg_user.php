<?php

require_once "db_connect.php";
require_once "helper.php";

$username = $_GET['username'];
$user_password = $_GET['password'];

$db_connection = create_connection();

// Check if username already exists in the database
$check = $db_connection->prepare("select 1 from users where username = '$username';");
$check->execute();

if ($check->rowCount() > 0) {
    print("0\n");
}
else {
    $usertag = generate_user_tag();

    $insert = $db_connection->prepare("insert into users (username, password, usertag) values ('$username', '$user_password', $usertag)");
    $insert->execute();

    $userid = $db_connection->lastInsertId();

    print("1\n$usertag\n$userid\n");
}

?>
