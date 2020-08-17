<?php

require_once "db_connect.php";
require_once "helper.php";

$username = $_POST['username'];
$user_password = $_POST['password'];

$db_connection = create_connection();

// Check if username already exists in the database
$check = $db_connection->prepare("select * from users where username = :username");
$check->execute(['username' => $username]);

if ($check->rowCount() > 0) {
    $row = $check->fetch();

    if ($user_password == $row['password']) {
        // Password was correct
        // Generate a new user tag for this user
        $usertag = generate_user_tag();
        $userid = $row['uid'];

        $insert = $db_connection->prepare("update users set usertag = :usertag where uid = :userid");
        $insert->execute(['usertag' => $usertag, 'userid' => $userid]);

        print("1\n$usertag\n$userid\n");
    }
    else {
        print("0\n");
    }
}
else {
    // Username wasn't correct because it doesn't exist in the database
    print("0\n");
}

?>
