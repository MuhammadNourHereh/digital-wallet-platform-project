<?php
require_once __DIR__ . "/../../utils/paths.php";
require_once path("conn");

$query = "CREATE PROCEDURE DepositAmount(
    IN userId INT,
    IN depositAmount DECIMAL(10,2),
    IN currencyType VARCHAR(3)  -- Using VARCHAR instead of ENUM
)
BEGIN
    DECLARE balanceId INT;

    -- Start a transaction
    START TRANSACTION;

    -- Get balance_id from users table
    SELECT balance_id INTO balanceId FROM users WHERE id = userId;

    -- If no user is found, rollback
    IF balanceId IS NULL THEN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'User not found';
    END IF;

    -- Update the balance based on currency
    IF currencyType = 'LB' THEN
        UPDATE balance SET amount_lb = amount_lb + depositAmount WHERE id = balanceId;
    ELSE
        UPDATE balance SET amount_usd = amount_usd + depositAmount WHERE id = balanceId;
    END IF;

    -- Commit the transaction
    COMMIT;
END";

if ($conn->multi_query($query)) {
    echo "Stored procedure `DepositAmount` created successfully!";
} else {
    echo "Error creating stored procedure: " . $conn->error;
}

$conn->close();