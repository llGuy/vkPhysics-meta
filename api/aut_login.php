<?php

require_once "db_connect.php";
require_once "helper.php";

$usertag = $_GET['usertag'];
$userid = $_GET['userid'];

$db_connection = create_connection();

$check = $db_connection->prepare("select * from users where uid = $userid;");
$check->execute();

if ($check->rowCount() > 0) {
    $row = $check->fetch();

    if ($row['usertag'] == $usertag) {
        print("1\n");
    }
    else {
        print("0\n");
    }
}
else {
    print("0\n");
}

?>
