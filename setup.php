<?php
try {
    $db = new PDO("sqlite:db/messagedb.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE TABLE IF NOT EXISTS messages(
                 user TEXT,
                 message TEXT,
                 dt DATETIME
               );");
    $db = null;
    echo("Success!");
} catch(PDOException $e) {
    echo($e->getMessage());
}
            
