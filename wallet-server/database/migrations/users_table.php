<?php
require_once "../../utils/paths.php";
require_once path("conn");

// creates the table
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(225) NOT NULL UNIQUE,
    password VARCHAR(225) NOT NULL,
    balance_id INT,
    FOREIGN KEY (balance_id) REFERENCES balance(id) ON DELETE SET NULL
)");