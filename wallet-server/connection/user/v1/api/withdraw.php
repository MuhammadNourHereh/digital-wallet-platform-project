<?php
require_once __DIR__ . "/../../../../utils/paths.php";
require_once path("conn");
require_once path("cors-headers");


$user_id = $_POST["user_id"] ?? "";
$amount = $_POST["amount"] ?? "";
$currency = $_POST["currency"] ?? "";

if (empty($user_id) || empty($amount) || empty($currency)) {
    http_response_code(400);
    echo json_encode([
        "message" => "user_id, amount or currency is misssing"
    ]);
    exit();
}

try {
    $query = $conn->prepare("CALL WithdrawAmount(?, ?, ?)");
    $query->bind_param("ids", $user_id, $amount, $currency);
    $result = $query->execute();

    if (!$result) {
        http_response_code(400);
        echo json_encode(["message" => "Withdraw failed"]);
    }

    http_response_code(200);
    echo json_encode(["message" => "Withdraw successful"]);


} catch (\Throwable $e) {
    http_response_code(400);

    echo json_encode([
        "message" => $e
    ]);
}