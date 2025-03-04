<?php
require_once "../../../../utils/paths.php";
require_once path("conn");
require_once path("cors-headers");

if (!isset($_POST["username"]) || !isset($_POST["password"])) {

  http_response_code(400);

  echo json_encode([
    "message" => "username and password are required"
  ]);

  exit();
}

$username = $_POST["username"];
$password = $_POST["password"];


// Validation for existing username

$hashed = password_hash($password, PASSWORD_BCRYPT);
$query = $conn->prepare("INSERT INTO users(username, password) values(?, ?)");
try {
  echo 0;
  
  echo 1;
  $query->bind_param("ss", $username, $hashed);
  $query->execute();
  echo 1;
  $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $query->bind_param("s", $username);
  $query->execute();
  echo 2;
  $user = $query->get_result()->fetch_assoc();

  echo json_encode([
    "user" => $user,
  ]);
} catch (\Throwable $e) {
  http_response_code(400);

  echo json_encode([
    "message" => $e
  ]);
}










