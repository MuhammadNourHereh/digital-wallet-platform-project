<?php
require_once __DIR__ . "/../../../../utils/paths.php";
require_once path("conn");
require_once path("cors-headers");



// Handle CORS preflight (OPTIONS request)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit;
}

if (!isset($_POST["username"]) || !isset($_POST["password"])) {
    http_response_code(400);
    echo json_encode([
        "message" => "username and password are required"
    ]);
    exit();
}

$username = $_POST["username"];
$password = $_POST["password"];

try {
    $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $user = $query->get_result()->fetch_assoc();

    if (password_verify($password, $user["password"])) {
        echo json_encode([
            "user" => $user,
        ]);
    } else {
        http_response_code(401);

        echo json_encode([
            "message" => "Invalid credentials"
        ]);
    }
} catch (\Throwable $e) {
    http_response_code(400);

    echo json_encode([
        "message" => "error"
    ]);
}









