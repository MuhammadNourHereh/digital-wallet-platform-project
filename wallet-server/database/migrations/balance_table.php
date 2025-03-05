<?php
require_once "../../utils/paths.php";
require_once path("conn");

// creates balance table
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS balance(
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount_lb DECIMAL(10,2) NOT NULL,
    amount_usd DECIMAL(10,2) NOT NULL
)");