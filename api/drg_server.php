<?php

// Deregister server

require_once "db_connect.php";

$uid = $_POST['uid'];

$db_connection = create_connection();

$remove = $db_connection->prepare("delete from servers where uid = :uid;");
$remove->execute(['uid' => $uid]);

print("1\n");

?>
