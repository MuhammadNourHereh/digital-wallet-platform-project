<?php
require_once __DIR__ . "/../../../utils/paths.php";
require_once path("conn");

$query = "CREATE PROCEDURE IF NOT EXISTS WithdrawAmount(
    IN userId INT,
    IN withdrawAmount DECIMAL(10,2),
    IN currencyType VARCHAR(3)
) 
BEGIN
    DECLARE balanceId INT;
    DECLARE currentBalance DECIMAL(10,2);

    START TRANSACTION;

    SELECT balance_id INTO balanceId FROM users WHERE id = userId;

    IF balanceId IS NULL THEN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'User not found';
    END IF;

    IF currencyType = 'LB' THEN
        SELECT amount_lb INTO currentBalance FROM balance WHERE id = balanceId;
    ELSE
        SELECT amount_usd INTO currentBalance FROM balance WHERE id = balanceId;
    END IF;

    IF currentBalance < withdrawAmount THEN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Insufficient balance';
    END IF;

    IF currencyType = 'LB' THEN
        UPDATE balance SET amount_lb = amount_lb - withdrawAmount WHERE id = balanceId;
    ELSE
        UPDATE balance SET amount_usd = amount_usd - withdrawAmount WHERE id = balanceId;
    END IF;

    COMMIT;
END";

if ($conn->multi_query($query)) {
    echo "Stored procedure `WithdrawAmount` created successfully!";
} else {
    echo "Error creating stored procedure: " . $conn->error;
}
