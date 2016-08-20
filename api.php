<?php
setlocale(LC_ALL, "en_US.utf8");
$db = new PDO('sqlite:db/messagedb.db');
$stmt = $db->query('SELECT message FROM messages ORDER BY dt DESC LIMIT 1');

$message = "No messages.";

foreach($stmt as $row) {
    $message = iconv("utf-8", "ascii//TRANSLIT", $row['message']);
}

echo($message);
