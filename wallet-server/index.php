<?php
require "database/database.php";
require "headers.php";
session_start();



$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['username']) || !isset($data['password'])) {
    echo json_encode(["error" => "Invalid request"]);
    exit;
}

$username = $data['username'];
$password = $data['password'];

$stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if ($password == $row['password']) {
        $_SESSION["user_id"] = $row['id']; // Store user ID in session
        echo json_encode(["message" => "Login successful"]);
    } else {
        echo json_encode(["error" => "Invalid credentials"]);
    }
} else {
    echo json_encode(["error" => "User not found"]);
}
