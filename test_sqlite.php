<?php
$db = new SQLite3('database/database.sqlite');
$res = $db->query('SELECT * FROM users');
while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
    print_r($row);
}
$res2 = $db->query('SELECT * FROM products');
while ($row = $res2->fetchArray(SQLITE3_ASSOC)) {
    print_r($row);
}
