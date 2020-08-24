<?php

require_once "db_connect.php";
require_once "helper.php";

$db_connection = create_connection();

$servers = $db_connection->prepare("select * from servers;");
$servers->execute();

$server_count = $servers->rowCount();

print("$server_count\n");

while ($srv = $servers->fetch()) {
    if ($srv['online'] == 1) {
        $uid = $srv['uid'];
        $servername = $srv['servername'];
        $ip = $srv['ip'];
        $playercount = $srv['playercount'];

        print("$uid;$servername;$ip;$playercount\n");
    }
}

?>
