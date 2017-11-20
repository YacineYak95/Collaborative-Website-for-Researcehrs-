<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "knowledge");

$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 



?>