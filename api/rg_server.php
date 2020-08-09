<?php
// This script gets run everytime a server game starts running

require_once "db_connect.php";

$servername = $_GET['servername'];
$remote_address = $_SERVER['REMOTE_ADDR'];

$db_connection = create_connection();

$check = $db_connection->prepare("select 1 from servers where servername = '$servername';");
$check->execute();

if ($check->rowCount() > 0) {
    print("0\n");
}
else {
    $insert = $db_connection->prepare("insert into servers (servername, ip, playercount) values ('$servername', '$remote_address', 0)");
    $insert->execute();

    print("1\n");
}

?>
