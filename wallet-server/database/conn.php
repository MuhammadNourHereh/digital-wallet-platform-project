<?php

// connection constants
define('DB_HOST', 'localhost');
define('DB_NAME', 'digital_wallet_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// conn object
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_PASSWORD);
// select database
mysqli_select_db($conn, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed $conn->connect_error");
}