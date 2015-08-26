<?php
function db_connect() {
    $result = new mysqli('localhost', 'cart', 'mypasswd', 'bookmarks');
    if (!$result) {
        throw new Exception('Can\'t connect to database server');
    } else {
        return $result;
    }
}
?>