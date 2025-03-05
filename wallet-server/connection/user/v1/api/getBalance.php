<?php
require_once __DIR__ . "/../../../../utils/paths.php";
require_once path("conn");
require_once path("cors-headers");

$user_id = $_POST["user_id"] ?? "";

if (empty($user_id)) {
    http_response_code(400);
    echo json_encode([
        "message" => "user id is misssing"
    ]);
    exit();
}

try {
    $query = $conn->prepare("SELECT amount_lb, amount_usd 
    FROM users 
    JOIN balance ON users.balance_id = balance.id
    WHERE users.id = ?");

    $query->bind_param("i", $user_id);
    $query->execute();
    $balance = $query->get_result()->fetch_assoc();

    if (empty($balance)) {
        http_response_code(404);
        echo json_encode([
            "message" => "user_id not found"
        ]);
        exit;
    }

    http_response_code(200);
    echo json_encode([
        "amount_usd" => $balance['amount_usd'],
        "amount_lb" => $balance['amount_lb']
    ]);


} catch (\Throwable $e) {
    http_response_code(400);

    echo json_encode([
        "message" => $e
    ]);
}


