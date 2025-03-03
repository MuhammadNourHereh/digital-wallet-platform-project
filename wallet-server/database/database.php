<?php

// conn strings
$host = 'localhost';
$db = 'digital_wallet_db';
$user = 'root';
$password = '';

// conn object
if (!$conn = @mysqli_connect($host, $user, $password))
    die("error");

// create database
// you should have the required priviliages
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $db");

// select database
mysqli_select_db($conn, $db);

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(225) NOT NULL,
    password VARCHAR(225) NOT NULL
)");