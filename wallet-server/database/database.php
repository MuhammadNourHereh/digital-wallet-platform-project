<?php
require_once __DIR__ . "/../utils/paths.php";
require_once path("conn");

// create database
// you should have the required priviliages
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS " . DB_NAME);
