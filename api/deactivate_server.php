<?php
// This script gets run everytime a server game starts running

require_once "db_connect.php";

// Unique ID of the server that needs to be activated
$uid = $_POST['uid'];

$db_connection = create_connection();

$check = $db_connection->prepare("update servers set online = 0 where uid = :uid");
$check->execute(['uid' => $uid]);

print('1');

?>
