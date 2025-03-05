<?php

// create database
// you should have the required priviliages
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $db");

// select database
mysqli_select_db($conn, $db);

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(225) NOT NULL UNIQUE,
    password VARCHAR(225) NOT NULL
)");