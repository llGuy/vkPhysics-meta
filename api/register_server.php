<?php
// This script gets run everytime a server game starts running

require_once "db_connect.php";

$servername = $_POST['servername'];
$remote_address = $_SERVER['REMOTE_ADDR'];

$db_connection = create_connection();

$check = $db_connection->prepare("select 1 from servers where servername = :servername;");
$check->execute(['servername' => $servername]);

if ($check->rowCount() > 0) {
    print("0\n");
}
else {
    $insert = $db_connection->prepare("insert into servers (servername, ip, playercount) values (:servername, :ip, 0)");
    $insert->execute(['servername' => $servername, 'ip' => $remote_address]);

    $server_id = $db_connection->lastInsertId();

    print("1\n$server_id\n");
}

?>
